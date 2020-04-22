<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(MosqueTableSeeder::class);
        $this->call(RoomTableSeeder::class);
        $this->call(StudentTableSeeder::class);
        $this->call(TeacherTableSeeder::class);
        $this->call(CourseTableSeeder::class);
        $this->call(NationalityTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(ExamTableSeeder::class);
        $this->call(LevelTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
    }
}
