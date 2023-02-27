<?php

include 'Conexion.php';

class falla{
    private $id;
    private $codigo;
    private $tipo;
    private $descripcion;
    private $ubicacion;
    private $dispositivo;

//    public function __construct($iD,$cd,$tp,$ds,$lt,$disp){
  //      $this ->id=$id
    //      $this ->codigo=$codigo;
      //      $this ->tipo=$tipo;
        //      $this ->descripcion=$descripcion;
          //      $this ->ubicacion=$ubicacion;
            //      $this ->dispositivo=$dispositivo;
    }
    public function get_id(){
        return $this->id
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

    public function get_all_fallasM($page = 1) {
        $conn = new ConexionBD();
        $sql = 'SELECT * FROM fallas';
        $conn->conectar();
        mysql_select_db ("fallas");
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

// Valores sin importancia en el contructor, solo para probar la consulta
$failure = new fallas();
$failure->get_all_fallas();



}
    ?>