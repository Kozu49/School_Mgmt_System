<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function ViewUser(){
        $users=User::where('usertype','Admin')->get();
        return view('backend.user.view_user',['users'=>$users]);

    }

    public function AddUser(){
        return View('backend.user.add_user');
    }

    public function StoreUser(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|max:255',
            
            
        ]);

        $code=rand(0000,9999);
        User::insert([
           

            'code'=>$code,
            'name'=>$request->name,
            'role'=>$request->role,
            'email'=>$request->email,
            'usertype'=>'Admin',
            'password'=>Hash::make($code),              
        ]);
        $notification=array(
            'message'=> 'Users Added successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('user.view')->with($notification);
        
    }

    public function EditUser($id){

        $user=User::find($id);
        return view('backend.user.edit_user',['user'=>$user]);
    }

    public function UpdateUser(Request $request,$id){

        User::find($id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>$request->role,


        ]);
        $notification=array(
            'message'=> 'User Updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('user.view')->with($notification);
    }

    public function DeleteUser($id){

        user::find($id)->delete();
        $notification=array(
            'message'=> 'User Deketed successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('user.view')->with($notification);

    }




}


