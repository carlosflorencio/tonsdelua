<?php

use App\Page;
use Illuminate\Database\Seeder;

class SlideShowModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = Page::product()->get()->toArray();

        factory(App\Module::class, 10)->create([
            'type' => 'slideshow',
            'page_id' => $pages[random_int(1, count($pages) - 1)]['id']
        ])->each(function($m) {
            $m->images()->save(factory(App\Image::class)->make());
            $m->images()->save(factory(App\Image::class)->make());
            $m->images()->save(factory(App\Image::class)->make());
        });
    }
}
