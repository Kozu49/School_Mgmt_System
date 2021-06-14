<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationController extends Controller
{
    public function ViewDesignation(){

        $designations=Designation::all();
        return view('backend.setup.designation.view',['designations'=>$designations]);
    }

    public function AddDesignation(){
        return view('backend.setup.designation.add');

    }

    public function StoreDesignation(Request $request){

        $validated = $request->validate([
            'name' => 'required',
            
        ]);
        Designation::insert([
            'name'=>$request->name,
                         
        ]);
        $notification=array(
            'message'=> 'Designation Added successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('designation.view')->with($notification);
    }

    public function EditDesignation($id){

        $designation=Designation::find($id);
        return view('backend.setup.designation.edit',['designation'=>$designation]);
    }

    public function UpdateDesignation(Request $request,$id){

        Designation::find($id)->update([
            'name'=>$request->name,
                         
        ]);
        $notification=array(
            'message'=> 'Designation Updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('designation.view')->with($notification);
    }

    public function DeleteDesignation($id){

        Designation::find($id)->delete();
        $notification=array(
            'message'=> 'Designation Deleted successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('designation.view')->with($notification);
    }
}
