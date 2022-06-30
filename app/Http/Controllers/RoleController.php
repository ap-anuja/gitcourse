<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', ['roles'=>$roles]);
    }
    public function store()
    {
        request()->validate([
            'name'=>['required']    
        ]);
        Role::create([
            'name'=> Str::ucfirst(request('name')),
            'slug'=> Str::of(Str::lower(request('name')))->slug('-'),
        ]);
        return back();
    }

    public function attach(Role $role)
    {
        $role->permissions()->attach(request('permission'));
        return back();
    }

    public function detach(Role $role)
    {
        $role->permissions()->detach(request('permission'));
        return back();
    }



    public function destroy(Role $role)
        {
            $role->delete();
            return back()->with('deleted', 'Role deleted successfully!');
        }
        public function edit(Role $role)
        {
            return view('admin.roles.edit', ['role'=>$role, 'permissions'=>Permission::all()]);

        }
        public function update(Role $role)
        {
            $role->name=Str::ucfirst(request('name'));
            $role->slug=Str::of(Str::lower(request('name')))->slug('-');

            if($role->isDirty('name'))
            {
                return back()->with('updated', 'Role is updated!');
                $role->save();
            }
            else
            {
                
                return back()->with('updated', 'Nothing is updated!');
            }
            return back();  
            
            
           // return view('admins.role.update', ['role'=>$role]);
        }
}
