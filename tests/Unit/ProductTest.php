<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_product()
    {
        $product = Product::factory()->create();

        $this->assertInstanceOf(Product::class, $product);
    }

    /** @test */
    public function it_can_fill_all_product_attributes()
    {
        $fillableAttributes = (new Product())->getFillable();
        $productData = Product::factory()->make()->toArray();

        // Ensure the factory provides all fillable attributes
        foreach ($fillableAttributes as $attribute) {
            $this->assertArrayHasKey($attribute, $productData, "Factory is missing attribute: {$attribute}");
        }

        // Create the product with the factory data
        $product = Product::create($productData);
        $this->assertInstanceOf(Product::class, $product);

        // Retrieve the product from the database to ensure it was saved correctly
        $retrievedProduct = Product::find($product->id);

        foreach ($fillableAttributes as $attribute) {
            $this->assertEquals($productData[$attribute], $retrievedProduct->{$attribute}, "Attribute {$attribute} does not match.");
        }
    }
}
