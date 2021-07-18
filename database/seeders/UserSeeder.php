<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('Admin@123'),
            'role' => User::ADMIN,
        ]);


        User::create([
            'name' => 'student',
            'email' => 'student@student.com',
            'password' => bcrypt('Student@123'),
            'role' => User::STUDENT,
        ]);


        User::create([
            'name' => 'teacher',
            'email' => 'teacher@teacher.com',
            'password' => bcrypt('Teacher@123'),
            'role' => User::TEACHER,
        ]);

        User::create([
            'name' => 'parent',
            'email' => 'parent@parent.com',
            'password' => bcrypt('Parent@123'),
            'role' => User::PARENTS,
        ]);
    }
}
