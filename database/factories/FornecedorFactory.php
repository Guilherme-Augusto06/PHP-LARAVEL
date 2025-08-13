<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Fornecedor;
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fornecedor>
 */
class FornecedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name(),
            'site' => $this->faker->url(),
            'uf' => $this->faker->randomElement(['SP', 'RJ', 'MG', 'ES', 'RS', 'SC', 'PR', 'BA', 'PE', 'CE']),
            'email' => $this->faker->unique()->safeEmail(),
            'regiao' => $this->faker->randomElement(['Sudeste', 'Sul', 'Nordeste', 'Centro-Oeste', 'Norte']),
        ];
    }
}
