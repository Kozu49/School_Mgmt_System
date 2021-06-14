<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use App\Models\Studentyear;
use App\Models\StudentGroup;
use App\Models\StudentShift;




class SetupController extends Controller
{
    public function ViewStudentClass(){
        $classes=StudentClass::all();
        return view('backend.setup.student_class.view_class',['classes'=>$classes]);


    }

    public function AddStudentClass(){
        return view('backend.setup.student_class.add_class');

        
    }

    public function StoreStudentClass(Request $request){

        $validated = $request->validate([
            'name' => 'required',
            
        ]);
        StudentClass::insert([
            'name'=>$request->name,
                         
        ]);
        $notification=array(
            'message'=> 'Student Class Added successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('student.class')->with($notification);
        

    }

    public function EditStudentClass($id){

        $class=StudentClass::find($id);
        return view('backend.setup.student_class.edit_class',['class'=>$class]);
    }

    public function UpdateStudentClass(Request $request,$id){

        StudentClass::find($id)->update([
            'name'=>$request->name,
                         
        ]);
        $notification=array(
            'message'=> 'Student Class Updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('student.class')->with($notification);
    }

    public function DeleteStudentClass($id){
        StudentClass::find($id)->delete();
        $notification=array(
            'message'=> 'Student Class Deleted successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('student.class')->with($notification);
    }


    public function ViewStudentYear(){

        $years=Studentyear::all();
        return view('backend.setup.student_year.view_year',['years'=>$years]);

    }

    public function AddStudentYear(){

        return view('backend.setup.student_year.add_year');

    }

    public function StoreStudentyear(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            
        ]);
        Studentyear::insert([
            'name'=>$request->name,
                         
        ]);
        $notification=array(
            'message'=> 'Student year Added successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('student.year')->with($notification);
        

    }

    public function EditStudentyear($id){
        $year=Studentyear::find($id);
        return view('backend.setup.student_year.edit_year',['year'=>$year]);



    }
    

    public function UpdateStudentYear(Request $request, $id){
        Studentyear::find($id)->update([
            'name'=>$request->name,
                         
        ]);
        $notification=array(
            'message'=> 'Student year Updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('student.year')->with($notification);


    }

    public function DeleteStudentYear($id){
        Studentyear::find($id)->delete();
        $notification=array(
            'message'=> 'Student Year Deleted successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('student.year')->with($notification);
    


    }

    public function ViewStudentGroup(){
        $groups=StudentGroup::all();
        return view('backend.setup.student_group.view_group',['groups'=>$groups]);

    }

    public function AddStudentGroup(){
        return view('backend.setup.student_group.add_group');

    }

    public function StoreStudentGroup(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            
        ]);
        StudentGroup::insert([
            'name'=>$request->name,
                         
        ]);
        $notification=array(
            'message'=> 'Student Group Added successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('student.group')->with($notification);

    }

    public function EditStudentGroup($id){

        $group=StudentGroup::find($id);
        return view('backend.setup.student_group.edit_group',['group'=>$group]);


    }

    public function UpdateStudentGroup(Request $request,$id){
        StudentGroup::find($id)->update([
            'name'=>$request->name,
                         
        ]);
        $notification=array(
            'message'=> 'Student Group Updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('student.group')->with($notification);


    }

    public function DeleteStudentGroup($id){
        StudentGroup::find($id)->delete();
        $notification=array(
            'message'=> 'Student Group Deleted successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('student.group')->with($notification);
    


    }

    public function ViewStudentShift(){
        $shifts=StudentShift::all();
        return view('backend.setup.student_shift.view_shift',['shifts'=>$shifts]);


    }

    public function AddStudentShift(){
        return view('backend.setup.student_shift.add_shift');



    }

    public function StoreStudentShift(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            
        ]);
        StudentShift::insert([
            'name'=>$request->name,
                         
        ]);
        $notification=array(
            'message'=> 'Student Shift Added successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('student.shift')->with($notification);


    }

    public function EditStudentShift($id){
        $shift=StudentShift::find($id);
        return view('backend.setup.student_shift.edit_shift',['shift'=>$shift]);


    }

    public function UpdateStudentShift(Request $request,$id){
        StudentShift::find($id)->update([
            'name'=>$request->name,
                         
        ]);
        $notification=array(
            'message'=> 'Student Shift Updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('student.shift')->with($notification);

    }

    public function DeleteStudentShift($id){

        StudentShift::find($id)->delete();
        $notification=array(
            'message'=> 'Student Shift Deleted successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('student.shift')->with($notification);

    }





}
