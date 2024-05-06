<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo_barras' => fake()->unique()->ean13(),
            'categoria_id' => Categoria::all()->random()->id,
            'nombre' => fake()->word(),
            'descripcion' => fake()->sentence(),
            'costo' => fake()->randomFloat(2, 1, 100),
            'precio' => fake()->randomFloat(2, 1, 100),
            'precio_mayoreo' => fake()->randomFloat(2, 1, 100),
            'cantidad_mayoreo' => fake()->numberBetween(1, 10),
            'unidad_medida' => fake()->randomElement(['pz', 'kg', 'lt', 'm']),
            'stock_minimo' => fake()->numberBetween(1, 10),
            'stock_tienda' => fake()->numberBetween(1, 10),
            'stock_bodega' => fake()->numberBetween(1, 10),
            'foto' => fake()->imageUrl(),
        ];
    }
}
