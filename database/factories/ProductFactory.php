<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->name(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->numberBetween(10000, 90000),
            'photo' => "Product-photo/" . $this->faker->numberBetween(1, 5) . ".png",
            'whatsapp' => $this->faker->phoneNumber(),
            'tokopedia' => $this->faker->url(),
            'shopee' => $this->faker->url(),
            'bukalapak' => $this->faker->url(),
        ];
    }
}
