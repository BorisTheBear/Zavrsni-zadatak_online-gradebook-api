<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StudentFactory extends Factory
{
    private static $studentCounter = 0;
    private static $gradebookCounter = 1;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        self::$studentCounter++;
        $gradebookId = ceil(self::$studentCounter/10);
        return [
            'first_name' => $this->faker->name(),
            'last_name' => $this->faker->lastName(),
            'image_url' => $this->faker->imageUrl(),
            'gradebook_id' => $gradebookId
        ];
    }
}
