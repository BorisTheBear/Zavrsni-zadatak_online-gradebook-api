<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gradebook>
 */
class GradebookFactory extends Factory
{
    private static $counter = 0;
    private $gradebook = 'VIII-';

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        self::$counter++;
        $currentId = self::$counter;
        return [
            'name' => $this->gradebook . $currentId,
            'user_id' => $currentId
        ];
    }
}
