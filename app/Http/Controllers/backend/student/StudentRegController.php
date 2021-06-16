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





class StudentRegController extends Controller
{
    public function ViewStudentReg(){
        // $assigns=AssignStudent::all();
        $years=Studentyear::all();
        $classes=StudentClass::all();

        $year_id=Studentyear::orderBy('id','asc')->first()->id;
        $class_id=StudentClass::orderBy('id','asc')->first()->id;
        $assigns=AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->get();

        // $assigns=DB::table('assign_students')->where('year_id',$year_id->id)->where('class_id',$class_id->id)->orderBy('id','desc')->paginate(5);


        return view('backend.student.student_reg.view_reg',['assigns'=>$assigns,'classes'=>$classes,'years'=>$years,'year_id'=>$year_id,'class_id'=>$class_id ]);

    }

    public function AddStudentReg(){
        $years=Studentyear::all();
        $classes=StudentClass::all();
        $groups=StudentGroup::all();
        $shifts=StudentShift::all();


        return view('backend.student.student_reg.add_reg',['groups'=>$groups,'classes'=>$classes,'years'=>$years,'shifts'=>$shifts]);


    }

    public function StoreStudentReg(Request $request){

        DB::transaction(function() use($request){
            $checkyear=Studentyear::find($request->year_id)->name;
            $student=User::where('usertype','Student')->orderBy('id','desc')->first();
            
            if($student==NULL){
                $firstReg=0;
                $studentId=$firstReg+1;

                if($studentId<10){
                    $id_no="000".$studentId;
                }elseif($studentId<100){
                    $id_no="00".$studentId;
                }elseif($studentId<1000){
                    $id_no="0".$studentId;
                }
            }else{
                $student=User::where('usertype','Student')->orderBy('id','desc')->first()->id;
                $studentId=$student+1;
                if($studentId<10){
                    $id_no="000".$studentId;
                }elseif($studentId<100){
                    $id_no="00".$studentId;
                }elseif($studentId<1000){
                    $id_no="0".$studentId;
                }
            }

            $final_id_no=$checkyear.$id_no;

            $user=new User();
            $code=rand(0000,9999);
            $user->password=bcrypt($code);
            $user->usertype='Student';
            $user->code=$code;
            $user->id_no=$final_id_no;
            $user->name=$request->name;
            $user->fname=$request->fname;
            $user->mname=$request->mname;
            $user->mobile=$request->mobile;
            $user->address=$request->address;
            $user->gender=$request->gender;
            $user->religion=$request->religion;
            $user->dob=date('Y-m-d',strtotime($request->dob));
            
            $image=$request->file('image');
            if($image){
                $img_ext=strtolower($image->getClientOriginalExtension());
                $name_gen=hexdec(uniqid());
                $imagename=$name_gen. '.'.$img_ext;
                Image::make($image)->resize(500,500)->save('upload/student_image/'.$imagename);
                $user->image=$imagename;
            }
            $user->save();

            $assign_student=new AssignStudent();
            $assign_student->student_id=$user->id;
            $assign_student->year_id=$request->year_id;
            $assign_student->class_id=$request->class_id;
            $assign_student->group_id=$request->group_id;
            $assign_student->shift_id=$request->shift_id;
            $assign_student->save();

            $discount_student=new discount();
            $discount_student->assign_student_id=$assign_student->id;
            $discount_student->fee_category_id="1";
            $discount_student->discount=$request->discount;
            $discount_student->save();

        });
        $notification=array(
            'message'=> 'Student Registration Inserted successfully',
            'alert-type'=>'warning'
        );
        return redirect()->route('student.registration.view')->with($notification);

    }

    public function SearchStudentReg(Request $request){

        $years=Studentyear::all();
        $classes=StudentClass::all();
        $year_id=$request->year_id;
        $class_id=$request->class_id;

        $assigns=AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->get();



        return view('backend.student.student_reg.view_reg',['assigns'=>$assigns,'classes'=>$classes,'years'=>$years,'year_id'=>$year_id,'class_id'=>$class_id]);



    }

