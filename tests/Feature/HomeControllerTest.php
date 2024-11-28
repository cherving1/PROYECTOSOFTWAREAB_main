<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    /**
     * Test the __invoke method.
     *
     * @return void
     */
    public function testInvokeMethod()
    {
        $response = $this->get('/'); // Asumiendo que la ruta raíz llama al método __invoke
        $response->assertStatus(200);
        $response->assertViewIs('home');
    }

    /**
     * Test the index method.
     *
     * @return void
     */
    public function testIndexMethod()
    {
        $response = $this->get('/admin'); // Asumiendo que la ruta /admin llama al método index
        $response->assertStatus(200);
        $response->assertViewIs('admin.index');
    }
}
