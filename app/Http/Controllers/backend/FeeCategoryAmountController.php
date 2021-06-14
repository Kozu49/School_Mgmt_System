<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategoryAmount;
use App\Models\FeeCategory;
use App\Models\StudentClass;


class FeeCategoryAmountController extends Controller
{
    public function ViewFeeCategoryAmount(){

        // $catamounts=FeeCategoryAmount::all();
        $catamounts=FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();

        
        return view('backend.setup.fee_amount.view_fee',['catamounts'=>$catamounts]);



    }

    public function AddFeeCategoryAmount(){
        $categories=FeeCategory::all();
        $classes=StudentClass::all();
        return view('backend.setup.fee_amount.add_fee',['categories'=>$categories,'classes'=>$classes]);

    }

    public function StoreFeeCategoryAmount(Request $request){

        $countclass=Count($request->student_class_id);
        if($countclass != NULL){
            for($i=0; $i<$countclass ;$i++){
                FeeCategoryAmount::insert([
                    'fee_category_id'=>$request->fee_category_id,
                    'student_class_id'=>$request->student_class_id[$i],
                    'amount'=>$request->amount[$i],

                          
                ]);
            } 
        }
                $notification=array(
                    'message'=> 'Fee Category Amount Added successfully',
                    'alert-type'=>'success'
                );
                return redirect()->route('fee.category.amount')->with($notification);

    }

    public function EditFeeCategoryAmount($fee_category_id){

        $categories=FeeCategory::all();
        $classes=StudentClass::all();
        // $feeamounts=FeeCategoryAmount::where('fee_category_id','$fee_category_id')->orderBy('student_class_id','asc')->get();
        $amounts=FeeCategoryAmount::where('fee_category_id',$fee_category_id)->orderBy('student_class_id','asc')->get();
        return view('backend.setup.fee_amount.edit_fee',['amounts'=>$amounts,'categories'=>$categories,'classes'=>$classes]);
        
    }

    public function UpdateFeeCategoryAmount(Request $request,$fee_category_id){

        if($request->student_class_id==NULL){

            $notification=array(
                'message'=> 'Please Select any Student Class',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);


        }else{
            $countclass=Count($request->student_class_id);
            FeeCategoryAmount::where('fee_category_id',$fee_category_id)->delete();

            for($i=0; $i<$countclass ;$i++){

                FeeCategoryAmount::insert([
                    'fee_category_id'=>$request->fee_category_id,
                    'student_class_id'=>$request->student_class_id[$i],
                    'amount'=>$request->amount[$i],
          
                ]);
            
            }
                $notification=array(
                    'message'=> 'Data Updated Successfully',
                    'alert-type'=>'success'
                );
                return redirect()->back()->with($notification);


         }

    }

    public function DetailsFeeCategoryAmount($fee_category_id){

        $details=FeeCategoryAmount::where('fee_category_id',$fee_category_id)->orderBy('student_class_id','asc')->get();
        return view('backend.setup.fee_amount.details_fee',['details'=>$details]);


    }




}