    public function EditStudentReg($student_id){

        $years=Studentyear::all();
        $classes=StudentClass::all();
        $groups=StudentGroup::all();
        $shifts=StudentShift::all();

        $edit=AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
        return view('backend.student.student_reg.edit_reg',['edit'=>$edit,'years'=>$years,'classes'=>$classes,'groups'=>$groups,'shifts'=>$shifts]);
        // dd($edit->toArray());




    }

    public function UpdateStudentReg(Request $request,$student_id){

        DB::transaction(function() use($request, $student_id){
           
            $user=User::where('id',$student_id)->first();
           
            $user->name=$request->name;
            $user->fname=$request->fname;
            $user->mname=$request->mname;
            $user->mobile=$request->mobile;
            $user->address=$request->address;
            $user->gender=$request->gender;
            $user->religion=$request->religion;
            $user->dob=date('Y-m-d',strtotime($request->dob));
            
            $image=$request->file('image');
            if($image){
                @unlink(public_path('upload/student_image/'.$user->image));
                $img_ext=strtolower($image->getClientOriginalExtension());
                $name_gen=hexdec(uniqid());
                $imagename=$name_gen. '.'.$img_ext;
                Image::make($image)->resize(500,500)->save('upload/student_image/'.$imagename);
                $user->image=$imagename;
            }
            $user->save();

            $assign_student=AssignStudent::where('student_id',$student_id)->first();

            $assign_student->year_id=$request->year_id;
            $assign_student->class_id=$request->class_id;
            $assign_student->group_id=$request->group_id;
            $assign_student->shift_id=$request->shift_id;
            $assign_student->save();

            $discount_student=discount::where('assign_student_id',$request->id)->first();
            
            $discount_student->discount=$request->discount;
            $discount_student->save();

        });
        $notification=array(
            'message'=> 'Student Registration Updated successfully',
            'alert-type'=>'warning'
        );
        return redirect()->route('student.registration.view')->with($notification);

    }

    public function PromoteStudentReg($student_id){
        $years=Studentyear::all();
        $classes=StudentClass::all();
        $groups=StudentGroup::all();
        $shifts=StudentShift::all();

        $edit=AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
        return view('backend.student.student_reg.promote_reg',['edit'=>$edit,'years'=>$years,'classes'=>$classes,'groups'=>$groups,'shifts'=>$shifts]);

    }

    public function UpdatePromoteStudentReg(Request $request, $student_id){

        DB::transaction(function() use($request, $student_id){
           
           
            $user=User::where('id',$student_id)->first();
           
            $user->name=$request->name;
            $user->fname=$request->fname;
            $user->mname=$request->mname;
            $user->mobile=$request->mobile;
            $user->address=$request->address;
            $user->gender=$request->gender;
            $user->religion=$request->religion;
            $user->dob=date('Y-m-d',strtotime($request->dob));
            
            $image=$request->file('image');
            if($image){
                @unlink(public_path('upload/student_image/'.$user->image));
                $img_ext=strtolower($image->getClientOriginalExtension());
                $name_gen=hexdec(uniqid());
                $imagename=$name_gen. '.'.$img_ext;
                Image::make($image)->resize(500,500)->save('upload/student_image/'.$imagename);
                $user->image=$imagename;
            }
            $user->save();

            $assign_student= new AssignStudent();

            $assign_student->student_id=$student_id;
            $assign_student->year_id=$request->year_id;
            $assign_student->class_id=$request->class_id;   
            $assign_student->save();


            $discount_student= new discount();

            $discount_student->assign_student_id=$assign_student->id;
            $discount_student->fee_category_id="1";     
            $discount_student->discount=$request->discount;
            $discount_student->save();

        });
        $notification=array(
            'message'=> 'Student Promoted successfully',
            'alert-type'=>'warning'
        );
        return redirect()->route('student.registration.view')->with($notification);



    }



    public function DetailsStudentReg($student_id){

        $details=AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
        $pdf = PDF::loadView('backend.student.student_reg.student_details_pdf', ['details'=>$details]);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');

    }






}
