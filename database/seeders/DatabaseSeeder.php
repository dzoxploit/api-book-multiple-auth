<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
         $this->call([
            AdminsTableSeeder::class,
            UsersTableSeeder::class,
            CategoriesTableSeeder::class,
            BooksTableSeeder::class,
            // Add more seeders here as needed
        ]);
    }
}
