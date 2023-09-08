<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
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
            'jtitle'=>$this->faker->sentence(mt_rand(2,7)),
            'alttitle'=>$this->faker->sentence(mt_rand(2,7)),
            'slug'=>$this->faker->slug(),
            'link'=>$this->faker->slug(),
            'altlink'=>$this->faker->slug(),
            // 'body'=> '<p>'.implode('</p><p>',$this->faker->paragraphs(mt_rand(5,10))). '</p>',
            'body'=> collect($this->faker->paragraphs(mt_rand(5,10)))->map(function($p){
                        return "<span>$p</span>";
                    })->implode(''),
                    'jbody'=> collect($this->faker->paragraphs(mt_rand(5,10)))->map(function($p){
                        return "<span>$p</span>";
                    })->implode(''),
                    'ibody'=> collect($this->faker->paragraphs(mt_rand(5,10)))->map(function($p){
                        return "<span>$p</span>";
                    })->implode(''),
            'approved'=>mt_rand(0,1),
            'user_id'=> mt_rand(1,5),
            'artist_id'=> mt_rand(1,10),
            'novel_id'=> mt_rand(1,10)
        ];
    }
}