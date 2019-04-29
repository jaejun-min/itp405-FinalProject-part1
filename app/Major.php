<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    //
  protected $primaryKey = 'major_id';
  public $timestamps = false;
    public function students(){
      return $this->hasMany('App\Student', 'major_id');
    }
    public function colleges(){
      return $this->belongsToMany('App\College', 'college_major' ,'major_id', 'college_id');
    }
}
