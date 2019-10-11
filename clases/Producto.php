<?php

class Producto{
  private $nombre;
  private $precio;
  private $categoria;
  private $descripcion;

  public function __construct($nombre, $precio, $categoria, $descripcion = null){
    $this->nombre = $nombre;
    $this->precio = $precio;
    $this->categoria = $categoria;
    $this->descripcion = $descripcion;
  }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

}



 ?>
