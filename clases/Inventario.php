<?php

include 'Conexion.php';

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

    public function get_all_inventario() {
        $conn = new ConexionBD();
        $sql = 'SELECT * FROM inventario INNER JOIN tipos_dispositivos ON inventario.idTipoDisp = tipos_dispositivos.idTipoDisp';
        $conn->conectar();
        
        $datos = $conn->ejecutarConsulta($sql);

        // Visualizar datos (forma 1)
        echo "<pre>";
        var_dump($datos);
        echo "</pre>";

        // Visualizar datos (forma 2)
        foreach ($datos as $dato) {
            echo "id: " . $dato["id"] . "<br>";
            echo "cantidad: " . $dato["cantidad"] . "<br>";
            //echo "idTipoDisp: " . $dato["idTipoDisp"] . "<br>";
            echo "TipoDisp: " . $dato["tipo"] . "<br><hr>";
        }
    }
}

// Valores sin importancia en el contructor, solo para probar la consulta
$inv = new Inventario(1, 2, 3);
$inv->get_all_inventario();