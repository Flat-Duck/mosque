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
        $this->call(LevelTableSeeder::class);
        $this->call(MosqueTableSeeder::class);
        $this->call(CourseTableSeeder::class);
        $this->call(StudentTableSeeder::class);
        $this->call(RoomTableSeeder::class);
        $this->call(TeacherTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(NationalityTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(ExamTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
    }
}
