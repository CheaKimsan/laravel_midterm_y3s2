<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $table = 'courses';

    protected $fillable = [
        'course_code',
        'course_name',
        'credits',
        'instructor',
        'status',
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
