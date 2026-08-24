<?php

namespace Database\Factories;

use App\Models\Playlist;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlaylistFactory extends Factory
{
    protected $model = Playlist::class;

    public function definition(): array
    {
        return [
            'name'        => fake()->words(3, true),
            'description' => fake()->sentence(10),
            'cover_image' => 'https://via.placeholder.com/640x480.jpg/' . fake()->hexColor() . '?text=' . urlencode(fake()->word()) . '.jpg',
        ];
    }

    /**
     * State for Bollywood playlists.
     */
    public function bollywood(): static
    {
        return $this->state(fn (array $attributes) => [
            'name'        => 'Bollywood Hits - ' . fake()->word(),
            'description' => 'Top trending Bollywood soundtrack tracks.',
            'cover_image' => 'https://via.placeholder.com/640x480.jpg/' . fake()->hexColor() . '?text=Bollywood.jpg',
        ]);
    }
}