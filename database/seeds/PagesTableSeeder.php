<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Page::class, 10)->create()->each(function($p) {

            $modules = factory(App\Module::class, 10)->create([
                'page_id' => $p->id
            ])->each(function($m) {
                $m->images()->save(factory(App\Image::class)->make());
            });
        });
    }
}
