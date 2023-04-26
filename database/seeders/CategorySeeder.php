<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['id' => Category::News_And_Development, 'categories' => 'News & Development'],
            ['id' => Category::Music_And_Lifestyle, 'categories' => 'Music & Lifestyle'],
            ['id' => Category::Fashion, 'categories' => 'Fashion'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                [
                    'id' => $category['id'],
                ],
                $category);
        }
    }
}
