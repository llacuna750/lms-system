<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    // Mass assignable fields
    protected $fillable = ['name', 'code']; // 15th update SubjectController and add export-all method update Subject Model

    // Relationship to enrollments
    public function enrollments()
    {
        return $this->hasMany(\App\Models\Enrollment::class);
    }
}
