<?php

namespace Tests\Feature;

use App\Models\Barber;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BarberTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_new_barber()
    {
        $data = [
            'name'   => 'barber one',
            'email'  => 'barbearfake@fake.com',
            'avatar' => 'photo_fake',
            'rating' => '4.0',
            'active' => 1,
        ];

        $response = $this->postJson('api/barbers', $data);

        $response->assertStatus(201)
            ->assertJsonFragment(['message' => 'Perfil do barbeiro criado com sucesso.']);
    }

    /** @test */
    public function it_validates_required_fields_when_creating()
    {
        $response = $this->postJson('/api/barbers', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['name', 'email', 'rating', 'active']);
    }

    /** @test */
    public function it_updates_an_barber()
    {
        $barber = Barber::create([
            'name'   => 'barber test',
            'email'  => 'barbertest@gmail.com',
            'avatar' => 'avatar_test',
            'rating' => 4.0,
            'active' => 1,
        ]);

        $updateBarber = [
            'name'   => 'barber update',
            'email'  => 'barberupdate@gmail.com',
            'avatar' => 'avatar_update',
            'rating' => '4.5',
            'active' => 0,
        ];

        $response = $this->putJson("/api/barbers/{$barber->id}", $updateBarber);

        $response->assertStatus(201)
            ->assertJsonFragment(['message' => 'Dados do barbeiro atualizado com sucesso.']);
    }

    /** @test */
    public function it_deletes_an_barber()
    {
        $barber = Barber::create([
            'name'   => 'barber test',
            'email'  => 'barbertest@gmail.com',
            'avatar' => 'avatar_test',
            'rating' => 4.0,
            'active' => 1,
        ]);

        $response = $this->deleteJson("/api/barbers/{$barber->id}");

        $response->assertStatus(200)
            ->assertJsonFragment(['Barbeiro removido com sucesso.']);
    }
}
