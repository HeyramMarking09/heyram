<?php

namespace App\Services;

use App\Repositories\Eloquent\TaskManagementRepository;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class TaskManagementService
{
    protected $TaskManagementRepository;
    public function __construct(TaskManagementRepository $TaskManagementRepository)
    {
        $this->TaskManagementRepository = $TaskManagementRepository;
    }
    public function create(array $data)
    {
        try{
            unset($data['file_name']);
            // Append the new value to the array
            $descriptionArray[] = $data['description'];
            $data['description'] = json_encode($descriptionArray);
            $this->TaskManagementRepository->create($data);
            return ['status'=>true, 'message'=>'Task Created Successfully!'];
        }catch(\Exception $exception){
            Log::error("Error in TaskManagementService.create() ". $exception->getLine() .' '.$exception->getMessage());
        }
    }

    public function getAll(array $data)
    {
        try {
            // Check if 'customer_name' is present in the request data
            $search = $data['name'] ?? '';
            $sortOrder = $data['sortOrder'] ?? 'desc';

            $LeadQuery = $this->TaskManagementRepository->getAll($sortOrder);
            if (!empty($search)) {
                $LeadQuery->where('name', 'like', "%$search%");
            }
            // Apply date range filter
            if (isset($data['startDate']) && isset($data['endDate'])) {
                // Convert the start and end dates to datetime objects
                $startDate = date('Y-m-d 00:00:00', strtotime($data['startDate']));
                $endDate = date('Y-m-d 23:59:59', strtotime($data['endDate']));
                $LeadQuery->whereBetween('created_at', [$startDate, $endDate]);
            }
            // Fetch data with potential pagination if needed
            $dataLead = $LeadQuery->get();
            // Format the data according to DataTables requirements
            $formattedData  = $dataLead->map(function ($lead) {
                return [
                    'id' => $lead->id,
                    'title' => $lead->title,
                    'category' => $lead->category, // Example field, replace with your actual field
                    'client_name' => $lead->client_name, // Example field, replace with your actual field
                    'responsible_person' => $lead->responsible_person, // Example field, replace with your actual field
                    'start_date' => $lead->start_date, // Example field, replace with your actual field
                    'due_date' => $lead->due_date, // Example field, replace with your actual field
                    'status' => $lead->status, // Example field, replace with your actual field
                    'created' => $lead->created_at->format('d M Y, h:i a'),
                    'type_of_service' => $lead->type_of_service,
                    'priority' => $lead->priority,
                    'description' => json_decode($lead->description),
                    'file_download' => $lead->file,
                    'Action' => '' // You can add any action buttons here if needed
                ];
            });
            // return response()->json(['data' => $data]);
            return response()->json([
                'data' => $formattedData,
                'draw' => $data['draw'] ?? 1,
                'recordsTotal' => $dataLead->count(),
                'recordsFiltered' => $dataLead->count()
            ]);

        } catch (\Exception $exception) {
            Log::error("Error in TaskManagementService.getAll() " . $exception->getLine() . ' ' . $exception->getMessage());
        }
    }
    public function deleteTask(array $data)
    {
        try{
            $exists = $this->TaskManagementRepository->getById(['id'=> $data['id']]);
            if(isset($exists)){
                $this->TaskManagementRepository->delete(['id'=> $data['id']]);
                return ['status'=>true , 'message'=> 'Task Delete Successfully!'];
            }else{
                return ['status'=>false , 'message'=> 'Something Went Wrong!'];
            }
        }catch(\Exception $exception){
            Log::error("Error in TaskManagementService.deleteTask() " . $exception->getLine() . ' ' . $exception->getMessage());
        }
    }
    public function update(array $data)
    {
        try{
            $isExists = $this->TaskManagementRepository->getById(['id'=> $data['id']]);
            if(!isset($isExists))
            {
                return ['status'=>false, 'message'=>'Something Went Wrong!'];
            }
            if(isset($isExists->file) && !is_null($isExists->file))
            {
                // Specify the path to the file in the public directory
                $filePath = public_path('task-management/' . $isExists->file);
                // Check if the file exists
                if (File::exists($filePath)) {
                    // Delete the file
                    File::delete($filePath);
                }
            }

            unset($data['file_name']);
            unset($data['_token']);
            // Append the new value to the array
            $descriptionArray[] = $data['description'];
            $data['description'] = json_encode($descriptionArray);
            $this->TaskManagementRepository->update(['id'=> $data['id']],$data);
            return ['status'=>true, 'message'=>'Task Updated Successfully!'];
        }catch(\Exception $exception){
            Log::error("Error in TaskManagementService.update() ". $exception->getLine() .' '.$exception->getMessage());
        }
    }
}
