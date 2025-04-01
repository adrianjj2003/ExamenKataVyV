<?php

use PHPUnit\Framework\TestCase;
use Deg540\DockerPHPBoilerplate\Tienda;

class TiendaTest extends TestCase
{
    public function testAgregarProductoSinCantidad()
    {
        $tienda = new Tienda();
        $resultado = $tienda->ejecutar("añadir pan");
        $this->assertEquals("pan x1", $resultado);
    }
}
