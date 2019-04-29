<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  public $primaryKey = 'student_id';
  public $timestamps = false;
  public function user()
   {
       return $this->belongsTo('App\User');
   }
   public function college(){
      return $this->belongsTo('App\College', 'college_id');
   }
   public function major(){
      return $this->belongsTo('App\College', 'major_id');
   }
   public function comments(){
      return $this->hasMany('App\Comment', 'student_id');
   }
}
