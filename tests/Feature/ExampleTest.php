<?php

namespace Tests\Feature;

use App\Models\User;  // Asegúrate de importar el modelo User
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        // Crear un usuario y autenticarlo
        $user = User::factory()->create();

        // Simula que el usuario está autenticado
        $this->actingAs($user);

        // Realiza la solicitud GET y verifica el código de estado
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
