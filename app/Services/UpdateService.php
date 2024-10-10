<?php

namespace App\Services;

use App\Repositories\Eloquent\UpdateRepository;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class UpdateService
{
    protected $UpdateRepository;
    public function __construct(UpdateRepository $UpdateRepository)
    {
        $this->UpdateRepository = $UpdateRepository;
    }
    public function create(array $data)
    {
        try{
            $this->UpdateRepository->create($data);
            return ['status'=>true, 'message'=>'Application Created Successfully!'];
        }catch(\Exception $exception){
            Log::error("Error in UpdateService.create() ". $exception->getLine() .' '.$exception->getMessage());
        }
    }

    public function getAll(array $data)
    {
        try {
            // Check if 'customer_name' is present in the request data
            $search = $data['name'] ?? '';
            $sortOrder = $data['sortOrder'] ?? 'desc';

            $LeadQuery = $this->UpdateRepository->getAll($sortOrder);
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
            $dataLead = $LeadQuery->with('users')->get();
            // Format the data according to DataTables requirements
            $formattedData  = $dataLead->map(function ($lead) {
                return [
                    'id' => $lead->id,
                    'client_id' => $lead->client_id,
                    'client_name' => $lead->users->name,
                    'visa_type' => $lead->visa_type, // Example field, replace with your actual field
                    'application_number' => $lead->application_number, // Example field, replace with your actual field
                    'date' => $lead->date, // Example field, replace with your actual field
                    'update' => $lead->update, // Example field, replace with your actual field
                    'comment' => $lead->comment, // Example field, replace with your actual field
                    'informed' => $lead->informed, // Example field, replace with your actual field
                    'created' => $lead->created_at->format('d M Y, h:i a'),
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
            Log::error("Error in UpdateService.getAll() " . $exception->getLine() . ' ' . $exception->getMessage());
        }
    }
    public function delete(array $data)
    {
        try{
            $exists = $this->UpdateRepository->getById(['id'=> $data['id']]);
            if(isset($exists)){
                $this->UpdateRepository->delete(['id'=> $data['id']]);
                return ['status'=>true , 'message'=> 'Application Delete Successfully!'];
            }else{
                return ['status'=>false , 'message'=> 'Something Went Wrong!'];
            }
        }catch(\Exception $exception){
            Log::error("Error in UpdateService.deleteTask() " . $exception->getLine() . ' ' . $exception->getMessage());
        }
    }
    public function update(array $data)
    {
        try{
            $isExists = $this->UpdateRepository->getById(['id'=> $data['id']]);
            if(!isset($isExists))
            {
                return ['status'=>false, 'message'=>'Something Went Wrong!'];
            }
            unset($data['_token']);
            // Append the new value to the array
            $this->UpdateRepository->update(['id'=> $data['id']],$data);
            return ['status'=>true, 'message'=>'Application Updated Successfully!'];
        }catch(\Exception $exception){
            Log::error("Error in UpdateService.update() ". $exception->getLine() .' '.$exception->getMessage());
        }
    }
}
