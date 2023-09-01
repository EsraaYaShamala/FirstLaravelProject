<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $size=array('M','L','X','XL');
        $size=$this->faker->randomElements($size,3,false);
        return [
            'name'=>$this->faker->name,
            'price'=>$this->faker->randomNumber(3),
            'views'=>$this->faker->randomNumber(3),
            'size'=>json_encode($size),
            'isFeatured'=>$this->faker->boolean,
            'cat_id'=>Category::all()->random(),
            'description'=>$this->faker->sentence,
            'image'=>$this->faker->imageUrl
        ];
    }
}
