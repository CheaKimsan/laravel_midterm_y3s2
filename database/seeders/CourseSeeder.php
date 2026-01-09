<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
            [
                'course_code' => 'WP101',
                'course_name' => 'Web Project',
                'credits' => 3,
                'instructor' => 'Dr. Raksmey',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_code' => 'SA101',
                'course_name' => 'System Analysis',
                'credits' => 4,
                'instructor' => 'Dr. USA',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_code' => 'ENG101',
                'course_name' => 'English Literature',
                'credits' => 3,
                'instructor' => 'Prof. Kosal',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_code' => 'LIN101',
                'course_name' => 'Linux I',
                'credits' => 4,
                'instructor' => 'Dr. Savuth',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_code' => 'ORA101',
                'course_name' => 'Oracle Database',
                'credits' => 4,
                'instructor' => 'Dr. Pinchai',
                'status' => 'inactive',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
