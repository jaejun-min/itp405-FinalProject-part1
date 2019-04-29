<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    //
    protected $primaryKey = 'college_id';
    public $timestamps = false;
    public function students(){
      return $this->hasMany('App\Student', 'college_id');
    }
    public function majors(){
      return $this->belongsToMany('App\Major', 'college_major','college_id', 'major_id');
    }
}
