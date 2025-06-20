<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

// uses(RefreshDatabase::class); // Enable if your tests modify the database and you want to reset it for each test.

test('product_page_is_accessible_by_guests_and_shows_guest_sidebar', function () {
    // Act: Perform a GET request to the products index page
    $response = $this->get(route('products.index'));

    // Assert: HTTP status is 200 (OK)
    $response->assertOk();

    // Assert: The page content contains the word 'Products'
    $response->assertSee('Products');

    // Assert: Guest sidebar elements are visible
    $response->assertSee('Login');
    $response->assertSee('Register');

    // Assert: Authenticated user sidebar elements are NOT visible
    $response->assertDontSee('Settings');
    $response->assertDontSee('Log Out');
});

test('product_page_shows_auth_sidebar_for_logged_in_users', function () {
    // Arrange: Create a new user
    $user = User::factory()->create();

    // Act: Log in as the created user and visit the products index page
    $response = $this->actingAs($user)->get(route('products.index'));

    // Assert: HTTP status is 200 (OK)
    $response->assertOk();

    // Assert: The page content contains the word 'Products'
    $response->assertSee('Products');

    // Assert: Authenticated user's name is visible (e.g., in the sidebar profile section)
    $response->assertSee($user->name);

    // Assert: Authenticated user sidebar elements are visible
    $response->assertSee('Settings');
    $response->assertSee('Log Out');

    // Assert: Guest sidebar elements are NOT visible
    $response->assertDontSee('Login');
    $response->assertDontSee('Register');
});
