<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition(): array
    {
        $name = fake()->userName();
        return [
            'name' => fake()->userName(),
            'slug' => Str::slug($name),
            'description' => fake()->paragraph(),
            'image' => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSToE9FdcsfvTk94gY0fFDUuKsWxC1N0IdrSCEtPHNULIdCSDLjAmu9dv45IfvmM8IFun8&usqp=CAU",
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
