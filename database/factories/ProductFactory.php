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
        $commonStorageSizes = [128, 256, 512, 1024, 2048];
        $operatingSystems = ['Android', 'iOS', 'Windows', 'macOS', 'Linux'];

        return [
            'name' => $this->faker->words(3, true),
            'brand' => $this->faker->company,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 100, 2000),
            // 'image_url' => $this->faker->imageUrl(640, 480, 'technics'),
            'image_url' => 'https://dummyimage.com/640x480/fff/aaa',
            'screen_size' => $this->faker->randomFloat(1, 10, 30),
            'ram' => $this->faker->numberBetween(2, 64),
            'storage' => $commonStorageSizes[array_rand($commonStorageSizes)],
            'color' => $this->faker->colorName,
            'operating_system' => $operatingSystems[array_rand($operatingSystems)],
        ];
    }
}
