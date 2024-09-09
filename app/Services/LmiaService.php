<?php

namespace App\Services;

use App\Repositories\Eloquent\LmiaRepository;
use App\Repositories\Eloquent\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
class LmiaService
{
    protected $LmiaRepository;
    protected $UserRepository;

    public function __construct(LmiaRepository $LmiaRepository,UserRepository $UserRepository)
    {
        $this->LmiaRepository = $LmiaRepository;
        $this->UserRepository = $UserRepository;
    }
    public function AllLmiaWithStatus($status)
    {
        if($status == 100)
        {
            $where = [
                'employer_id' => Auth::user()->id
            ];  
        }else{
            $where = [
                'employer_id' => Auth::user()->id,
                'status' => $status,
            ];
        }
        return $this->LmiaRepository->get($where);
    }
    public function create(array $data)
    {
        try {
            $groupedData = [];

            // Check if the employee is already working in the company
            if ((int)$data['employee_already_working_in_the_company'] === 1) {
                foreach ($data as $key => $value) {
                    // Check if the key matches the pattern of having an identifier
                    if (preg_match('/^(.*)_(\d+)$/', $key, $matches)) {
                        $baseKey = $matches[1];     // e.g., 'job_title', 'employee_name'
                        $uniqueId = $matches[2];    // e.g., '0', '1724221629165'

                        // Group the data by the dynamic identifier
                        $groupedData[$uniqueId][$baseKey] = $value;
                    }
                }
                // After looping, convert the grouped data into a JSON format
                $jsonData = json_encode(array_values($groupedData));
                $suggested_job_title = null;
                $number_of_vacancies = null;
                $speak_english = '0';
                $write_english = '0';
            } else {
                $jsonData = null;
                $suggested_job_title = $data['suggested_job_title'] ?? null;
                $number_of_vacancies = $data['number_of_vacancies'] ?? null;
                $speak_english = $data['speak_english'];
                $write_english = $data['write_english'];
            }
            $insertData = [
                'enployee_detail' => $jsonData,
                'employer_id' => isset($data['employer_id']) ? $data['employer_id']: Auth::user()->id,
                'employee_already_working_in_the_company' => $data['employee_already_working_in_the_company'],
                'total_number_of_canadian' => $data['total_number_of_canadian'],
                'employee_currenty_in_same_occupation' => $data['employee_currenty_in_same_occupation'],
                'suggested_job_title' => $suggested_job_title,
                'number_of_vacancies' => $number_of_vacancies,
                'speak_english' => $speak_english,
                'write_english' => $write_english,
                'same_occupation' => $data['same_occupation'],
                'internal_status' => 0,
                'uuid'=> Str::uuid(), 

            ];
            $this->LmiaRepository->create($insertData);
            return ['status' => true, 'message' => 'Lmia created successfully!'];
        } catch (\Exception $th) {
            Log::error('Error in LmiaService.create() ' . $th->getLine() . ' ' . $th->getMessage());
        }
    }
    public function getAll(array $request, $is_admin = false)
    {
        try {
            $sortOrder = $request['sortOrder'] ?? 'asc';
            $LmiaRepositoryData = $this->LmiaRepository->getAll($sortOrder);
            // Fetch data with potential pagination if needed

            // Apply date range filter
            if ($request['startDate'] && $request['endDate']) {
                // Convert the start and end dates to datetime objects
                $startDate = date('Y-m-d 00:00:00', strtotime($request['startDate']));
                $endDate = date('Y-m-d 23:59:59', strtotime($request['endDate']));
                $LmiaRepositoryData->whereBetween('created_at', [$startDate, $endDate]);
            }
            // search by status 
            if ($request['statuses'] && !empty($request['statuses']) && $request['statuses'][0] != 100) {
                $LmiaRepositoryData->where('status', $request['statuses'][0]);
            }
            if($is_admin == true){
                $users = $LmiaRepositoryData->get();
            }else{
                $users = $LmiaRepositoryData->where('employer_id', Auth::user()->id)->get();
            }
            // Format the data according to DataTables requirements
            $getEmployees = $this->UserRepository->getEmployees(['user_type'=>'employee']);
            $formattedData  = $users->map(function ($user) use ($getEmployees) {
                return [
                    'id' => $user->id,
                    'uuid' => $user->uuid,
                    'employee_currenty_in_same_occupation' => $user->employee_currenty_in_same_occupation,
                    'total_number_of_canadian' => $user->total_number_of_canadian,
                    'employee_already_working_in_the_company' => $user->employee_already_working_in_the_company,
                    'name' => $user->users->name,
                    'email' => $user->users->email,
                    'company_legel_name' => $user->companyInfo->company_legel_name??NULL,
                    'created' => $user->created_at->format('d M Y, h:i a'),
                    'status' => $user->status,
                    'EmployesData' => $getEmployees,
                    'Action' => '' // You can add any action buttons here if needed
                ];
            });
            return response()->json([
                'data' => $formattedData,
                'draw' => $data['draw'] ?? 1,
                'recordsTotal' => $users->count(),
                'recordsFiltered' => $users->count()
            ]);
        } catch (\Exception $th) {
            Log::error('Error in LmiaService.create() ' . $th->getLine() . ' ' . $th->getMessage());
        }
    }
    public function getByID($id)
    {
        try {
            $where = [
                'id' =>$id,
                'employer_id' =>Auth::user()->id
            ];
            return $this->LmiaRepository->getById($where);
        } catch (\Exception $th) {
            Log::error('Error in LmiaService.getByID() ' . $th->getLine() . ' ' . $th->getMessage());
        }
    }
    public function changeStatus($data)
    {
        try {
            $where = [
                'id' =>$data['id']
            ];
            $getLmia = $this->LmiaRepository->getById($where);
            if(!isset($getLmia)){
                return ['status'=>false , 'message'=>"Something Went Wrong!"];
            }
            // Convert the current status to an array
            $currentStatus = $getLmia->internal_status == 0 ? explode(',', 0) : explode(',', $getLmia->internal_status);

            // Add the new value to the array if it doesn't already exist
            $newValue = $data['status'];
            if (!in_array($newValue, $currentStatus)) {
                $currentStatus[] = $newValue;
            }

            // Sort the array in descending order
            rsort($currentStatus);

            // Convert the array back to a comma-separated string
            $internal_status = implode(',', $currentStatus);

            $updateWhere =  [
                'id' => $data['id'],
                'status' => $data['status'],
                'internal_status' => $internal_status,
            ];

            $this->LmiaRepository->updateStatus($updateWhere);
            return ['status'=>true , 'message'=>"Change Status Successfully!"];
        } catch (\Exception $th) {
            Log::error('Error in LmiaService.changeStatus() ' . $th->getLine() . ' ' . $th->getMessage());
        }
    }
    public function assignEmployee(array $data)
    {
        try {
            $where = [
                'id' =>$data['id']
            ];
            $getLmia = $this->LmiaRepository->getById($where);
            if(!isset($getLmia)){
                return ['status'=>false , 'message'=>"Something Went Wrong!"];
            }
            $updateWhere =  [
                'job_title' => $data['job_title'],
                'vacancies' => $data['vacancies'],
                'mininum_education_requirement' => $data['mininum_education_requirement'],
                'mininum_experience_requirement' => $data['mininum_experience_requirement'],
                'expected_file_submission_date' => $data['expected_file_submission_date'],
                'final_submission_date' => $data['final_submission_date'],
                'job_location' => $data['job_location'],
                'language' => $data['language'],
                'description' => $data['description'],
            ];
            if(isset($data['file_assign_to_employee']))
            {
                $file_assign_to_employee = $data['file_assign_to_employee'];
            }else{
                $file_assign_to_employee = 0;
            }
            $updateData = [
                'assign_employee_data'=>json_encode($updateWhere),
                'file_assign_to_employee' => $file_assign_to_employee, 
            ];
            $this->LmiaRepository->update($data['id'],$updateData);
            return ['status'=>true , 'message'=>"Assign Employee Successfully!"];
        } catch (\Exception $th) {
            Log::error('Error in LmiaService.assignEmployee() ' . $th->getLine() . ' ' . $th->getMessage());
        }
    }
    public function lmiaApproved(array $data)
    {
        try {

            $where = [
                'id' =>$data['id']
            ];
            $getLmia = $this->LmiaRepository->getById($where);
            if(!isset($getLmia)){
                return ['status'=>false , 'message'=>"Something Went Wrong!"];
            }
            // Convert the current status to an array
            $currentStatus = $getLmia->internal_status == 0 ? explode(',', 0) : explode(',', $getLmia->internal_status);

            // Add the new value to the array if it doesn't already exist
            $newValue = $data['status'];
            if (!in_array($newValue, $currentStatus)) {
                $currentStatus[] = $newValue;
            }

            // Sort the array in descending order
            rsort($currentStatus);

            // Convert the array back to a comma-separated string
            $internal_status = implode(',', $currentStatus);
            // Define the destination path
            $destinationPath = public_path('lmia_status_file');

            // Check if the folder exists; if not, create it
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0775, true); // Create the directory with appropriate permissions
            }
            // Check if 'status_file' is present and is a valid file
            if (isset($data['status_file']) && $data['status_file']->isValid()) {
                $originalFileName = $data['status_file']->getClientOriginalName();
                $fileName1 = time() . '_1_' . $originalFileName;
                $data['status_file']->move($destinationPath, $fileName1);
            }else{
                $fileName1 = null;
            }
            $updateWhere =  [
                'status' => $data['status'],
                'status_file' => $fileName1,
                'date_of_approval' => $data['date_of_approval'],
                'date_of_expiry' => $data['date_of_expiry'],
                'number_of_lmia' => $data['number_of_lmia'],
                'description' => $data['description'],
                'interview_date_time' => $data['interview_date_time'],
                'internal_status' => $internal_status,
            ];
            $this->LmiaRepository->update($data['id'],$updateWhere);
            return ['status'=>true , 'message'=>"Lmia Approved Successfully!"];
        } catch (\Exception $th) {
            Log::error('Error in LmiaService.lmiaApproved() ' . $th->getLine() . ' ' . $th->getMessage());
        }
    }
    public function lmiaInterviewSchedule(array $data)
    {
        try {
            $where = [
                'id' =>$data['id']
            ];
            $getLmia = $this->LmiaRepository->getById($where);
            if(!isset($getLmia)){
                return ['status'=>false , 'message'=>"Something Went Wrong!"];
            }
            $updateWhere =  [
                'status' => '6',
                'interview_date_time' => $data['interview_date_time']
            ];
            $this->LmiaRepository->update($data['id'],$updateWhere);
            return ['status'=>true , 'message'=>"Lmia Interview Scheduled Successfully!"];
        } catch (\Exception $th) {
            Log::error('Error in LmiaService.lmiaInterviewSchedule() ' . $th->getLine() . ' ' . $th->getMessage());
        }
    }
    public function lmiaDetail($id)
    {
        try {
            return $this->LmiaRepository->lmiaDetail(['id'=>$id]);
        } catch (\Exception $th) {
            Log::error('Error in LmiaService.lmiaDetail() ' . $th->getLine() . ' ' . $th->getMessage());
        }
    }
}
