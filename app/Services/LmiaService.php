<?php

namespace App\Services;

use App\Repositories\Eloquent\LmiaRepository;
use App\Repositories\Eloquent\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LmiaService
{
    protected $LmiaRepository;
    protected $UserRepository;

    public function __construct(LmiaRepository $LmiaRepository,UserRepository $UserRepository)
    {
        $this->LmiaRepository = $LmiaRepository;
        $this->UserRepository = $UserRepository;
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
                'employer_id' => Auth::user()->id,
                'employee_already_working_in_the_company' => $data['employee_already_working_in_the_company'],
                'total_number_of_canadian' => $data['total_number_of_canadian'],
                'employee_currenty_in_same_occupation' => $data['employee_currenty_in_same_occupation'],
                'suggested_job_title' => $suggested_job_title,
                'number_of_vacancies' => $number_of_vacancies,
                'speak_english' => $speak_english,
                'write_english' => $write_english,
                'same_occupation' => $data['same_occupation'],
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
            $getEmployees = $this->UserRepository->getEmployees(['role_id'=>2 , 'user_type'=>'employee']);
            $formattedData  = $users->map(function ($user) use ($getEmployees) {
                return [
                    'id' => $user->id,
                    'employee_currenty_in_same_occupation' => $user->employee_currenty_in_same_occupation,
                    'employee_already_working_in_the_company' => $user->employee_already_working_in_the_company,
                    'total_number_of_canadian' => $user->total_number_of_canadian,
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
            $updateWhere =  [
                'id' => $data['id'],
                'status' => $data['status'],
            ];
            $this->LmiaRepository->updateStatus($updateWhere);
            return ['status'=>true , 'message'=>"Change Status Successfully!"];
        } catch (\Exception $th) {
            Log::error('Error in LmiaService.changeStatus() ' . $th->getLine() . ' ' . $th->getMessage());
        }
    }
}
