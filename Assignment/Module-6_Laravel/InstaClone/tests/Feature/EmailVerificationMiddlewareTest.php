<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmailVerificationMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    public function test_unverified_users_are_redirected_to_verification_notice(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        $this->actingAs($user)
            ->get('/dashboard')
            ->assertRedirect(route('verification.notice'));
    }

    public function test_verified_users_can_access_the_dashboard(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => now(),
        ]);

        $this->actingAs($user)
            ->get('/dashboard')
            ->assertOk();
    }
}
