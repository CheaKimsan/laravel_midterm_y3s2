<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */



    public function run(): void
    {
        DB::table('enrollments')->insert([
            [
                'student_id' => 1,
                'course_id' => 1,
                'enrollment_date' => '2024-01-15',
                'status' => 'completed',
                'grade' => 'A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1, // John Doe
                'course_id' => 2,  // MATH101
                'enrollment_date' => '2024-01-15',
                'status' => 'enrolled',
                'grade' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 2, // Jane Smith
                'course_id' => 3,  // ENG101
                'enrollment_date' => '2024-01-16',
                'status' => 'completed',
                'grade' => 'B+',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 2, // Jane Smith
                'course_id' => 1,  // CS101
                'enrollment_date' => '2024-01-16',
                'status' => 'enrolled',
                'grade' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 3, // Mike Johnson
                'course_id' => 4,  // PHY101
                'enrollment_date' => '2024-01-17',
                'status' => 'enrolled',
                'grade' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 4, // Sarah Williams
                'course_id' => 2,  // MATH101
                'enrollment_date' => '2024-01-18',
                'status' => 'dropped',
                'grade' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
