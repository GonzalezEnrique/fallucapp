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
    public function get_all_fallasM($page = 1) {
        $conn = new ConexionBD();
        $sql = 'SELECT * FROM fallas';
        $conn->conectar();
        $datos = $conn->ejecutarConsulta($sql);
        $total = count($datos);
        $total_page = 2;
        $pages = ceil($total / $total_page);
        
        $start_record = ($page - 1) * $total_page;
        $sql2 = "SELECT * FROM fallas  LIMIT $start_record, $total_page";
        $resultado = $conn->ejecutarConsulta($sql2);
        
        // Visualizar datos (forma 1)
        echo "<pre>";
        var_dump($resultado);
        echo "</pre>";
        
        // // Visualizar datos (forma 2)
        // foreach ($datos as $dato) {
            //     echo "id: " . $dato["id"] . "<br>";
            //     echo "cantidad: " . $dato["cantidad"] . "<br>";
            //     //echo "idTipoDisp: " . $dato["idTipoDisp"] . "<br>";
            //     echo "TipoDisp: " . $dato["tipo"] . "<br><hr>";
            // }
            // return $datos;
        return [$resultado, $total, $page, $pages];
    }

//agregar falla en base de datos
    public function add_mysqlBD($codetobe,$typetobe,$desctobe,$locatobe,$dispotobe){
        $conn = new ConexionBD();

        $conn->conectar();
        $newCode=$codetobe;
        $newDescription=$desctobe;
        $newLocation=$locatobe;
//temp----------------------------------+++++++++++++++++++++++++++++++++++++++++++++++++-----------------------------------------
        $newTypeName=$typetobe;
        $newDeviseNAME=$dispotobe;

       $consul1=sprintf("SELECT idDispositivo FROM dispositivos where nombre='%s'",$newDeviseNAME);
$diter=$conn->ejecutarConsulta($consul1);
$iDispo=$diter['idDispositivo']; 
       $newDeviseId=$iDispo;

       $consul2=sprintf("SELECT idTipoDisp FROM tipos_dispositivos where tipo='%s'",$newTypeName);
       $dites=$conn->ejecutarConsulta($consul2);     
       $cTipo=$dites['idTipoDisp']; 
       $newTypeId=$cTipo;
 //temp----------------------------------+++++++++++++++++++++++++++++++++++++++++++++++++---------------------------------------
    // Query to Perform 
        $query = sprintf("INSERT INTO fallas (codigo, ubicacion , descripcion , idDispositivo, idTipoF)
        VALUES ('%s', '%s', '%s', '%s', '%s');",$newCode ,$newTypeId , $newDescription , $newLocation , $newDeviseId);    
    // Perform Query
    $datos = $conn->ejecutarConsulta($query);
    }

 
//editar falla en base de datos
public function edit_mysqlBD($currentid,$codetobe,$typetobe,$desctobe,$locatobe,$dispotobe){
       
        $conn = new ConexionBD();

        $conn->conectar();
        $newCode=$codetobe;
        $newDescription=$desctobe;
        $newLocation=$locatobe;
//temp----------------------------------+++++++++++++++++++++++++++++++++++++++++++++++++-----------------------------------------
$newTypeName=$typetobe;
$newDeviseNAME=$dispotobe;

$consul1=sprintf("SELECT idDispositivo FROM dispositivos where nombre='%s'",$newDeviseNAME);
$diter=$conn->ejecutarConsulta($consul1);
$iDispo=$diter['idDispositivo']; 
$newDeviseIds=$iDispo;

$consul2=sprintf("SELECT idTipoDisp FROM tipos_dispositivos where tipo='%s'",$newTypeName);
$dites=$conn->ejecutarConsulta($consul2);     
$cTipo=$dites['idTipoDisp']; 
$newTypeIds=$cTipo;
//temp----------------------------------+++++++++++++++++++++++++++++++++++++++++++++++++---------------------------------------
 
    // Query to Perform 
        $query = sprintf("UPDATE fallas SET codigo='%s', idTipoF='%s', descripcion='%s', ubicacion='%s', idDispositivo='%s' 
        WHERE idFalla='%s';", $newCode ,$newTypeIds , $newDescription , $newLocation , $newDeviseIds , $currentid);
    // Perform Query
    $datos = $conn->ejecutarConsulta($query);
    }

    //acomodar version beta
    public function sotr_yb($Bus)
    {
        $conn = new ConexionBD();
        $conn->conectar();
        $sql =sprintf( "SELECT * FROM fallas where text like '%s'", $Bus);
        $datos = $conn->ejecutarConsulta($sql);
        $total = count($datos);
        $total_page = 2;
    }
// Valores sin importancia en el contructor, solo para probar la consulta
 //$failure = new fallas();
//$failure->get_all_fallas();
//constructor
//    public function __construct($iD,$cd,$tp,$ds,$lt,$disp){
  //      $this ->id=$id
    //      $this ->codigo=$codigo;
      //      $this ->tipo=$tipo;
        //      $this ->descripcion=$descripcion;
          //      $this ->ubicacion=$ubicacion;
            //      $this ->dispositivo=$dispositivo;
    //}
// fee}
}
    ?>