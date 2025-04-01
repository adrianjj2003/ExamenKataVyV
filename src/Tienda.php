<?php
namespace Deg540\DockerPHPBoilerplate;

class Tienda
{
    private array $productos = [];

    public function ejecutar(string $instruccion): string
    {
        $partes = explode(' ', trim($instruccion));
        $accion = strtolower($partes[0]);
        if ($accion === 'añadir') {
            $nombre = strtolower($partes[1]);
            $cantidad = isset($partes[2]) ? (int)$partes[2] : 1;
            $this->productos[$nombre] = ($this->productos[$nombre] ?? 0) + $cantidad;
        } elseif ($accion === 'eliminar') {
            $nombre = strtolower($partes[1]);
            if (!isset($this->productos[$nombre])) {
                return "El producto seleccionado no existe";
            }
            unset($this->productos[$nombre]);
        } elseif ($accion === 'vaciar') {
            $this->productos = [];
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
