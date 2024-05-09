<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
//use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
//use App\Models\Cliente;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    //use DatabaseTransactions;


    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/compras/ingreso/create');

        $response->assertStatus(200); // Verifica que la respuesta tenga código de estado 200
        $response->assertSee('Nuevo Ingreso'); // Verifica que el texto esperado esté presente en la respuesta
    }

}
