<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    

//******************************************************************************** */
  // Role All Function  
    public function RoleListPage(){
        $roles = Role::paginate(5);
        return view('dashboard.component.role.role-list', compact('roles'));
    }
    public function RoleCreatePage(){
        return view('dashboard.component.role.role-create');
    }
    public function RoleEditPage($id)
    {
        $role = Role::findOrFail($id);
        return view('dashboard.component.role.role-edit', compact('role'));
    }
    
    public function RolePermissionEditPage($id)
    {
        $role = Role::findById($id);

        if (!$role) {
            return redirect()->route('roles.index')->with('error', 'Role not found.');
        }
        
        $permissions = Permission::all()->groupBy(function($permission) {
            return explode(' ', $permission->name)[0];
        });

        return view('dashboard.component.role.giv-permission', compact('role', 'permissions'));
    }


  //Role Api Function

    public function RoleCreate(Request $request){
        $role = new Role();
        $role->name = $request->name;
        $role->save();
        return redirect()->route('role-list')->with('success', 'Role created successfully');
    }
    public function RoleUpdate(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->all());
        return redirect()->route('role-list')->with('success', 'Role updated successfully');
    }
    public function RoleDestroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('role-list')->with('success', 'Role deleted successfully');
    }
    
    public function RolePermissionUpdate(Request $request, $id)
    {
        $role = Role::findById($id);
        $permissions = $request->permissions;

        // সকল পুরনো পারমিশন মুছে ফেলুন এবং নতুন পারমিশন যোগ করুন
        $role->syncPermissions($permissions);
        return redirect()->route('role-list')->with('success', 'Permissions updated successfully!');
        
    }
 // Role Function End
//******************************************************************************** */

    










//******************************************************************************** */
  // Permission All Function
    public function PermissionListPage(){
        // $user = Auth::user();
        // if ($user->hasRole('Super Admin')) {
        $permissions = Permission::paginate(5);
        return view('dashboard.component.permission.permission-list', compact('permissions'));
       
       
        
    }
    public function PermissionCreatePage(){
        return view('dashboard.component.permission.permission-create');
    }

    public function PermissionCreate(Request $request){
        $permission = new Permission();
        $permission->name = $request->name;
        $permission->save();
        return redirect()->route('permission-list')->with('success', 'Permission created successfully');
    }

    public function PermissionEditPage($id)
    {
        $permission = Permission::findOrFail($id);
        return view('dashboard.component.permission.permission-edit', compact('permission'));
    }


    public function PermissionUpdate(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $permission->update($request->all());
        return redirect()->route('permission-list')->with('success', 'Permission updated successfully');
    }


        public function PermissionDestroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return redirect()->route('permission-list')->with('success', 'Permission deleted successfully');
    }


  // Permission Function End
//******************************************************************************** */






























   



}
