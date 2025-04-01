<?php
namespace Deg540\DockerPHPBoilerplate;

class Tienda
{
    private array $productos = [];

    public function ejecutar(string $instruccion): string
    {
        $partes = explode(' ', trim($instruccion));
        if (strtolower($partes[0]) === 'añadir') {
            $nombre = strtolower($partes[1]);
            $cantidad = isset($partes[2]) ? (int)$partes[2] : 1;
            $this->productos[$nombre] = ($this->productos[$nombre] ?? 0) + $cantidad;
        }
        if (empty($this->productos)) {
            return "";
        }
        $productosOrdenados = $this->productos;
        uksort($productosOrdenados, 'strcasecmp');
        $output = [];
        foreach ($productosOrdenados as $nombre => $cantidad) {
            $output[] = "$nombre x$cantidad";
        }
        return implode(', ', $output);
    }
}
