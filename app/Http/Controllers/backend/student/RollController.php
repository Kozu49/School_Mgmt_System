<?php

namespace App\Http\Controllers\backend\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AssignStudent;
use App\Models\discount;
use Intervention\Image\Facades\Image;
use App\Models\Studentyear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use Illuminate\Support\Facades\Hash;
use DB;
use PDF;

class RollController extends Controller
{
    public function RollGenView(){
        $years=Studentyear::all();
        $classes=StudentClass::all();
        return view('backend.student.roll_gen.roll_gen_view',['years'=>$years,'classes'=>$classes]);

    }

    public function GetStudent(Request $request){

     

        $datas=AssignStudent::with(['student'])->where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
        return response()->json($datas);
    }

    public function StudentRollStore(Request $request){

        $year_id=$request->year_id;
        $class_id=$request->class_id;

        if($request->student_id!=null){
            for($i=0;$i<count($request->student_id); $i++){

                AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->where('student_id',$request->student_id[$i])->update([
                        'roll'=>$request->roll[$i],
                ]);
            }

        }else{
            $notification=array(
                'message'=> 'Please Select Student',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
    
        }
        $notification=array(
            'message'=> 'Roll Generated Sucessfully',
            'alert-type'=>'success'
        );
        return redirect()->route('student.roll.gen')->with($notification);
    }


}
