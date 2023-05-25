<?php

namespace Database\Factories;

use App\Models\Breed;
use App\Models\Category;
use App\Models\Event;
use App\Models\Marker;
use App\Models\Place;
use App\Models\Sanitary;
use App\Models\Status;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Marker>
 */
class MarkerFactory extends Factory
{
    protected $model = Marker::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $lat = fake()->latitude(42, 43);
        $lng = fake()->longitude(69, 70);
        return [
            'event_id' => Event::all()->random(),
            'sanitary_id' => Sanitary::all()->random(),
            'category_id' => Category::all()->random(),
            'status_id' => Status::all()->random(),
            'type_id' => Type::all()->random(),
            'height' => mt_rand(1, 150),
            'diameter' => mt_rand(1, 30),
            'landing_date' => fake()->dateTimeThisCentury(),
            'user_id' => 2,
            'breed_id' => Breed::all()->random(),
            'age' => mt_rand(1, 100),
            'place_id' => Place::all()->random(),
            'geocode' => json_encode([
                'lat' => $lat,
                'lng' => $lng
            ]),
        ];
    }
}
