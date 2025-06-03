<?php

namespace Tests\Feature;

use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_new_service()
    {
        $data = [
            'name'        => 'Corte social',
            'description' => 'Corte social para adultos',
            'time'        => 45,
            'price'       => 300,
        ];

        $response = $this->postJson('api/services', $data);

        $response->assertStatus(201)
            ->assertJsonFragment(['message' => 'Novo serviço criado com sucesso!']);
    }

    /** @test */
    public function it_validates_required_fields_when_creating()
    {
        $response = $this->postJson('/api/services', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['name', 'description', 'time', 'price']);
    }

    /** @test */
    public function it_updates_an_service()
    {
        $service = Service::factory()->create();

        $updateService = [
            'name'        => 'Corte atualizado',
            'description' => 'Corte atualizado',
            'time'        => 50,
            'price'       => 100,
        ];

        $response = $this->putJson("/api/services/{$service->id}", $updateService);

        $response->assertStatus(201)
            ->assertJsonFragment(['message' => 'Serviço atualizado com sucesso!']);
    }

    /** @test */
    public function it_deletes_an_services()
    {
        $service = Service::factory()->create();

        $response = $this->deleteJson("/api/services/{$service->id}");

        $response->assertStatus(200)
            ->assertJsonFragment(['Serviço deletado com sucesso!']);
    }
}
