<?php

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

it('can create a product', function () {
    $product = Product::factory()->create();
    expect($product)->toBeInstanceOf(Product::class);
});

it('can fill all product attributes', function () {
    $fillableAttributes = (new Product())->getFillable();
    // Use raw attributes from factory to ensure all fillable fields are tested
    $productData = Product::factory()->raw();

    // Ensure the factory provides all fillable attributes for creation
    foreach ($fillableAttributes as $attribute) {
        // expect($productData)->toHaveKey($attribute, "Factory's raw data is missing attribute: {$attribute} for creation.");
        expect($productData)->toHaveKey($attribute, "{$productData[$attribute]}");
    }

    $product = Product::create($productData);
    expect($product)->toBeInstanceOf(Product::class);

    $retrievedProduct = Product::find($product->id);
    expect($retrievedProduct)->not->toBeNull();

    foreach ($fillableAttributes as $attribute) {
        // Comparing raw data with retrieved model attribute
        expect($retrievedProduct->{$attribute})->toEqual($productData[$attribute], "Attribute {$attribute} does not match.");
    }
});

it('handles attribute types correctly', function () {
    $product = Product::factory()->create([
        'price' => 999.99,
        'screen_size' => 15.6,
        'ram' => 16,
        'storage' => 512,
    ]);

    $retrievedProduct = Product::find($product->id);
    expect($retrievedProduct)->not->toBeNull();

    // Check types based on the $casts property in Product model
    // (price:float, screen_size:float, ram:integer, storage:integer)
    // Ensure Product model has:
    // protected $casts = [
    // 'price' => 'float',
    // 'screen_size' => 'float',
    // 'ram' => 'integer',
    // 'storage' => 'integer',
    // ];
    expect($retrievedProduct->price)->toBeFloat()->toEqual(999.99);
    expect($retrievedProduct->screen_size)->toBeFloat()->toEqual(15.6);
    expect($retrievedProduct->ram)->toBeInt()->toEqual(16);
    expect($retrievedProduct->storage)->toBeInt()->toEqual(512);
});
