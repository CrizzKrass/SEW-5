<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'          => $this->faker->name,
            'price_net'      => $this->faker->numberBetween(100, 1000),
            'price_gross'    => $this->faker->numberBetween(80, 800),
            'vat'           => $this->faker->numberBetween(10, 20),
            'user_clearing'  => null, //$this->faker->firstName,
            'clearing_date'  => now(),
        ];
    }
}
