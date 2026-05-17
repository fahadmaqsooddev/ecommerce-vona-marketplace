<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Foreign key check disable (important for truncate)
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate table
        DB::table('categories')->truncate();

        // Enable again
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Insert data
        DB::table('categories')->insert([
            [
                'heading' => 'Electronics',
                'image' => 'electronics.jpg',
                'description' => 'All kinds of electronic items',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'heading' => 'Fashion',
                'image' => 'fashion.jpg',
                'description' => 'Latest fashion trends and clothing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'heading' => 'Books',
                'image' => 'books.jpg',
                'description' => 'Collection of books and novels',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}