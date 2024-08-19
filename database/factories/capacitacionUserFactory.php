<?php

namespace Database\Factories;

use App\Models\capacitacionUser;
use Illuminate\Database\Eloquent\Factories\Factory;


class capacitacionUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = capacitacionUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'username' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'name' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'email' => $this->faker->email,
            'email_verified_at' => $this->faker->date('Y-m-d H:i:s'),
            'password' => $this->faker->lexify('1???@???A???'),
            'provider' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'provider_uid' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'remember_token' => $this->faker->text($this->faker->numberBetween(5, 100)),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
