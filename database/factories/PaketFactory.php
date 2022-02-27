<?php

namespace Database\Factories;

use App\Models\Outlet;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'outlet_id' => $this->faker->randomElement(Outlet::select('id')->get()),
            'jenis' => $this->faker->randomElement(['kiloan', 'selimut', 'bed_cover', 'kaos']),
            'nama_paket' => $this->faker->randomElement(['Reguler', 'Express', 'Standar']),
            'harga' => $this->faker->randomNumber('5', false),
        ];
    }
}
