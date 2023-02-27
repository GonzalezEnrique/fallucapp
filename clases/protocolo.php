<?php
class protocolo {

private $id;
private $nombre;
private $tipo;

    function __construct($id, $nombre, $tipo)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }
}