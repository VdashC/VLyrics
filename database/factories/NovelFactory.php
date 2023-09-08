<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class NovelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>$this->faker->sentence(mt_rand(2,7)),
            'novel_slug'=>$this->faker->slug(),
            'post_id'=>mt_rand(1,10),
            'artist_id'=>mt_rand(1,10),
            'jtitle'=>$this->faker->sentence(mt_rand(2,7)),
            'image'=>$this->faker->sentence(mt_rand(2,7)),

        ];
    }
}
