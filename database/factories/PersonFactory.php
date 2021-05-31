<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class PersonFactory extends Factory
{
    public $faker = Faker::class;

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Person::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'phone1' => $this->faker->phoneNumber,
            'phone2' => $this->faker->phoneNumber,
            'phone3' => $this->faker->phoneNumber,
            'email'  => $this->faker->email,
            'company_name' => $this->faker->company,
            'department' => $this->faker->companySuffix,
            'title' => $this->faker->title,
        ];
    }
}
