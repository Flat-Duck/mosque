<?php

use Illuminate\Database\Seeder;

class NationalityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Level::class)->create([
            'name' => 'ليبيا'
        ]);
        factory(App\Level::class)->create([
            'name' => 'تونس'
        ]);
        factory(App\Level::class)->create([
            'name' => 'مصر'
        ]);
        factory(App\Level::class)->create([
            'name' => 'المغرب'
        ]);
        factory(App\Level::class)->create([
            'name' => 'الجزائر'
        ]);
    }
}
