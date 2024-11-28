<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create 5 categories
        Category::factory()->count(5)->create(
            [
                'name' => ['Personal','Work','Urgent','LowPriority','Completed'][rand(0,4)]
            ]
        );
    }
}
