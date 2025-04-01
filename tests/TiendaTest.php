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
    public function eliminarProductoExistente()
    {
        $tienda = new Tienda();
        $tienda->ejecutar("añadir leche 2");
        $this->assertEquals("", $tienda->ejecutar("eliminar leche"));
    }
    /** @test */
    public function agregarProductoExistenteConCantidad()
    {
        $tienda = new Tienda();
        $tienda->ejecutar("añadir pan");
        $this->assertEquals("pan x3", $tienda->ejecutar("añadir pan 2"));
    }
    /** @test */
    public function eliminarProductoInexistente()
    {
        $tienda = new Tienda();
        $resultado = $tienda->ejecutar("eliminar arroz");
        $this->assertEquals("El producto seleccionado no existe", $resultado);
    }

}
