<?php

namespace App\Services;

use App\Repositories\Eloquent\CallTaggingRepository;
use App\Repositories\Eloquent\LeadRepository;
use App\Repositories\Eloquent\UserRepository;
use Illuminate\Support\Facades\Log;

class CallTaggingService
{
    protected $CallTaggingRepository;
    protected $UserRepository;
    protected $LeadRepository;

    public function __construct(CallTaggingRepository $CallTaggingRepository, UserRepository $UserRepository, LeadRepository $LeadRepository)
    {
        $this->CallTaggingRepository = $CallTaggingRepository;
        $this->UserRepository = $UserRepository;
        $this->LeadRepository = $LeadRepository;
    }
    public function create(array $data)
    {
        try {
            if(isset($data['lead_id']) && !is_null($data['lead_id'])){
                $leadData = $this->LeadRepository->getById(['id'=>$data['lead_id']]);
                if(isset($leadData) && !empty($leadData)){
                    $name = $leadData->name;
                    $phone = $leadData->phone;
                    $email = $leadData->email;
                }
            }else if(isset($data['user_id']) && !is_null($data['user_id'])){
                $userData = $this->UserRepository->getByWhere(['id'=>$data['user_id']]);
                if(isset($userData) && !empty($userData))
                {
                    $name = $userData->name;
                    $phone = $userData->phone;
                    $email = $userData->email;
                }
            }else{
                $name = $data['name'];
                $phone = $data['phone'];
                $email = $data['email'];
            }
            $create = [
                'user_type' => $data['user_type'],
                'type' => $data['type'],
                'status' => $data['status'],
                'visa_type' => $data['visa_type'],
                'call_back_date' => $data['call_back_date'],
                'client_query' => $data['client_query'],
                'user_id' => $data['user_id'],
                'lead_id' => $data['lead_id'],
                'lead_other' => $data['lead_other'],
                'email' => $email,
                'name' => $name,
                'phone' => $phone,
            ];
            $this->CallTaggingRepository->create($create);
            return ['status' => true, 'message' => "Call Tagging Created Successfully!"];
        } catch (\Exception $exception) {
            Log::error("Error in CallTaggingService.create() " . $exception->getLine() . ' ' . $exception->getMessage());
        }
    }
    public function getCallTaggingList(array $data)
    {
        // Check if 'customer_name' is present in the request data
        $search = $data['name'] ?? '';
        $sortOrder = $data['sortOrder'] ?? 'desc';

        $LeadQuery = $this->CallTaggingRepository->getAll($sortOrder);
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
        if (!empty($data['status']) && $data['status'] != 100)
        {
            $LeadQuery->where('status', $data['status']);
        }
        // Fetch data with potential pagination if needed
        $dataLead = $LeadQuery->get();
        // Format the data according to DataTables requirements
        $formattedData  = $dataLead->map(function ($lead) {
            return [
                'id' => $lead->id,
                'user_type' => $lead->user_type,
                'type' => $lead->type,
                'lead_other' => $lead->lead_other,
                'call_back_date' => $lead->call_back_date,
                'client_query' => $lead->client_query,
                'name' => $lead->name,
                'email' => $lead->email, // Example field, replace with your actual field
                'phone' => $lead->phone, // Example field, replace with your actual field
                'visa_type' => $lead->visa_type, // Example field, replace with your actual field
                'location' => $lead->location, // Example field, replace with your actual field
                'status' => $lead->status, // Example field, replace with your actual field
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
    }
    public function delete(array $data)
    {
        try {

            $getData = $this->CallTaggingRepository->getById(['id' => $data['id']]); 
            if(!isset($getData)){
                return ['status'=>false , 'message'=>'Something went wrong!'];
            }
            $this->CallTaggingRepository->delete(['id'=> $data['id']]); 
            return ['status'=>true , 'message'=>'Call Tagging Deleted Successfully!'];
        } catch (\Exception $exception) {
            Log::error("Error in CallTaggingService.delete() " . $exception->getLine() . ' ' . $exception->getMessage());

        }
    }
}
