<?php

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Section::class, 5)->create()->each(function ($section) {
            for ($i = 0; $i <= 2; $i++) {
                $section->photos()->save(factory(App\Photo::class)->create([
                    'photoable_type' => 'App\Section',
                    'photoable_id' => $section->id
                ]));
            }
        });
    }
}
