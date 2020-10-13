<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Status::class, 5)->create();
          factory(App\Status::class)->create([
            'name' => 'مستجد'
        ]);
          factory(App\Status::class)->create([
            'name' => 'موقوف'
        ]);
          factory(App\Status::class)->create([
            'name' => 'نظامي'
        ]);
    }
}
