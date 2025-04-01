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
        $tienda->ejecutar("añadir pan");
        $ejemplo = $tienda->ejecutar("añadir leche 2");
        $this->assertEquals("leche x2, pan x1", $ejemplo);
    }
}
