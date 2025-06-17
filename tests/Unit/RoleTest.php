<?php

use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('can create role', function () {
    $role = Role::factory()->create();

    expect($role)->toBeInstanceOf(Role::class);
    expect($role->name)->not->toBeNull();
    expect($role->description)->not->toBeNull();
    expect($role->enable)->not->toBeNull();

    $this->assertDatabaseHas('roles', [
        'id' => $role->id,
        'name' => $role->name,
        'description' => $role->description,
        'enable' => $role->enable,
    ]);
});
