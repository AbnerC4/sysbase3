<?php

namespace Database\Factories;

use App\Models\capacitacionMarca;
use Illuminate\Database\Eloquent\Factories\Factory;


class capacitacionMarcaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = capacitacionMarca::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'nombre' => $this->faker->text($this->faker->numberBetween(5, 45)),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
