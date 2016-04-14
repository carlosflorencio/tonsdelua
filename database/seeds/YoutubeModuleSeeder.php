<?php

use App\Page;
use Illuminate\Database\Seeder;

class YoutubeModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Module::class, 10)->create([
            'type' => 'youtube',
            'youtube' => '5Pmcm91rdwQ'
        ]);
    }
}
