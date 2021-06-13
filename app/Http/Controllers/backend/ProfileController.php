<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;




class ProfileController extends Controller
{
    public function ViewProfile(){

        $id=Auth::user()->id;
        $user=User::find($id);
        return view('backend.profile.view_profile',['user'=>$user]);


    }

    public function EditProfile(){
        $id=Auth::user()->id;
        $user=User::find($id);
        return view('backend.profile.edit_profile',['user'=>$user]);


    }

    public function UpdateProfile(Request $request,$id){

        $old=$request->old;
        $image=$request->file('image');
        if($image){
            $img_ext=strtolower($image->getClientOriginalExtension());
            $name_gen=hexdec(uniqid());
            $imagename=$name_gen. '.'.$img_ext;
            Image::make($image)->resize(500,500)->save('upload/profile_image/'.$imagename);
            
            // unlink('upload/profile_image/'.$old);
            // unlink(public_path('upload/profile_image/'.$old));

           
    User::find($id)->update([
        'email'=>$request->email,   
        'name'=>$request->name,
        'usertype'=>$request->usertype,
        'mobile'=>$request->mobile,
        'gender'=>$request->gender,
        'address'=>$request->address,
        'image'=>$imagename,
        

    ]);
    $notification=array(
        'message'=> 'Profile updated successfully',
        'alert-type'=>'success'
    );
    
            return redirect()->route('profile.view')->with($notification);
            }
        
            else{

                User::find($id)->update([
                    'email'=>$request->email,   
                    'name'=>$request->name,
                    'usertype'=>$request->usertype,
                    'mobile'=>$request->mobile,
                    'gender'=>$request->gender,
                    'address'=>$request->address,
                    
                
            ]);
            $notification=array(
                'message'=> 'profile Updated successfully',
                'alert-type'=>'warning'
            );
            return redirect()->route('profile.view')->with($notification);
            }
        }


        public function EditPassword(){
            $id=Auth::user()->id;
            $user=User::find($id);
        return view('backend.profile.edit_password',['user'=>$user]);
        }
        

        public function UpdatePassword(Request $request,$id){

            $validated=$request->validate([
                'oldpassword'=> 'required',
                'password'=> 'required|confirmed',
            ]);
            $user=User::find($id);
            $hashedpassword=$user->password;
            if(Hash::check($request->oldpassword,$hashedpassword)){
                $user=User::find($id);
                $user->password=Hash::make($request->password);
                $user->save();
                Auth::logout();
    
                return redirect()->route('admin.logout');
            
            }else{
                
                $notification=array(
                    'message'=> 'Try Again',
                    'alert-type'=>'warning'
                );
                return redirect()->back()->with($notification);
    
    
            }
    
    
        }
}