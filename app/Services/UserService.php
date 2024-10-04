<?php

namespace App\Services;

use App\Jobs\SendRegistrationEmail;
use App\Models\Role;
use App\Repositories\Eloquent\UserRepository;
use Illuminate\Support\Facades\Log;
use App\Services\SendMailService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService
{
    protected $userRepository;
    protected $SendMailService;

    public function __construct(UserRepository $userRepository, SendMailService $SendMailService)
    {
        $this->userRepository = $userRepository;
        $this->SendMailService = $SendMailService;
    }
    public function createUser(array $data)
    {
        try {
            $checkData = $this->userRepository->getByWhere(['email' => $data['email']]);
            if (isset($checkData)) {
                return ['status' => false, 'message' => "This email is already added!"];
            }
            $role = Role::where('name', 'LIKE', '%'.  $data['user_type'] .'%')->first();
            if(isset($role)){
                $data['role_id'] = $role->id;
                $data['uuid'] = Str::uuid(); 
            }
            $this->userRepository->create($data);

            $login_link = env('APP_URL') . $data['user_type'] . '/login';
            $sendData = [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
                'login_link' => $login_link
            ];

            SendRegistrationEmail::dispatch($sendData);

            return ['status' => true, 'message' => "User Created Successfully!"];
        } catch (\Exception $exception) {
            Log::error("Error in UserService.createUser() " . $exception->getLine() . ' ' . $exception->getMessage());
        }
        // return $this->userRepository->create($data);
    }
    public function getManageUsers(array $data)
    {
        // Check if 'customer_name' is present in the request data
        $search = $data['customer_name'] ?? '';
        $sortOrder = $data['sortOrder'] ?? 'asc';
        $statuses = isset($data['statuses']) && is_array($data['statuses']) ? $data['statuses'] : [];


        // Modify query based on search input
        $usersQuery = $this->userRepository->getAll($sortOrder);

        if (!empty($search)) {
            $usersQuery->where('name', 'like', "%$search%");
        }
        // Apply date range filter
        if ($data['startDate'] && $data['endDate']) {
            // Convert the start and end dates to datetime objects
            $startDate = date('Y-m-d 00:00:00', strtotime($data['startDate']));
            $endDate = date('Y-m-d 23:59:59', strtotime($data['endDate']));
            $usersQuery->whereBetween('created_at', [$startDate, $endDate]);
        }
        // search by status 
        if (!empty($statuses)) {
            $usersQuery->whereIn('status', $statuses);
        }
        // Fetch data with potential pagination if needed
        if(isset($data['user_type_get'])){
            $usersQuery->where('user_type',$data['user_type_get']);
        }
        $users = $usersQuery->get();
        // Format the data according to DataTables requirements
        $formattedData  = $users->map(function ($user) {
            return [
                'id' => $user->id,
                'customer_name' => $user->name,
                'last_name' => $user->last_name,
                'is_online' => $user->is_online,
                'customer_no' => $user->user_type, // Example field, replace with your actual field
                'phone' => $user->phone,
                'email' => $user->email,
                'created' => $user->created_at->format('d M Y, h:i a'),
                'status' => $user->status,
                'employee_assign' => $user->assign_employee,
                'Action' => '' // You can add any action buttons here if needed
            ];
        });
        // return response()->json(['data' => $data]);
        return response()->json([
            'data' => $formattedData,
            'draw' => $data['draw'] ?? 1,
            'recordsTotal' => $users->count(),
            'recordsFiltered' => $users->count()
        ]);
    }
    public function deleteUser(array $id)
    {
        try {
            $checkData = $this->userRepository->getByWhere(['id' => $id]);
            if (!isset($checkData)) {
                return ['status' => false, 'message' => "Something Went Wrong!"];
            }
            $this->userRepository->delete(['id' => $id]);
            return ['status' => true, 'message' => "User Deleted Successfully!"];
        } catch (\Exception $exception) {
            Log::error("Error in UserService.deleteUser() " . $exception->getLine() . ' ' . $exception->getMessage());
        }
    }
    public function getDeleteRequest(array $data)
    {
        // Check if 'customer_name' is present in the request data
        $search = $data['customer_name'] ?? '';
        $sortOrder = $data['sortOrder'] ?? 'asc';


        // Modify query based on search input
        $usersQuery = $this->userRepository->getAll($sortOrder);

        if (!empty($search)) {
            $usersQuery->where('name', 'like', "%$search%");
        }
        // Apply date range filter
        if (isset($data['startDate']) && isset($data['endDate'])) {
            // Convert the start and end dates to datetime objects
            $startDate = date('Y-m-d 00:00:00', strtotime($data['startDate']));
            $endDate = date('Y-m-d 23:59:59', strtotime($data['endDate']));
            $usersQuery->whereBetween('created_at', [$startDate, $endDate]);
        }
        // Fetch data with potential pagination if needed
        $users = $usersQuery->onlyTrashed()->get();
        // Format the data according to DataTables requirements
        $formattedData  = $users->map(function ($user) {
            return [
                'id' => $user->id,
                'customer_name' => $user->name,
                'customer_no' => $user->user_type, // Example field, replace with your actual field
                'created' => $user->created_at->format('d M Y, h:i a'),
                'delete_request' => $user->deleted_at->format('d M Y, h:i a'),
                'Action' => '' // You can add any action buttons here if needed
            ];
        });
        // return response()->json(['data' => $data]);
        return response()->json([
            'data' => $formattedData,
            'draw' => $data['draw'] ?? 1,
            'recordsTotal' => $users->count(),
            'recordsFiltered' => $users->count()
        ]);
    }
    public function recoverUser(array $data)
    {
        try {
            $checkData = $this->userRepository->getByWhereTrashed(['id' => $data['id']]);
            if (!isset($checkData)) {
                return ['status' => false, 'message' => "Something Went Wrong!"];
            }
            $checkData->restore();
            return ['status' => true, 'message' => "User Recovered Successfully!"];
        } catch (\Exception $exception) {
            Log::error("Error in UserService.recoverUser() " . $exception->getLine() . ' ' . $exception->getMessage());
        }
    }
    public function updateUser(array $data)
    {
        try {
            $checkData = $this->userRepository->getByWhere(['id' => $data['id']]);
            if (!isset($checkData)) {
                return ['status' => false, 'message' => "Something Went Wrong!"];
            }
            if(is_null($data['password'])){
                unset($data['password']);
            }else{
                $data['password'] = Hash::make($data['password']);
            }
            unset($data['repeat_password']);
            unset($data['_token']);
            $this->userRepository->update(['id' => $data['id']],$data);
            return ['status' => true, 'message' => "User Updated Successfully!"];
        } catch (\Exception $exception) {
            Log::error("Error in UserService.updateUser() " . $exception->getLine() . ' ' . $exception->getMessage());
        }
    }
    public function permanentDeleteRequest(array $data)
    {
        try {
            $checkData = $this->userRepository->getByWhereTrashed(['id' => $data['id']]);
            if (!isset($checkData)) {
                return ['status' => false, 'message' => "Something Went Wrong!"];
            }
            $this->userRepository->destroy($data['id']);
            return ['status' => true, 'message' => "User Permanent Deleted Successfully!"];
        } catch (\Exception $exception) {
            Log::error("Error in UserService.permanentDeleteRequest() " . $exception->getLine() . ' ' . $exception->getMessage());
        }
    }
    public function changePassword(array $data)
    {
        try {
            $checkData = $this->userRepository->getByWhere(['id' => $data['id']]);
            if (!isset($checkData)) {
                return ['status' => false, 'message' => "Something Went Wrong!"];
            }
            if(Hash::check($data['old_password'], $checkData->password)){
                $data['password'] = Hash::make($data['new_password']);
                unset($data['repeat_password']);
                unset($data['old_password']);
                unset($data['new_password']);
                unset($data['_token']);
                $this->userRepository->update(['id' => $data['id']],$data);
                return ['status' => true, 'message' => "User Updated Successfully!"];
            }else{
                return ['status' => false, 'message' => "Incorrect Old Password!"];
            }
        } catch (\Exception $th) {
            Log::error('Error in UserService.changePassword() '.$th->getLine().' '.$th->getMessage());
        }
    }
    public function changeVideoShowStatus()
    {
        try {
            $this->userRepository->update(['id' => Auth()->user()->id],['video_shows'=>true]);
            return ['status' => true, 'message' => "User Permanent Deleted Successfully!"];
        } catch (\Exception $exception) {
            Log::error("Error in UserService.changeVideoShowStatus() " . $exception->getLine() . ' ' . $exception->getMessage());
        } 
    }
    public function getEmployees()
    {
        try {
            return $this->userRepository->getEmployees(['user_type'=>'employee']);
        } catch (\Exception $exception) {
            Log::error("Error in UserService.getEmployees() " . $exception->getLine() . ' ' . $exception->getMessage());
        }        
    }
    public function getEmployers()
    {
        try {
            return $this->userRepository->getEmployees(['user_type'=>'employer']);
        } catch (\Exception $exception) {
            Log::error("Error in UserService.getEmployers() " . $exception->getLine() . ' ' . $exception->getMessage());
        }        
    }
    public function userDetail($id, $user_type)
    {
        try {
            return $this->userRepository->getAllDataOFFirst(['id'=>$id, 'user_type'=>$user_type]);
        } catch (\Exception $exception) {
            Log::error("Error in UserService.userDetail() " . $exception->getLine() . ' ' . $exception->getMessage());
        } 
    }
    public function update(array $data)
    {
        try {
            return $this->userRepository->update($data['id'],['assign_employee'=>$data['assign_employee']]);
        } catch (\Exception $exception) {
            Log::error("Error in UserService.update() " . $exception->getLine() . ' ' . $exception->getMessage());
        }
    }
    public function getUsers(array $data)
    {
        try {
            $getData = $this->userRepository->getEmployees($data);
            return ['status'=>true, 'user'=>$getData];
        } catch (\Exception $exception) {
            Log::error("Error in UserService.getUsers() " . $exception->getLine() . ' ' . $exception->getMessage());
        }    
    }
    public function usersSearch()
    {
        try {
            $userid = Auth::user()->id;
            return $this->userRepository->usersSearch($userid);
        } catch (\Exception $exception) {
            Log::error("Error in UserService.usersSearch() " . $exception->getLine() . ' ' . $exception->getMessage());
        }  
    }
}
