<?php

namespace Database\Factories;

use App\Models\Report;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Report::class;

    public function definition(): array
    {
        return [
            'number' => fake()->number(),
            'description' => fake()->description(),
            'created_at' => fake()->dateTimeBetween('-35 days', '+17 days')->format('Y-m-d H:i:s'),
            'updated_at' => fake()->dateTimeBetween('-35 days', '+17 days')->format('Y-m-d H:i:s'),
        ];
    }
}
