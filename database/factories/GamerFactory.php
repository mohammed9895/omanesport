<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gamer>
 */
class GamerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // creates a linked User record
            'name' => $this->faker->name,
            'username' => $this->faker->unique()->userName,
            'bio' => $this->faker->sentence,
            'country' => $this->faker->countryCode,
            'picture' => $this->faker->imageUrl(300, 300, 'people'),
            'dob' => $this->faker->date('Y-m-d'),

            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'website' => $this->faker->url,
            'twitch' => 'https://twitch.tv/' . $this->faker->userName,
            'youtube' => 'https://youtube.com/@' . $this->faker->userName,
            'twitter' => 'https://twitter.com/' . $this->faker->userName,
            'facebook' => 'https://facebook.com/' . $this->faker->userName,
            'instagram' => 'https://instagram.com/' . $this->faker->userName,
            'discord' => $this->faker->userName . '#' . rand(1000, 9999),
            'steam' => $this->faker->userName,
        ];
    }
}
