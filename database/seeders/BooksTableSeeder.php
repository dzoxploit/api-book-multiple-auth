<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Sample data for the books table
        $books = [
            [
                'title' => 'To Kill a Mockingbird',
                'author' => 'Harper Lee',
                'description' => 'A novel about the serious issues of rape and racial inequality.',
                'category_id' => 1, // Replace with appropriate category ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'description' => 'A dystopian novel set in a totalitarian society under constant surveillance.',
                'category_id' => 2, // Replace with appropriate category ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more books as needed
        ];

        // Insert the data into the books table
        DB::table('books')->insert($books);
    }
}
