<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    public function index()
    {
        return view('Admin.roles-permissions');
    }
    public function getRolesPermissions(Request $request)
    {
        try {
            $roles = Role::get();
            $formattedData  = $roles->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'created' => $user->created_at->format('d M Y, h:i a'),
                    'Action' => '' // You can add any action buttons here if needed
                ];
            });
            // return response()->json(['data' => $data]);
            return response()->json([
                'data' => $formattedData,
                'draw' => $data['draw'] ?? 1,
                'recordsTotal' => $roles->count(),
                'recordsFiltered' => $roles->count()
            ]);
        } catch (\Exception $th) {
            Log::error("Error in RoleController.getRolesPermissions()". $th->getLine() .' '.$th->getMessage());
        }
    }
    public function createRoles(Request $request)
    {
        try {
            $exsits = Role::where('name', $request->name)->first();
            if(isset($exsits)){
                return ['status'=>false, 'message'=>'This role name is already Exists!'];
            }else{
                Role::create(['name'=>$request->name]);
                return ['status'=>true, 'message'=>'Role Created Successfully!'];
            }
        } catch (\Exception $th) {
            Log::error("Error in RoleController.createRoles()". $th->getLine() .' '.$th->getMessage());
        }
    }
    public function editRoles(Request $request)
    {
        try {
            $IdNotexsits = Role::where('id', $request->id)->first();
            if(!isset($IdNotexsits)){
                return ['status'=>false, 'message'=>'Something Went Wrong!'];
            }   
            $exsits = Role::where('name', $request->name)->where('id' , '!=' , $request->id)->first();

            if(isset($exsits)){
                return ['status'=>false, 'message'=>'This role name is already Exists!'];
            }else{
                Role::where('id', $request->id)->update(['name'=>$request->name]);
                return ['status'=>true, 'message'=>'Role Updated Successfully!'];
            }
        } catch (\Exception $th) {
            Log::error("Error in RoleController.createRoles()". $th->getLine() .' '.$th->getMessage());
        }
    }
}
