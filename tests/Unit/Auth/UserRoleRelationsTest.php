<?php

use App\Models\Role;
use App\Models\User;
// Illuminate\Foundation\Testing\RefreshDatabase is globally applied via tests/Pest.php
// Tests\TestCase is globally applied via tests/Pest.php

test('a user belongs to a role', function () {
    // Create a role
    $role = Role::factory()->create(['name' => 'Editor']);
    // Create a user and associate them with the role
    $user = User::factory()->create(['role_id' => $role->id]);
    // Assert that the user's role is an instance of Role
    expect($user->role)->toBeInstanceOf(Role::class);
    // Assert that the user's role name matches the created role's name
    expect($user->role->name)->toBe('Editor');
});

test('a role can have many users', function () {
    // Create a role
    $role = Role::factory()->create(['name' => 'Viewer']);
    // Create multiple users associated with this role
    User::factory(3)->create(['role_id' => $role->id]);
    // Assert that the role has 3 users
    expect($role->users)->toHaveCount(3);
    // Assert that each associated user is an instance of User
    foreach ($role->users as $user) {
        expect($user)->toBeInstanceOf(User::class);
        expect($user->role_id)->toBe($role->id);
    }
});

test('user role is null if role is deleted and ondelete set null', function () {
    // 1. Create a Role
    $role = Role::factory()->create();
    // 2. Create a User associated with this Role
    $user = User::factory()->create(['role_id' => $role->id]);
    expect($user->role_id)->not->toBeNull();
    expect($user->role)->toBeInstanceOf(Role::class);
    // 3. Delete the Role
    $role->delete();
    // 4. Refresh the user model from the database
    $user->refresh();
    // 5. Assert that the user's role_id is now null
    expect($user->role_id)->toBeNull();
    // Assert that accessing the role relationship returns null
    expect($user->role)->toBeNull();
});
