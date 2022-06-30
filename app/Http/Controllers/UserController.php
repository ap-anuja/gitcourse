<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user =User::all();
        return view('admin.users.index', ['user'=>$user]);
    }

    public function show(User $user)
    {
        return view('admin.users.profile', ['user'=>$user, 'roles'=>Role::all()]);
    }
    public function update(User $user)
    {

        $inputs =request()->validate([
            'username'=>['required', 'string', 'max:255', 'alpha_dash'],
            'name'=>['required', 'string', 'max:255'],
            'email'=>['required', 'email', 'max:255'],
            'avatar'=>['file'],
            'password'=>['min:6', 'max:255', 'confirmed']
        ]);
        $user->update($inputs);
        if(request('avatar'))
        {
           $inputs['avatar']=request('avatar')->store('images');
        }
        return back();
        //return view('user.profile.update');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('user-deleted', 'user deleted successfully');
    }
    public function attach(User $user)
    {
        $user->roles()->attach(request('role'));
        return back();
    }
    public function detach(User $user)
    {
        $user->roles()->detach(request('role'));
        return back();
    }
}
