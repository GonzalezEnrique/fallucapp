<?php
class ConexionBD {
    private $host = "localhost"; 
    private $usuario = "root"; 
    private $contrasena = "16ecb0016t"; 
    private $nombre_bd = "fallucapp";
    private $conexion;

    //método para conectar a la base de datos
    public function conectar() {
        $dsn = "mysql:host=$this->host;dbname=$this->nombre_bd;charset=utf8mb4";
        $opciones = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $this->conexion = new PDO($dsn, $this->usuario, $this->contrasena, $opciones);
            return $this->conexion;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    //método para cerrar la conexión a la base de datos
    public function desconectar() {
        $this->conexion = null;
    }

    //método para ejecutar una consulta en la base de datos
    public function ejecutarConsulta($consulta, $parametros = []) {
        $stmt = $this->conexion->prepare($consulta);
        $stmt->execute($parametros);
        $resultado = $stmt->fetchAll();
        return $resultado;
    }
}