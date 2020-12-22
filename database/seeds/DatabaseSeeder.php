<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        $this->call(MetatagSeeder::class);
        $this->call(PagesSeeder::class);
        $this->call(KeywordSeeder::class);
        //  $this->call(ArticlesSeeder::class);
        
       
    }
}
