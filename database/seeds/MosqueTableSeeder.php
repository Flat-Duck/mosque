<?php

use Illuminate\Database\Seeder;

class MosqueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Mosque::class, 5)->create();
    }
}
