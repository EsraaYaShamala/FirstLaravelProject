<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type=array('Male','Female','sport','luxury','bag','sun glass','sweater');
        return [
            'type'=>$this->faker->unique()->randomElement($type)
        ];
    }
}
