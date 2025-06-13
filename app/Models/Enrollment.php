<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    public function course()
    {
        return $this->belongsTo(\App\Models\Course::class);
    }

    public function subject()
    {
        return $this->belongsTo(\App\Models\Subject::class);
    }
}
