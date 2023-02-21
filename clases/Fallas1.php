<?php

class falla{
    private $codigo;
    private $tipo;
    private $descripcion;
    private $ubicacion;
    private $dispositivo;

    public function __construct($cd,$tp,$ds,$lt,$disp){
        $this ->codigo=$codigo;
        $this ->tipo=$tipo;
        $this ->descripcion=$descripcion;
        $this ->ubicacion=$ubicacion;
        $this ->dispositivo=$dispositivo;
    }

    public function get_codigo(){
        return $this->codigo
    }
    public function get_tipo(){
        return $this->tipo
    }
    public function get_descripcion(){
        return $this->descripcion
    }
    public function get_ubicacion(){
        return $this->ubicacion
    }
    public function get_dispositivo(){
        return $this->dispositivo
    }



}

    ?>