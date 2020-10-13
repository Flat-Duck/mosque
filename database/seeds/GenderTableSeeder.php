<?php

use Illuminate\Database\Seeder;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        factory(App\Gender::class)->create([
            'name' => 'ذكر'
        ]);
        factory(App\Gender::class)->create([
            'name' => 'أنثى'
        ]);
    }
}
