<?php

use Illuminate\Database\Seeder;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\Level::class)->create([
            'name' => 'البسملة أو (الحمد لله) من بداية الكتاب - الفاتحة'
        ]);
        factory(App\Level::class)->create([
            'name' => 'جزء (سيقول السفهاء)- البقرة'
        ]);
        factory(App\Level::class)->create([
            'name' => 'جزء (تلك الرسل)- البقرة'
        ]);
        factory(App\Level::class)->create([
            'name' => 'جزء (لن تنالوا البر)/ (كل الطعام)- آل عمران'
        ]);
        factory(App\Level::class)->create([
            'name' => 'جزء (والمحصنات)- النساء'
        ]);
        factory(App\Level::class)->create([
            'name' => 'جزء (لا يحب الله)- النساء'
        ]);
        factory(App\Level::class)->create([
            'name' => 'جزء (لتجدن)/ (وإذا سمعوا)- المائدة'
        ]);
        factory(App\Level::class)->create([
            'name' => 'جزء (ولو أننا نزلنا)- الأنعام'
        ]);
        factory(App\Level::class)->create([
            'name' => 'جزء (قال الملأ)- الأعراف'
        ]);
        factory(App\Level::class)->create([
            'name' => 'جزء (واعلموا)- الأنفال'
        ]);
        factory(App\Level::class)->create([
            'name' => 'جزء (يعتذرون) - التوبة'
        ]);
        factory(App\Level::class)->create([
            'name' => 'جزء (ومامن دابة)- هود'
        ]);
        factory(App\Level::class)->create([
            'name' => 'جزء (وما أبرئ نفسي)- يوسف'
        ]);
        factory(App\Level::class)->create([
            'name' => 'جزء (الـر)- الحجر'
        ]);
        factory(App\Level::class)->create([
            'name' => 'جزء (سبحان)- الإسراء'
        ]);
        factory(App\Level::class)->create([
            'name' => 'جزء (قال ألم)/ (أما السفينة) - الكهف'
        ]);
        factory(App\Level::class)->create([
            'name' => 'جزء (اقترب للناس)- الأنبياء'
        ]);
        factory(App\Level::class)->create([
            'name' => 'جزء (قد أفلح)- المؤمنون'
        ]);
        factory(App\Level::class)->create([
            'name' => 'جزء (وقال الذين لا يرجون)- الفرقان'
        ]);
        factory(App\Level::class)->create([
            'name' => 'جزء (فما كان جواب قومه)- النمل'
        ]);
        factory(App\Level::class)->create([
            'name' => 'جزء (ولا تجادلوا)- العنكبوت'
        ]);
        factory(App\Level::class)->create([
            'name' => 'جزء (ومن يقنت)- الأحزاب'
        ]);
        factory(App\Level::class)->create([
            'name' => 'جزء (وما أنزلنا)- يـس ويسمى أيضا بجزء يس'
        ]);
        factory(App\Level::class)->create([
            'name' => 'جزء (فمن أظلم)- الزمر'
        ]);
        factory(App\Level::class)->create([
            'name' => 'جزء (إليه يرد)- فصلت'
        ]);
        factory(App\Level::class)->create([
            'name' => 'جزء (حـم)- الأحقاف ويسمى أيضا بجزء الأحقاف'
        ]);
        factory(App\Level::class)->create([
            'name' => 'جزء (قال فما خطبكم)- الذاريات ويسمى أيضا بجزء الذاريات'
        ]);
        factory(App\Level::class)->create([
            'name' => 'جزء (قد سمع)- المجادلة'
        ]);
        factory(App\Level::class)->create([
            'name' => 'جزء (تبارك)- المـلك'
        ]);
        factory(App\Level::class)->create([
            'name' => 'جزء (عمّ)- النبأ'
        ]);

    }
}