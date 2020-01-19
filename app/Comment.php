<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $primaryKey = 'comment_id';
  public $timestamps = false;
   public function student()
    {
      return $this->belongsTo('App\Student', 'student_id');
    }
}
