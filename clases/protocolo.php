<?php

class protocolo {

    public function add_protocolo($nombre, $url, $idTipoF) {
        $conn = new ConexionBD();
        $sql = "INSERT INTO protocolos(nombre, url, idTipoF) VALUES('$nombre', '$url', '$idTipoF')";
        $conn->conectar();
        
        $conn->ejecutarConsulta($sql);
    }

    public function get_protocolos($page = 1) {
        $conn = new ConexionBD();
        $sql = 'SELECT * FROM protocolos';
        $conn->conectar();
        
        $datos = $conn->ejecutarConsulta($sql);
        $total = count($datos);
        $total_page = 20;
        $pages = ceil($total / $total_page);
        
        $start_record = ($page - 1) * $total_page;
        $sql2 = "SELECT * FROM protocolos INNER JOIN tipo_fallas 
        ON protocolos.idTipoF = tipo_fallas.idTipoF LIMIT $start_record, $total_page";
        $resultado = $conn->ejecutarConsulta($sql2);

        return [$resultado, $total, $page, $pages];
    }

    public function delete_protocolo($id) {
        $conn = new ConexionBD();
        $sql = 'DELETE FROM protocolos WHERE idProtocolo=' . $id;
        $conn->conectar();
        
        $conn->ejecutarConsulta($sql);
    }
}