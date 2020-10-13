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
        factory(App\Nationality::class)->create([
            'name' => 'ليبيا'
        ]);
        factory(App\Nationality::class)->create([
            'name' => 'تونس'
        ]);
        factory(App\Nationality::class)->create([
            'name' => 'مصر'
        ]);
        factory(App\Nationality::class)->create([
            'name' => 'المغرب'
        ]);
        factory(App\Nationality::class)->create([
            'name' => 'الجزائر'
        ]);
    }
}
