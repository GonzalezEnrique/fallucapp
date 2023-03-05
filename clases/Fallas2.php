<?php

include 'Conexion.php';

class falla{
    private $id;
    private $codigo;
    private $tipo;
    private $descripcion;
    private $ubicacion;
    private $dispositivo;
    //weas
    private $buscador;
    


    public function get_id(){
        return $this->id;
    }
    public function get_codigo(){
        return $this->codigo;
    }
    public function get_tipo(){
        return $this->tipo;
    }
    public function get_descripcion(){
        return $this->descripcion;
    }
    public function get_ubicacion(){
        return $this->ubicacion;
    }
    public function get_dispositivo(){
        return $this->dispositivo;
    }
public function get_buscador(){
    return $this->buscador;
}
public function get_all_Fallas($page = 1, $tipoFalla) {
    $conn = new ConexionBD();
    $sql = 'SELECT * FROM fallas';
    $conn->conectar();
    
    $datos = $conn->ejecutarConsulta($sql);
    $total = count($datos);
    $total_page = 2;
    $pages = ceil($total / $total_page);
     
    $start_record = ($page - 1) * $total_page;
    $sql2 =sprintf("SELECT * FROM falla WHERE idTipoF = '%s'", $tipoFalla);
    $resultado = $conn->ejecutarConsulta($sql2);
    return [$resultado, $total, $page, $pages];
    
   
  
}

public function agregarFalla($datos){
    $conn = new ConexionBD();
    $conn->conectar();
    $conn->insertarDatos("fallas",$datos);
    $conn->desconectar();
}

public function actualizarFalla( $datos,$condicion){
    $conn = new ConexionBD();
    $conn->conectar();
    $conn->actualizar('fallas',$datos,"idFalla",$condicion);
    $conn->desconectar();
}

public function listarTiposF(){
    $conn = new ConexionBD();
    $sql = "SELECT * FROM tipos_fallas";
    $conn->conectar();
    $resultado = $conn->ejecutarConsulta($sql);
    return $resultado;
}

public function buscar($valor){
    $con = new ConexionBD();
    $con -> conectar();
    $resultado =$con -> buscar("fallas","nombre",$valor);
    return $resultado;

}

public function getFalla($id) {
    $sql = sprintf("SELECT * FROM fallas WHERE idfalla = '%s'",$id);
    $con = new ConexionBD();
    $con -> conectar();
    $resultado =$con -> ejecutarConsulta($sql);
    return $resultado;
}

public function eliminar($valor){
    
    $con = new ConexionBD();
    $con -> conectar();
    $con -> eliminar("fallas","idFalla",$valor);
    $con->desconectar();
}
}
    ?>