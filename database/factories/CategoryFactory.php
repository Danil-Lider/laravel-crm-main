<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    /**
     * Название модели, соответствующей фабрике.
     *
     * @var string
     */
    protected $model = Category::class;

    public function definition()
    {

        $name =  $this->faker->name();
        $slug = Str::slug($name, '-');


        return [
            'name' => $name,
            'slug' => $slug,
        ];
    }
}
