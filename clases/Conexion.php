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

    public function insertarDatos($tabla, $datos) {
        // crear consulta preparada
        $campos = array_keys($datos);
        $valores = array_fill(0, count($datos), '?');
        $consulta = "INSERT INTO $tabla (".implode(',', $campos).") VALUES (".implode(',', $valores).")";
        // ejecutar consulta con parámetros
        $parametros = array_values($datos);
        $stmt = $this->conexion->prepare($consulta);
        $stmt->execute($parametros);
        return $stmt->rowCount();
    }

    public function buscar($tabla, $campo, $valor) {
        $consulta = "SELECT * FROM $tabla WHERE $campo LIKE ?";
        $parametros = ["%{$valor}%"];
        $stmt = $this->conexion->prepare($consulta);
        $stmt->execute($parametros);
        $resultado = $stmt->fetchAll();
        return $resultado;
      }

      public function actualizar($tabla, $datos, $campoCondicion, $valorCondicion) {
        // crear consulta preparada
        $campos = array_keys($datos);
        $valores = array_fill(0, count($datos), '?');
        $parametros = array_values($datos);
        $consulta = "UPDATE $tabla SET ".implode('=?,', $campos)."=? WHERE $campoCondicion=?";
        $parametros[] = $valorCondicion;
        // ejecutar consulta con parámetros
        $stmt = $this->conexion->prepare($consulta);
        $stmt->execute($parametros);
        return $stmt->rowCount();
    }
    
    
      

    
}