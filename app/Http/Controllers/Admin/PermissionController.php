<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PermissionController extends Controller
{
    public function index($id)
    {
        try {
            $role = Role::with('permissions')->findOrFail($id);
            $permissions = Permission::all(); // Or you can filter based on modules or other criteria
            return view('Admin.permission', compact('role', 'permissions'));
        } catch (\Exception $th) {
            Log::error("Error in PermissionController.index() ". $th->getLine() .' '.$th->getMessage());
        }
    }
    public function permissionUpdate(Request $request)
    {
        $role = Role::findOrFail($request->role_id);
        $permission = Permission::findOrFail($request->permission_id);
        
        if($request->is_checked == true || $request->is_checked == 'true'){
            $is_checked = 1;
        }
        if($request->is_checked == false || $request->is_checked == 'false'){
            $is_checked = 0;
        }
        // Determine which permission type is being updated
        switch ($request->permission_type) {
            case 2: // Create
                $role->permissions()->syncWithoutDetaching([$permission->id => ['can_create' => $is_checked]]);
                break;
            case 3: // Edit
                $role->permissions()->syncWithoutDetaching([$permission->id => ['can_edit' => $is_checked]]);
                break;
            case 4: // View
                $role->permissions()->syncWithoutDetaching([$permission->id => ['can_view' => $is_checked]]);
                break;
            case 5: // Delete
                $role->permissions()->syncWithoutDetaching([$permission->id => ['can_delete' => $is_checked]]);
                break;
        }
        return response()->json(['message' => 'Permission updated successfully.']);
    }
}
