<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class CompanyFactory extends Factory
{
    public $faker = Faker::class;
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'address' => $this->faker->address,
            'site' => 'https://www.test.com',
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'business_person' => Person::factory(),
            'tech_person' => Person::factory(),
        ];
    }
}
