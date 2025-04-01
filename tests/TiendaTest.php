<?php
use PHPUnit\Framework\TestCase;
use Deg540\DockerPHPBoilerplate\Tienda;

class TiendaTest extends TestCase
{
    /** @test */
    public function agregarPanSinCantidadDevuelvePanx1()
    {
        $tienda = new Tienda();
        $this->assertEquals("pan x1", $tienda->ejecutar("añadir pan"));
    }
    /** @test */
    public function agregarLecheConCantidad2DevuelveLechex2()
    {
        $tienda = new Tienda();
        $this->assertEquals("leche x2", $tienda->ejecutar("añadir leche 2"));
    }
    /** @test */
    public function eliminarLecheExistenteDevuelveNada()
    {
        $tienda = new Tienda();
        $tienda->ejecutar("añadir leche 2");
        $this->assertEquals("", $tienda->ejecutar("eliminar leche"));
    }
    /** @test */
    public function agregarPanLuegoPan2DevuelvePanx3()
    {
        $tienda = new Tienda();
        $tienda->ejecutar("añadir pan");
        $this->assertEquals("pan x3", $tienda->ejecutar("añadir pan 2"));
    }
    /** @test */
    public function eliminarArrozDevuelveProductoInexistente()
    {
        $tienda = new Tienda();
        $this->assertEquals("El producto seleccionado no existe", $tienda->ejecutar("eliminar arroz"));
    }
    /** @test */
    public function vaciarLaListaDevuelveNada()
    {
        $tienda = new Tienda();
        $tienda->ejecutar("añadir pan");
        $tienda->ejecutar("añadir leche 2");
        $this->assertEquals("", $tienda->ejecutar("vaciar"));
    }


}
