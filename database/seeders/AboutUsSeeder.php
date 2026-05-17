<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('about_us')->insert([
            'heading' => 'Test Heading',
            'image' => 'test.jpg',
            'description'=>'Test Description',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
