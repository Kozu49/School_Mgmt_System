<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolSubject;
use App\Models\AssignSubject;
use App\Models\StudentClass;

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
    


    // Assign Subject

    public function ViewAssignSubject(){

        //  $Subjects=AssignSubject::all();
         $subjects=AssignSubject::select('class_id')->groupBy('class_id')->get();

        
         return view('backend.setup.assign_subject.view_subject',['subjects'=>$subjects]);
 
    }

    public function AddAssignSubject(){

        $subjects=SchoolSubject::all();
        $classes=StudentClass::all();
        return view('backend.setup.assign_subject.add_subject',['subjects'=>$subjects,'classes'=>$classes]);
    }

    public function StoreAssignSubject(Request $request){
        $countsubject=Count($request->subject_id);
        if($countsubject != NULL){
            for($i=0; $i<$countsubject ;$i++){
                AssignSubject::insert([
                    'class_id'=>$request->class_id,
                    'subject_id'=>$request->subject_id[$i],
                    'full_mark'=>$request->full_mark[$i],
                    'pass_mark'=>$request->pass_mark[$i],
                    'subjective_mark'=>$request->subjective_mark[$i],

                          
                ]);
            } 
        }
                $notification=array(
                    'message'=> 'Subject Attached successfully',
                    'alert-type'=>'success'
                );
                return redirect()->route('assign.subject.view')->with($notification);
    }



    public function EditAssignSubject($class_id){

        $classes=StudentClass::all();
        $subjects=SchoolSubject::all();
        // $feeamounts=FeeCategoryAmount::where('fee_category_id','$fee_category_id')->orderBy('student_class_id','asc')->get();
        $assigns=AssignSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
        return view('backend.setup.assign_subject.edit_subject',['assigns'=>$assigns,'subjects'=>$subjects,'classes'=>$classes]);
    }


    public function UpdateAssignSubject(Request $request,$class_id){
        if($request->subject_id==NULL){

            $notification=array(
                'message'=> 'Please Select Subject',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);


        }else{
            $countsubject=Count($request->subject_id);
            AssignSubject::where('class_id',$class_id)->delete();

            for($i=0; $i<$countsubject ;$i++){

                AssignSubject::insert([
                    'class_id'=>$request->class_id,
                    'subject_id'=>$request->subject_id[$i],
                    'full_mark'=>$request->full_mark[$i],
                    'pass_mark'=>$request->pass_mark[$i],
                    'subjective_mark'=>$request->subjective_mark[$i],
                ]);
            
            }
                $notification=array(
                    'message'=> 'Subject Assignment Updated Successfully',
                    'alert-type'=>'success'
                );
                return redirect()->back()->with($notification);


         }


    }

    public function DetailsAssignSubject($class_id){

        $details=AssignSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
        return view('backend.setup.assign_subject.details_subject',['details'=>$details]);
    }

   




}
