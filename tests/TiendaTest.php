<?php
use PHPUnit\Framework\TestCase;
use Deg540\DockerPHPBoilerplate\Tienda;

class TiendaTest extends TestCase
{
    public function testAgregarProductoSinCantidad()
    {
        $tienda = new Tienda();
        $this->assertEquals("pan x1", $tienda->ejecutar("añadir pan"));
    }

    public function testAgregarProductoConCantidad()
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
        $ejemplo = $tienda->ejecutar("eliminar pan");
        $this->assertEquals("leche x2", $ejemplo);
    }

}
