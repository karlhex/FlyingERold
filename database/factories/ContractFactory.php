<?php

namespace Database\Factories;

use App\Models\fw_Contract;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class ContractFactory extends Factory
{

    public Faker $faker;
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = fw_Contract::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
