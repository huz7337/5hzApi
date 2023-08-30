<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Artificial intelligence',
                'description' => 'description'
            ],
            [
                'name' => 'Design',
                'description' => 'description'
            ],
            [
                'name' => 'Blockchain',
                'description' => 'description'
            ],
            [
                'name' => 'React',
                'description' => 'description'
            ],
            [
                'name' => 'PHP',
                'description' => 'description'
            ],
            [
                'name' => 'NodeJS ',
                'description' => 'description'
            ]
        ];


        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
