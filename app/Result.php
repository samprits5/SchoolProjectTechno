<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    //

    protected $table = 'result';

    public function student()
    {
        return $this->belongsTo('App\Student', 'student_id', 'id');
    }

    public function exam()
    {
        return $this->belongsTo('App\Exam', 'exam_id', 'id');
    }
}
