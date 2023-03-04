<?php
include 'Conexion.php';

class Dispositivos{
    private $id_Dispositivo;
    private $nombre;
    private $ubicacion;
    private $descripcion;
    private $configuracion;
    private $tipo;
    
   /* public function _construct($id_Dispositivo, $nombre, $ubicacion, $descripcion, $configuracion, $tipo){
        $this->id_Dispositivo = $id_Dispositivo;
        $this->nombre = $nombre;
        $this->ubicacion = $ubicacion;
        $this->descripcion = $descripcion;
        $this->configuracion = $configuracion;
        $this->tipo = $tipo;
    }*/ 

    public function getId()
    {
        return $this->id_Dispositivo;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getUbicacion()
    {
        return $this->ubicacion;
    } 
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function getConfiguracion()
    {
        return $this->configuracion;
    }
    public function getTipo()
    {
        return $this->tipo;
    }
    public function get_all_dispositivos($page = 1, $tipoDispositivo) {
        $conn = new ConexionBD();
        $sql = 'SELECT * FROM dispositivos';
        $conn->conectar();
        
        $datos = $conn->ejecutarConsulta($sql);
        $total = count($datos);
        $total_page = 2;
        $pages = ceil($total / $total_page);
         
        $start_record = ($page - 1) * $total_page;
        $sql2 = "SELECT * FROM dispositivos WHERE idTipoDisp = $tipoDispositivo";
        $resultado = $conn->ejecutarConsulta($sql2);
        return [$resultado, $total, $page, $pages];
        
       
      
    }

    public function agregarDispositivo($tabla, array $datos){
        $conn = new ConexionBD();
        $conn->insertarDatos($tabla,$datos);
        $conn->desconectar();
    }

    public function listarTipos(){
        $conn = new ConexionBD();
        $sql = "SELECT * FROM tipos_dispositivos";
        $conn->conectar();
        $resultado = $conn->ejecutarConsulta($sql);
        return $resultado;
    }


   
}