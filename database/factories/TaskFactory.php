<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'categories_id' =>Category::inRandomOrder()->first()->id,
            'priority' => ['low','medium','high'][rand(0,2)],
            'due_date' => now()->addDays(rand(0,30)),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'completed' => (bool)rand(0,1)
        ];
    }
}
