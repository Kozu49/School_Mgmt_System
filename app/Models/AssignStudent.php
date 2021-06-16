<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'class_id',
        'year_id',
        'group_id',
        'shift_id',
        'role',
        
    ];

    public function student(){
       return $this->belongsTo('App\Models\User','student_id','id');
    }

    public function student_class(){
        return $this->belongsTo('App\Models\StudentClass','class_id','id');
     }


     public function student_year(){
        return $this->belongsTo('App\Models\Studentyear','year_id','id');
     }

     public function discount(){
      return $this->belongsTo('App\Models\discount','id','assign_student_id');
   }

   public function group(){
      return $this->belongsTo('App\Models\StudentGroup','group_id','id');
   }

   public function shift(){
      return $this->belongsTo('App\Models\StudentShift','shift_id','id');
   }


}
