<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;

class FeeCategoryController extends Controller
{
    public function ViewFeeCategory(){
        $categories=FeeCategory::all();
        return view('backend.setup.feecategory.view_category',['categories'=>$categories]);

    }

    public function AddFeeCategory(){
        return view('backend.setup.feecategory.add_category');


    }

    public function StoreFeeCategory(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            
        ]);
        FeeCategory::insert([
            'name'=>$request->name,
                         
        ]);
        $notification=array(
            'message'=> 'Fee Category Added successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('fee.category')->with($notification);

    }

    public function EditFeeCategory($id){

        $category=FeeCategory::find($id);
        return view('backend.setup.feecategory.edit_category',['category'=>$category]);



    }

    public function UpdateFeeCategory(Request $request,$id){

        FeeCategory::find($id)->update([
            'name'=>$request->name,
                         
        ]);
        $notification=array(
            'message'=> 'Fee Category Updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('fee.category')->with($notification);
    }

    public function DeleteFeeCategory($id){

        FeeCategory::find($id)->delete();
        $notification=array(
            'message'=> 'Fee Category Deleted successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('fee.category')->with($notification);
    }



  






}
