<?php

include 'Conexion.php';

class Inventario {

    private $id;
    private $cantidad;
    private $id_dispositivo;

    // public function __construct($id, $cantidad, $id_dispositivo) {
    //     $this->id = $id;
    //     $this->cantidad = $cantidad;
    //     $this->id_dispositivo = $id_dispositivo;
    // }

    public function get_cantidad() {
        return $this->cantidad;
    }

    public function get_id_dispositivo() {
        return $this->id_dispositivo;
    }

    public function get_all_inventario($page = 1) {
        $conn = new ConexionBD();
        $sql = 'SELECT * FROM inventario';
        $conn->conectar();
        
        $datos = $conn->ejecutarConsulta($sql);
        $total = count($datos);
        $total_page = 20;
        $pages = ceil($total / $total_page);
        
        $start_record = ($page - 1) * $total_page;
        $sql2 = "SELECT * FROM inventario INNER JOIN tipos_dispositivos 
        ON inventario.idTipoDisp = tipos_dispositivos.idTipoDisp LIMIT $start_record, $total_page";
        $resultado = $conn->ejecutarConsulta($sql2);
        
        // Visualizar
        // echo "<pre>";
        // var_dump($resultado);
        // echo "</pre>";
        
        return [$resultado, $total, $page, $pages];
    }
}

// Valores sin importancia en el contructor, solo para probar la consulta
$inv = new Inventario();
$inv->get_all_inventario();