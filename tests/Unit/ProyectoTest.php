<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Proyecto;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProyectoTest extends TestCase
{
    use RefreshDatabase;

    public function testFillableAttributes()
    {
        $proyecto = new Proyecto();

        $fillable = [
            'nombreProyecto',
            'descripcionProyecto',
            'responsable',
            'fechaInicio',
            'fechaFin',
        ];

        $this->assertEquals($fillable, $proyecto->getFillable());
    }

    public function testTableName()
    {
        $proyecto = new Proyecto();
        $this->assertEquals('proyectos', $proyecto->getTable());
    }

    public function testPrimaryKey()
    {
        $proyecto = new Proyecto();
        $this->assertEquals('idProyecto', $proyecto->getKeyName());
    }

    public function testIncrementing()
    {
        $proyecto = new Proyecto();
        $this->assertTrue($proyecto->getIncrementing());
    }
}
