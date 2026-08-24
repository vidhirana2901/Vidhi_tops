<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_regular_users_receive_forbidden_when_opening_product_creation(): void
    {
        $user = User::factory()->create(['role' => 'user']);

        $this->actingAs($user)
            ->get('/products/create')
            ->assertForbidden();
    }

    public function test_admin_users_can_open_product_creation(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($admin)
            ->get('/products/create')
            ->assertOk();
    }

    public function test_regular_users_receive_forbidden_when_submitting_a_product(): void
    {
        $user = User::factory()->create(['role' => 'user']);

        $this->actingAs($user)
            ->post('/products', [
                'name' => 'Restricted Product',
                'price' => 10,
            ])
            ->assertForbidden();
    }
}
