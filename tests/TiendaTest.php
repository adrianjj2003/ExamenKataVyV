<?php
use PHPUnit\Framework\TestCase;
use Deg540\DockerPHPBoilerplate\Tienda;

class TiendaTest extends TestCase
{
    /** @test */
    public function agregarProductoSinCantidad()
    {
        $tienda = new Tienda();
        $this->assertEquals("pan x1", $tienda->ejecutar("añadir pan"));
    }
    /** @test */
    public function agregarProductoConCantidad()
    {
        $tienda = new Tienda();
        $this->assertEquals("leche x2", $tienda->ejecutar("añadir leche 2"));
    }
    /** @test */
    public function eliminarProductoExistenteSinDejarCarritoVacio()
    {
        $tienda = new Tienda();
        $tienda->ejecutar("añadir pan");
        $tienda->ejecutar("añadir leche 2");
        $this->assertEquals("leche x2", $tienda->ejecutar("eliminar pan"));
    }

}
