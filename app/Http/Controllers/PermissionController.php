<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index', ['permissions'=>$permissions]);
    }
    public function store()
    {
        request()->validate(['name'=>['required']]);
        Permission::create([
            'name'=> Str::ucfirst(request('name')),
            'slug'=> Str::of(Str::lower(request('name')))->slug('-'),
        ]);
        return back();
    }
    public function edit(Permission $permissions)
    {
        return view('admin.permissions.edit', ['permissions'=>$permissions]);
    }
    public function destroy(Permission $permissions)
    {
            $permissions->delete();
            return back()->with('deleted', 'Permission deleted successfully!');
    }
    public function update(Permission $permissions, Request $request)
        {

            $permissions = new Permission;
            $permissions->name=$request->name;
            $permissions->slug=$request->name;
            $permissions->save();
            return redirect()->route('permissions.index')->with('permission-created-message', 'permission was created');




            // $permissions->name=Str::ucfirst(request('name'));
            // $permissions->slug=Str::of(Str::lower(request('name')))->slug('-');

            // if($permissions->isDirty('name'))
            // {
            //     return back()->with('updated', 'Permission is updated!');
            //     $permissions->save();
            // }
            // else
            // {
            //     return back()->with('updated', 'Nothing is updated!');
            // }
            // return back();  
        }
        public function attach(Permission $permissions)
    {
        $permissions->roles()->attach(request('role'));
        return back();
    }
    public function detach(Permission $permissions)
    {
        $permissions->roles()->detach(request('role'));
        return back();
    }
}
