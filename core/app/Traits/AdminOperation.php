<?php

namespace App\Traits;

use App\Constants\Status;
use App\Models\Admin;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

trait AdminOperation
{
    public function list()
    {
        $admins    = Admin::with('roles')->latest('id')->get();
        $pageTitle = 'Manage Admin';
        $view      = "admin.admin.list";
        $roles     = Role::where('status', Status::ENABLE)->get();
        return responseManager("admin", $pageTitle, 'success', compact('admins', 'view', 'pageTitle', 'roles'));
    }

    public function save(Request $request, $id = 0)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:admins,email,' . $id,
            'password' => $id ? 'nullable' : 'required|string|min:6',
            'roles'    => 'nullable|array',
        ]);

        if ($id) {
            $admin   = Admin::where('id', $id)->first();
            $message = "Admin updated successfully";
            $remark  = "admin-updated";

            if($admin->id == Status::SUPPER_ADMIN_ID && $admin->id != auth()->guard('admin')->id()){
                $message="You can not right permission for edit this admin";
                return responseManager("admin", $message, 'error');
            }
        } else {
            $admin           = new Admin();
            $admin->password = Hash::make($request->password);
            $message         = "Admin saved successfully";
            $remark          = "admin-added";
        }

        $admin->name     = $request->name;
        $admin->email    = $request->email;
        // $admin->username = $request->username;
        $admin->save();

        if ($request->roles && count($request->roles)) {
            if ($admin->id == Status::SUPPER_ADMIN_ID) {
                $roleId = array_unique(array_merge($request->roles, Role::where('id', Status::SUPER_ADMIN_ROLE_ID)->pluck('id')->toArray()));
            } else {
                $roleId = $request->roles;
            }
            $roles = Role::whereIn('id', $roleId)->pluck('name')->toArray();
            $admin->syncRoles($roles);
        }

        return responseManager("admin", $message, 'success', compact('admin'));
    }

    public function delete($id)
    {
        $admin = Admin::findOrFail($id);
        if($admin->id == Status::SUPPER_ADMIN_ID){
            $message="You are not allowed to delete the super admin";
            return responseManager("admin", $message, 'error');
        }
        $admin->delete();

        $message = "Admin deleted successfully";
        return responseManager("admin", $message, 'success');
    }

    public function passwordUpdate(Request $request)
    {
        $pageTitle = "Change Password";
        $admin     = getAdmin();

        $request->validate([
            'old_password' => 'required',
            'password'     => 'required|confirmed',
        ]);
        if (!Hash::check($request->old_password, $admin->password)) {
            return responseManager("admin", "Old password is incorrect!", 'error');
        }

        $admin->password = Hash::make($request->password);
        $admin->save();

        $message = "Password updated successfully";
        return responseManager("password_update", $message, 'success', compact('pageTitle', 'admin'));
    }
}
