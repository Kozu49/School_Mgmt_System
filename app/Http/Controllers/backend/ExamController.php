<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamType;

class ExamController extends Controller
{
    public function ViewExamType(){
        $types=ExamType::all();
        return view('backend.setup.exam_type.view_type',['types'=>$types]);
    }

    public function AddExamType(){
        return view('backend.setup.exam_type.add_type');

    }

    public function StoreExamType(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            
        ]);
        ExamType::insert([
            'name'=>$request->name,
                         
        ]);
        $notification=array(
            'message'=> 'Exam Type Added successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('exam.type.view')->with($notification);

    }

    public function EditExamType($id){
        $type=ExamType::find($id);
        return view('backend.setup.exam_type.edit_type',['type'=>$type]);

    }

    public function UpdateExamType(Request $request,$id){

        ExamType::find($id)->update([
            'name'=>$request->name,
                         
        ]);
        $notification=array(
            'message'=> 'Exam Type Updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('exam.type.view')->with($notification);
    }

    public function DeleteExamType($id){

        ExamType::find($id)->delete();
        $notification=array(
            'message'=> 'Exam Type Deleted successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('exam.type.view')->with($notification);
    }
}
