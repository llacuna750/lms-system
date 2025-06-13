<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function enrollments()
    {
        return $this->hasMany(\App\Models\Enrollment::class);
    }
}
