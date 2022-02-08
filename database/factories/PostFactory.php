<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'user_id'=>User::factory(),
          'category_id'=>CategorytFactory::factory(),
            'title'=>$this->faker->sentence,
            'slug'=>$this->faker->slug,
            // 'excerpt'=>$this->faker->sentence,
            // 'body'=>$this->faker->paragraph,
            'excerpt'=>'<p>'.implode('</p><p>',$this->faker->paragraphs(2)).</p>,
            'body'=>'<p>'.implode('</p><p>',$this->faker->paragraphs(6)).</p>,


        ];
    }
}
