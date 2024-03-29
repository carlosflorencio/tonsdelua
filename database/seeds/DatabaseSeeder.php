<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        //$this->call(ModulesTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        //$this->call(SlideShowModuleSeeder::class);
        //$this->call(YoutubeModuleSeeder::class);
    }
}
