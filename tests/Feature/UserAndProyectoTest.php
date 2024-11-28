<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Proyecto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;

class UserAndProyectoTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_mass_assign_user_attributes()
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
        ]);

        $this->assertEquals('john doe', $user->name);
        $this->assertEquals('john@example.com', $user->email);
        $this->assertEquals('password123', $user->password);
    }

    #[Test]
    public function it_can_mass_assign_proyecto_attributes()
    {
        $proyecto = Proyecto::create([
            'nombreProyecto' => 'Nuevo Proyecto',
            'descripcionProyecto' => 'Descripción del proyecto',
            'responsable' => 'Jane Doe',
            'fechaInicio' => '2024-01-01',
            'fechaFin' => '2024-12-31',
        ]);

        $this->assertEquals('Nuevo Proyecto', $proyecto->nombreProyecto);
        $this->assertEquals('Descripción del proyecto', $proyecto->descripcionProyecto);
        $this->assertEquals('Jane Doe', $proyecto->responsable);
        $this->assertEquals('2024-01-01', $proyecto->fechaInicio);
        $this->assertEquals('2024-12-31', $proyecto->fechaFin);
    }

    #[Test]
    public function it_sets_user_name_to_lowercase()
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
        ]);

        $this->assertEquals('john doe', $user->name);
    }

    #[Test]
    public function it_gets_user_name_in_title_case()
    {
        $user = User::create([
            'name' => 'john doe',
            'email' => 'john@example.com',
            'password' => 'password123',
        ]);

        $this->assertEquals('John Doe', $user->name);
    }

    #[Test]
    public function it_hides_user_password()
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
        ]);

        $this->assertArrayNotHasKey('password', $user->toArray());
    }

    #[Test]
    public function it_hides_remember_token()
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
            'remember_token' => 'token123',
        ]);

        $this->assertArrayNotHasKey('remember_token', $user->toArray());
    }

    #[Test]
    public function it_casts_email_verified_at_to_datetime()
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
            'email_verified_at' => '2024-01-01 00:00:00',
        ]);

        $this->assertInstanceOf(\DateTime::class, $user->email_verified_at);
    }

    #[Test]
    public function it_sets_proyecto_table_name()
    {
        $proyecto = Proyecto::create([
            'nombreProyecto' => 'Nuevo Proyecto',
            'descripcionProyecto' => 'Descripción del proyecto',
            'responsable' => 'Jane Doe',
            'fechaInicio' => '2024-01-01',
            'fechaFin' => '2024-12-31',
        ]);

        $this->assertEquals('proyectos', $proyecto->getTable());
    }

    #[Test]
    public function it_sets_proyecto_primary_key()
    {
        $proyecto = Proyecto::create([
            'nombreProyecto' => 'Nuevo Proyecto',
            'descripcionProyecto' => 'Descripción del proyecto',
            'responsable' => 'Jane Doe',
            'fechaInicio' => '2024-01-01',
            'fechaFin' => '2024-12-31',
        ]);

        $this->assertEquals('idProyecto', $proyecto->getKeyName());
    }

    #[Test]
    public function it_increments_proyecto_primary_key()
    {
        $proyecto = Proyecto::create([
            'nombreProyecto' => 'Nuevo Proyecto',
            'descripcionProyecto' => 'Descripción del proyecto',
            'responsable' => 'Jane Doe',
            'fechaInicio' => '2024-01-01',
            'fechaFin' => '2024-12-31',
        ]);

        $this->assertTrue($proyecto->incrementing);
    }

    #[Test]
    public function it_creates_new_user()
    {
        $user = User::create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'password' => 'password456',
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'jane@example.com',
        ]);
    }

    #[Test]
    public function it_creates_new_proyecto()
    {
        $proyecto = Proyecto::create([
            'nombreProyecto' => 'Proyecto de Test',
            'descripcionProyecto' => 'Descripción para el proyecto de test',
            'responsable' => 'Juan Perez',
            'fechaInicio' => '2024-02-01',
            'fechaFin' => '2024-11-30',
        ]);

        $this->assertDatabaseHas('proyectos', [
            'nombreProyecto' => 'Proyecto de Test',
        ]);
    }

    #[Test]
    public function it_checks_user_email_unique_constraint()
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
        ]);

        $this->expectException(\Illuminate\Database\QueryException::class);

        User::create([
            'name' => 'Jane Doe',
            'email' => 'john@example.com',
            'password' => 'password456',
        ]);
    }

    #[Test]
    public function it_checks_proyecto_fecha_inicio_format()
    {
        $proyecto = Proyecto::create([
            'nombreProyecto' => 'Proyecto Fecha',
            'descripcionProyecto' => 'Proyecto con fecha de inicio',
            'responsable' => 'Ana Lopez',
            'fechaInicio' => '2024-03-01',
            'fechaFin' => '2024-08-01',
        ]);

        $this->assertEquals('2024-03-01', $proyecto->fechaInicio);
    }

    #[Test]
    public function it_checks_proyecto_fecha_fin_format()
    {
        $proyecto = Proyecto::create([
            'nombreProyecto' => 'Proyecto Fecha',
            'descripcionProyecto' => 'Proyecto con fecha de fin',
            'responsable' => 'Ana Lopez',
            'fechaInicio' => '2024-03-01',
            'fechaFin' => '2024-08-01',
        ]);

        $this->assertEquals('2024-08-01', $proyecto->fechaFin);
    }
}
