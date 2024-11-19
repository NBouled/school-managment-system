<?php

namespace Database\Seeders;

use App\Enum\UserRole;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


//        User::factory()->create([
//            'name' => 'admin',
//            'email' => 'admin@example.com',
//            'password' => bcrypt('password'),
//            'role' => UserRole::ADMIN
//        ]);
//
//        User::factory()->create([
//            'name' => 'teacher',
//            'email' => 'teacher@example.com',
//            'password' => bcrypt('password'),
//            'role' => UserRole::TEACHER
//        ]);
//
        User::factory()->create([
            'name' => 'student',
            'email' => 'student@example.com',
            'password' => bcrypt('password'),
            'role' => UserRole::STUDENT
        ]);

//         Course::factory(10)->create();
    }
}
