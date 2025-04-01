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
}
