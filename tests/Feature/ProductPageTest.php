<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductPageTest extends TestCase
{
    use RefreshDatabase; // Automatically reset the database for each test

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        // Create a user and authenticate
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    /** @test */
    public function products_page_loads_successfully_and_displays_products()
    {
        // Arrange: Create some products
        $products = Product::factory(3)->create();

        // Act: Visit the products page
        $response = $this->get(route('products.index'));

        // Assert: Page loads successfully (status 200)
        $response->assertOk();

        // Assert: Products are visible on the page
        foreach ($products as $product) {
            $response->assertSee($product->name);
            $response->assertSee($product->brand);
            // Check for the link to the product's show page
            $response->assertSee(route('products.show', $product->id));
        }
    }

    /** @test */
    public function product_show_page_displays_correct_product_details()
    {
        // Arrange: Create a product
        $product = Product::factory()->create();

        // Act: Visit the product's show page
        $response = $this->get(route('products.show', $product->id));

        // Assert: Page loads successfully
        $response->assertOk();

        // Assert: Product details are visible
        $response->assertSee($product->name);
        $response->assertSee($product->brand);
        $response->assertSee($product->description);
        $response->assertSee(number_format($product->price, 2)); // Ensure price is formatted as in the view
    }

    /** @test */
    public function clicking_product_link_on_index_page_navigates_to_show_page()
    {
        // Arrange: Create a product
        $product = Product::factory()->create();

        // Act: Visit the products index page, then click the link to the product.
        // We don't actually "click" in feature tests, but we can simulate the navigation.
        $response = $this->get(route('products.index'));
        $response->assertSee(route('products.show', $product->id)); // Ensure the link is present

        // Follow the link (simulate user clicking)
        $showResponse = $this->get(route('products.show', $product->id));

        // Assert: The show page is loaded successfully and shows product name
        $showResponse->assertOk();
        $showResponse->assertSee($product->name);
    }

    /** @test */
    public function accessing_non_existent_product_returns_404()
    {
        // Arrange: A non-existent product ID
        $nonExistentProductId = 99999; // Assuming this ID won't exist

        // Act: Visit the product's show page with the non-existent ID
        $response = $this->get(route('products.show', $nonExistentProductId));

        // Assert: A 404 Not Found status is returned
        $response->assertNotFound();
    }

    /** @test */
    public function products_page_has_pagination()
    {
        // Arrange: Create more products than items per page (controller uses ->paginate(10))
        Product::factory(15)->create();

        // Act: Visit the products page
        $response = $this->get(route('products.index'));

        // Assert: Page loads successfully
        $response->assertOk();

        // Assert: Pagination links are present
        // This is a basic check, you might need more specific selectors if using custom pagination views
        $response->assertSee('Previous'); // Common text in Laravel pagination
        $response->assertSee('Next');     // Common text in Laravel pagination
    }
}
