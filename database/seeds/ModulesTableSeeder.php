<?php

use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Module::class, 10)->create()->each(function($m) {
            $m->images()->save(factory(App\Image::class)->make());
        });
    }
}
