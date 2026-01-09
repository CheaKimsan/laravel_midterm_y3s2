<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            [
                'student_id' => 'STU001',
                'name' => 'Chea Kimsan',
                'email' => 'san@email.com',
                'phone' => '+1234567890',
                'address' => '123 Main Street, New York, NY 10001',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 'STU002',
                'name' => 'Lay Menghong',
                'email' => 'hong@email.com',
                'phone' => '+1234567891',
                'address' => '456 Oak Avenue, Los Angeles, CA 90001',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 'STU003',
                'name' => 'Sopanha Reach',
                'email' => 'reach@email.com',
                'phone' => '+1234567892',
                'address' => '789 Pine Road, Chicago, IL 60601',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 'STU004',
                'name' => 'Seng Phanna',
                'email' => 'phanna@email.com',
                'phone' => '+1234567893',
                'address' => null,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 'STU005',
                'name' => 'Nov Vathana',
                'email' => 'vathana@email.com',
                'phone' => '+1234567894',
                'address' => '321 Elm Street, Houston, TX 77001',
                'status' => 'inactive',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
