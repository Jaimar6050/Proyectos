<?php
namespace App\Models;

class Producto {
    private $id;
    private $nombre;
    private $cantidad;
    private $precio;
    private $descripcion;
    private $imagen;

    public function __construct($nombre, $cantidad, $precio, $descripcion, $imagen = null, $id = 0) {
        $this->nombre = $nombre;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getCantidad() {
        return $this->cantidad;
    }
    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function getPrecio() {
        return $this->precio;
    }
    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getImagen() {
        return $this->imagen;
    }
    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function __toString() {
        return "Producto: {$this->nombre}, Cantidad: {$this->cantidad}, Precio: {$this->precio}, Descripción: {$this->descripcion}, Imagen: {$this->imagen}";
    }
}
