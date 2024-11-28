<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Validacion;

class ValidacionControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndexMethod()
    {
        $response = $this->get('/validaciones');
        $response->assertStatus(200);
        $response->assertViewIs('validaciones.index');
        $response->assertViewHas('validaciones');
    }

    public function testCreateMethod()
    {
        $response = $this->get('/validaciones/create');
        $response->assertStatus(200);
        $response->assertViewIs('validaciones.create');
    }

    public function testStoreMethod()
    {
        $response = $this->post('/validaciones', [
            'idProyecto' => 1,
            'estadoValidacion' => 'Aprobado',
            'observaciones' => 'Todo en orden',
            'fechaValidacion' => '2024-12-01',
        ]);

        $response->assertRedirect('/validaciones');
        $this->assertDatabaseHas('validaciones', [
            'idProyecto' => 1,
            'estadoValidacion' => 'Aprobado',
            'observaciones' => 'Todo en orden',
            'fechaValidacion' => '2024-12-01',
        ]);
    }

    public function testShowMethod()
    {
        $validacion = Validacion::factory()->create();

        $response = $this->get('/validaciones/' . $validacion->idValidacion);
        $response->assertStatus(200);
        $response->assertViewIs('validaciones.show');
        $response->assertViewHas('validacion', $validacion);
    }

    public function testEditMethod()
    {
        $validacion = Validacion::factory()->create();

        $response = $this->get('/validaciones/' . $validacion->idValidacion . '/edit');
        $response->assertStatus(200);
        $response->assertViewIs('validaciones.edit');
        $response->assertViewHas('validacion', $validacion);
    }

    public function testUpdateMethod()
    {
        $validacion = Validacion::factory()->create();

        $response = $this->put('/validaciones/' . $validacion->idValidacion, [
            'idProyecto' => 2,
            'estadoValidacion' => 'Pendiente',
            'observaciones' => 'Ajustes necesarios',
            'fechaValidacion' => '2024-12-15',
        ]);

        $response->assertRedirect('/validaciones');
        $this->assertDatabaseHas('validaciones', [
            'idValidacion' => $validacion->idValidacion,
            'idProyecto' => 2,
            'estadoValidacion' => 'Pendiente',
            'observaciones' => 'Ajustes necesarios',
            'fechaValidacion' => '2024-12-15',
        ]);
    }

    public function testDestroyMethod()
    {
        $validacion = Validacion::factory()->create();

        $response = $this->delete('/validaciones/' . $validacion->idValidacion);
        $response->assertRedirect('/validaciones');
        $this->assertDatabaseMissing('validaciones', ['idValidacion' => $validacion->idValidacion]);
    }
}
