<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(),
            'date' => $this->faker->date(),
            'preview_image' => $this->faker->randomElement([
                'preview_news_image.jpg',
                'preview_news_image_2.jpg',
            ]),
            'full_image' => $this->faker->randomElement([
                'full_news_image.jpg',
                'full_news_image_2.jpg',
            ]),
            'shortDesc' => $this->faker->sentence(),
            'fullText' => $this->faker->paragraph(),
        ];
    }
}
