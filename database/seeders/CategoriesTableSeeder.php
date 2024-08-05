<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Sample data for the categories table
        $categories = [
            [
                'name' => 'Fiction',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Non-Fiction',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Science Fiction',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Biography',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more categories as needed
        ];

        // Insert the data into the categories table
        DB::table('categories')->insert($categories);
    }
}
