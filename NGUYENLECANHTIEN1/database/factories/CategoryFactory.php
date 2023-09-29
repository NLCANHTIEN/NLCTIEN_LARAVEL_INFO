<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;


class CategoryFactory extends Factory
{
   protected $model=Category::class;
    public function definition(): array
    {
        return [
            'catName'=> $this->faker->text(30),
            'slug'=> $this->faker->slug(),
            'parentId'=> $this->faker->numberBetween(1,10),
            'type'=> $this->faker->numberBetween(1,5),
            'author'=> $this->faker->name(),
            'status'=> $this->faker->numberBetween(0,1)
        ];
    }
}
