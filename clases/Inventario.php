<?php

class Inventario {

    private $id;
    private $cantidad;
    private $id_dispositivo;

    public function __construct($id, $cantidad, $id_dispositivo) {
        $this->id = $id;
        $this->cantidad = $cantidad;
        $this->id_dispositivo = $id_dispositivo;
    }

    public function get_cantidad() {
        return $this->cantidad;
    }

    public function get_id_dispositivo() {
        return $this->id_dispositivo;
    }

    public function get_all_inventario() {}
}