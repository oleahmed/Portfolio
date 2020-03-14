<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use App\Post;
use App\User;

class adminController extends Controller
{
    public function index()
    {
        // $postCount = count(Post::all());
        return view('admin.index');
    }

    public function showAllPost()
    {
        $user = Admin::all();
        return view('admin.postshow',compact('user'));
    }

    public function updateAdmin($id)
    {
        $admin = Admin::find($id);
        $data = [
            'name'=>$admin->name,
            'email'=>'admin@admin.com',
            'password'=>$admin->password
        ];
        User::create($data);

        $admin->delete();
        return 'done';
    }

    public function showLogin()
    {
        return view('admin.login');
    }

    public function login()
    {
                $this->validate(request(),[
            'name'=>'required',
            'password'=>'required'
        ]);

        if(Auth::guard('admin')->attempt(['name'=>request('name'), 'password'=>request('password')])){
            return redirect()->route('admin.dashboard');

        }else{
            return 'hoy nai';
        }
    }


    public function showPost()
    {
        return view('admin.post');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
            return redirect()->route('admin.login.show');
    }

}
