<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    //

    protected $table = 'enrollments';

    protected $fillable = [
        'student_id',
        'course_id',
        'enrollment_date',
        'status',
        'grade',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
