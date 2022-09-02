<?php

namespace Database\Factories;

use Stringable;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
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
        return [
            'category_id'=>Category::select('id')->get()->random()->id,
            'subcategory_id'=>Subcategory::select('id')->get()->random()->id,
            'name'=>$this->faker->name(),
            'slug'=>Str::slug($this->faker->name()),
            'description'=>$this->faker->text(10),
            'price'=>$this->faker->randomNumber()
        ];
    }
}
