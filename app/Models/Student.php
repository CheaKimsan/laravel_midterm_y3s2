<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    protected $table = 'students';

    protected $fillable = [
        'student_id',
        'name',
        'email',
        'phone',
        'address',
        'status',
    ];
}
