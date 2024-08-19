<?php

namespace Database\Factories;

use App\Models\capacitacionTipo;
use Illuminate\Database\Eloquent\Factories\Factory;


class capacitacionTipoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = capacitacionTipo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'nombre' => $this->faker->text($this->faker->numberBetween(5, 25)),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
