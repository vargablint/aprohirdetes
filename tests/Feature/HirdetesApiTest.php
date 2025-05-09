<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;



class HirdetesApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authenticated_user_can_create_hirdetes()
    {
        $user = User::factory()->create();

        $payload = [
            'title' => 'Eladó iPhone 13',
            'leiras' => 'Szép állapotban, tartozékokkal.',
            'price' => 200000,
        ];

        $response = $this->actingAs($user)->postJson('/api/hirdetesek', $payload);

        $response->assertStatus(201)
                 ->assertJsonFragment([
                     'title' => 'Eladó iPhone 13',
                     'ar' => 200000,
                 ]);

        $this->assertDatabaseHas('hirdetesek', [
            'title' => 'Eladó iPhone 13',
            'user_id' => $user->id,
        ]);
    }

    /** @test */
    public function guest_cannot_create_hirdetes()
    {
        $response = $this->postJson('/api/hirdetesek', [
            'title' => 'Laptop',
            'description' => 'Használt, de jó állapotú.',
            'price' => 150000,
        ]);

        $response->assertStatus(401);
    }
}
