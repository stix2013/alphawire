<?php

namespace Tests\Unit;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase; // Important for resetting DB state
use Tests\TestCase;

class RelationsTest extends TestCase
{
    use RefreshDatabase; // Resets the database for each test

    /** @test */
    public function a_user_belongs_to_a_role(): void
    {
        // Create a role
        $role = Role::factory()->create(['name' => 'Editor']);

        // Create a user and associate them with the role
        $user = User::factory()->create(['role_id' => $role->id]);

        // Assert that the user's role is an instance of Role
        $this->assertInstanceOf(Role::class, $user->role);

        // Assert that the user's role name matches the created role's name
        $this->assertEquals('Editor', $user->role->name);
    }

    /** @test */
    public function a_role_can_have_many_users(): void
    {
        // Create a role
        $role = Role::factory()->create(['name' => 'Viewer']);

        // Create multiple users associated with this role
        User::factory(3)->create(['role_id' => $role->id]);

        // Assert that the role has 3 users
        $this->assertCount(3, $role->users);

        // Assert that each associated user is an instance of User
        foreach ($role->users as $user) {
            $this->assertInstanceOf(User::class, $user);
            $this->assertEquals($role->id, $user->role_id);
        }
    }

    /** @test */
    public function user_role_is_null_if_role_is_deleted_and_ondelete_set_null(): void
    {
        // 1. Create a Role
        $role = Role::factory()->create();

        // 2. Create a User associated with this Role
        $user = User::factory()->create(['role_id' => $role->id]);
        $this->assertNotNull($user->role_id);
        $this->assertInstanceOf(Role::class, $user->role);

        // 3. Delete the Role
        $role->delete();

        // 4. Refresh the user model from the database
        $user->refresh();

        // 5. Assert that the user's role_id is now null
        $this->assertNull($user->role_id);
        // Assert that accessing the role relationship returns null
        // (because the related role does not exist anymore)
        $this->assertNull($user->role);
    }
}
