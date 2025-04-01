<?php
namespace Deg540\DockerPHPBoilerplate;

class Tienda
{
    private $productos = [];

    public function ejecutar(string $instruccion): string
    {
        $partes = explode(" ", trim($instruccion));
        if (strtolower($partes[0]) === "añadir") {
            $nombre = strtolower($partes[1]);
            $cantidad = isset($partes[2]) ? (int)$partes[2] : 1;
            $this->productos[$nombre] = $cantidad;
            return "$nombre x$cantidad";
        }
        return "";
    }
}
