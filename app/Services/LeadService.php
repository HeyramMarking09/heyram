<?php

namespace App\Services;

use App\Repositories\Eloquent\LeadRepository;
use Illuminate\Support\Facades\Log;

class LeadService
{
    protected $LeadRepository;

    public function __construct(LeadRepository $LeadRepository)
    {
        $this->LeadRepository = $LeadRepository;
    }
    public function create(array $data)
    {
        try {
            unset($data['_token']);
            $this->LeadRepository->create($data);
            return ['status' => true, 'message' => "Lead Created Successfully!"];
        } catch (\Exception $exception) {
            Log::error("Error in UserService.create() " . $exception->getLine() . ' ' . $exception->getMessage());
        }
    }
    public function deleteLead(array $data)
    {
        try {
            $this->LeadRepository->delete($data['id']);
            return ['status' => true, 'message' => "Lead Deleted Successfully!"];
        } catch (\Exception $exception) {
            Log::error("Error in UserService.deleteLead() " . $exception->getLine() . ' ' . $exception->getMessage());
        }
    }
    public function update(array $data)
    {
        try {
            unset($data['_token']);
            
            $exists = $this->LeadRepository->getById(['id'=>$data['id']]);
            if(!isset($exists))
            {
                return ['status' => false, 'message' => "Something Went Wrong!"];
            }
            $this->LeadRepository->update($data['id'] ,$data);
            return ['status' => true, 'message' => "Lead Updated Successfully!"];
        } catch (\Exception $exception) {
            Log::error("Error in UserService.update() " . $exception->getLine() . ' ' . $exception->getMessage());
        }
    }
    public function getAll(array $data)
    {
        try {
            // Check if 'customer_name' is present in the request data
            $search = $data['name'] ?? '';
            $sortOrder = $data['sortOrder'] ?? 'asc';

            $LeadQuery = $this->LeadRepository->getAll($sortOrder);
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
            if (!empty($data['statuses']))
            {
                $LeadQuery->whereIn('status', $data['statuses']);
            }
            // Fetch data with potential pagination if needed
            $dataLead = $LeadQuery->get();
            // Format the data according to DataTables requirements
            $formattedData  = $dataLead->map(function ($lead) {
                return [
                    'id' => $lead->id,
                    'name' => $lead->name,
                    'email' => $lead->email, // Example field, replace with your actual field
                    'phone' => $lead->phone, // Example field, replace with your actual field
                    'visa_type' => $lead->visa_type, // Example field, replace with your actual field
                    'lead_source' => $lead->lead_source, // Example field, replace with your actual field
                    'location' => $lead->location, // Example field, replace with your actual field
                    'status' => $lead->status, // Example field, replace with your actual field
                    'created' => $lead->created_at->format('d M Y, h:i a'),
                    'assign_employee' => $lead->assign_employee,
                    'is_active' => $lead->is_active,
                    'country' => $lead->country,
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
            Log::error("Error in UserService.getAll() " . $exception->getLine() . ' ' . $exception->getMessage());
        }
    }
    public function get(array $data)
    {
        $LeadQuery = $this->LeadRepository->get($data);
        if(isset($LeadQuery)){
            return ['status'=>true ,'leads'=>$LeadQuery];
        }else{
            return ['status'=>false ,'leads'=>'Not Found!'];
        }
    }
}
