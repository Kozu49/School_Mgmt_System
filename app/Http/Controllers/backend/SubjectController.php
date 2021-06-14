<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolSubject;

class SubjectController extends Controller

{
    public function ViewSchoolSubject(){
        $subjects=SchoolSubject::all();
        return view('backend.setup.school_subject.view_subject',['subjects'=>$subjects]);

    }

    public function AddSchoolSubject(){
        return view('backend.setup.school_subject.add_subject');

    }

    public function StoreSchoolSubject(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            
        ]);
        SchoolSubject::insert([
            'name'=>$request->name,
                         
        ]);
        $notification=array(
            'message'=> 'Subject Added successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('school.subject.view')->with($notification);


    }

    public function EditSchoolSubject($id){
        $subject=SchoolSubject::find($id);
        return view('backend.setup.school_subject.edit_subject',['subject'=>$subject]);

    }

    public function UpdateSchoolSubject(Request $request,$id){

        SchoolSubject::find($id)->update([
            'name'=>$request->name,
                         
        ]);
        $notification=array(
            'message'=> 'Subject Updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('school.subject.view')->with($notification);
    }

    public function DeleteSchoolSubject($id){
        SchoolSubject::find($id)->delete();
        $notification=array(
            'message'=> 'Subject Deleted successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('school.subject.view')->with($notification);
    }
}
