<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeCategoryAmount extends Model
{
    use HasFactory;
    protected $fillable = [
        'fee_category_id',
        'student_class_id',
        'amount',
        
    ];

 public function feecategory(){
     return $this->belongsTo('App\Models\FeeCategory','fee_category_id','id');
 }


public function Studentclass(){
     return $this->belongsTo('App\Models\StudentClass','student_class_id','id');
 }


}
