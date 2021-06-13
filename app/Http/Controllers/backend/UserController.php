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
        $users=User::all();
        return view('backend.user.view_user',['users'=>$users]);

    }

    public function AddUser(){
        return View('backend.user.add_user');
    }

    public function StoreUser(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|max:255',
            'password' => 'required',
            'usertype' => 'required',
        ]);

        
        User::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'usertype'=>$request->usertype,
            'password'=>Hash::make($request->password),              
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
            'usertype'=>$request->usertype,


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


