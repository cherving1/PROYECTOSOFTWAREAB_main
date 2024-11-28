<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Proyecto;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProyectoControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndexMethod()
    {
        $response = $this->get('/proyectos');
        $response->assertStatus(200);
        $response->assertViewIs('proyectos.index');
        $response->assertViewHas('proyectos');
    }

    public function testCreateMethod()
    {
        $response = $this->get('/proyectos/create');
        $response->assertStatus(200);
        $response->assertViewIs('proyectos.create');
    }

    public function testStoreMethod()
    {
        $response = $this->post('/proyectos', [
            'nombreProyecto' => 'Proyecto de prueba',
            'descripcionProyecto' => 'Descripción de prueba',
            'responsable' => 'Responsable de prueba',
            'fechaInicio' => '2024-12-01',
            'fechaFin' => '2024-12-31',
        ]);

        $response->assertRedirect('/proyectos');
        $this->assertDatabaseHas('proyectos', [
            'nombreProyecto' => 'Proyecto de prueba',
            'descripcionProyecto' => 'Descripción de prueba',
            'responsable' => 'Responsable de prueba',
            'fechaInicio' => '2024-12-01',
            'fechaFin' => '2024-12-31',
        ]);
    }

    public function testShowMethod()
    {
        $proyecto = Proyecto::factory()->create();

        $response = $this->get('/proyectos/' . $proyecto->idProyecto);
        $response->assertStatus(200);
        $response->assertViewIs('proyectos.show');
        $response->assertViewHas('proyecto', $proyecto);
    }

    public function testEditMethod()
    {
        $proyecto = Proyecto::factory()->create();

        $response = $this->get('/proyectos/' . $proyecto->idProyecto . '/edit');
        $response->assertStatus(200);
        $response->assertViewIs('proyectos.edit');
        $response->assertViewHas('proyecto', $proyecto);
    }

    public function testUpdateMethod()
    {
        $proyecto = Proyecto::factory()->create();

        $response = $this->put('/proyectos/' . $proyecto->idProyecto, [
            'nombreProyecto' => 'Nombre actualizado',
            'descripcionProyecto' => 'Descripción actualizada',
            'responsable' => 'Responsable actualizado',
            'fechaInicio' => '2024-01-01',
            'fechaFin' => '2024-12-31',
        ]);

        $response->assertRedirect('/proyectos');
        $this->assertDatabaseHas('proyectos', [
            'idProyecto' => $proyecto->idProyecto,
            'nombreProyecto' => 'Nombre actualizado',
            'descripcionProyecto' => 'Descripción actualizada',
            'responsable' => 'Responsable actualizado',
            'fechaInicio' => '2024-01-01',
            'fechaFin' => '2024-12-31',
        ]);
    }

    public function testDestroyMethod()
    {
        $proyecto = Proyecto::factory()->create();

        $response = $this->delete('/proyectos/' . $proyecto->idProyecto);
        $response->assertRedirect('/proyectos');
        $this->assertDatabaseMissing('proyectos', ['idProyecto' => $proyecto->idProyecto]);
    }
}
