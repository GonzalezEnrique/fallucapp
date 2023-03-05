<?php
include '../clases/Conexion.php';
include '../clases/Dispositivos.php';
$dispositivos = new Dispositivos();
$opciones = $dispositivos->listarTipos();
$id = $_GET['dispositivo'];
$dispositivo = $dispositivos->getDispositivo($id);
$nombre = $dispositivo[0]['nombre'];
$ubicacion = $dispositivo[0]['ubicacion'];
$descripcion = $dispositivo[0]['descripcion'];
$tipo = $dispositivo[0]['idTipoDisp'];
$nombreConfig = $dispositivo[0]['configuracion'];
//var_dump($dispositivo[0]);
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if ($_POST['cancelar']) {
        header('location: inventario.php');
    }
    $nombre = $_POST['nombre'];
    $ubicacion = $_POST['ubicacion'];
    $descripcion = $_POST['descripcion'];
    $tipo = $_POST['tipo'];
    $configuracion = $_FILES['configuracion'];

    $pos = strrpos($configuracion['full_path'], ".");
    $extension = substr($configuracion['full_path'], $pos);



    if (!$nombre) {
        $errores[] = "Debes agregar un nombre de dispositivo";
    }
    if (!$ubicacion) {
        $errores[] = "La ubicacion es obligatoria";
    }
    if (!$descripcion) {
        $errores[] = "La descripcion es obligatoria";
    }
    if (!$tipo) {
        $errores[] = "Selecciona el tipo de dispositivo";
    }

    if (empty($errores)) {
        $carpetaConfig = "../recursos/archivosConfig/";

        if (!is_dir($carpetaConfig)) {
            mkdir($carpetaConfig);
        }

        if (!$configuracion['name']) {
            $datos = [
                'nombre' => $nombre,
                'ubicacion' => $ubicacion,
                'configuracion' => $nombreConfig,
                'descripcion' => $descripcion,
                'idTipoDisp' => intval($tipo)
            ];

            $condicion = intval($id);

            $dispositivos->actualizarDispositivo($datos, $condicion);
            header('location: inventario.php?alerta=2');
        } else {
            unlink($carpetaConfig . $nombreConfig);
            $nombreArchivo = md5(uniqid(rand(), true)) . $extension;
            move_uploaded_file($configuracion['tmp_name'], $carpetaConfig . $nombreArchivo);
            $datos = [
                'nombre' => $nombre,
                'ubicacion' => $ubicacion,
                'configuracion' => $nombreArchivo,
                'descripcion' => $descripcion,
                'idTipoDisp' => intval($tipo)
            ];

            $condicion = intval($id);

            $dispositivos->actualizarDispositivo($datos, $condicion);


            header('location: inventario.php?alerta=2');
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../recursos/css/style.css">
    <link rel="shortcut icon" href="../recursos/imagenes/logo.png" type="image/x-icon">

    <title>Actualizar dispositivo</title>
</head>

<body>
    <div class="contenedor">
        <header>
            <a href="../vistas/Fallucapp.php">

                <img class="lo" src="../recursos/imagenes/logo.png">

            </a>
            <h1>Fallucapp</h2>
        </header>

        <section class="form-register">


            <form class="form" method="POST" enctype="multipart/form-data">
                <h2>Actualizar dispositivo</h2>

                <?php foreach ($errores as $error) : ?>
                    <div class="alerta error">
                        <?php echo $error ?>
                    </div>

                <?php endforeach ?>
                <div class="form_container">
                    <div class="fg">
                        <label class="form_label" for="nombre">Nombre:</label>
                        <input class="controls" type="text" name="nombre" id="nombre" placeholder="Nombre del dispositivo" value="<?php echo $nombre ?>">
                    </div>
                    <div class="fg">
                        <label class="form_label" for="tipo">Tipo:</label>
                        <select class="controls" name="tipo" id="tipo">
                            <option value="">-- Selecionar --</option>
                            <?php
                            foreach ($opciones as $opcion) :
                            ?>
                                <option <?php echo $tipo == $opcion['idTipoDisp'] ? 'selected' : ''; ?> value="<?php echo $opcion['idTipoDisp'] ?>"><?php echo $opcion['tipo']; ?> </option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                    <div class="fg">
                        <label class="form_label" for="ubicacion">Ubicación:</label>
                        <input class="controls" type="text" name="ubicacion" id="ubicacion" placeholder="Ubicación del dispositivo" value="<?php echo $ubicacion ?>">
                    </div>
                    <div class="fg">
                        <label class="form_label" for="descripcion">Descripción:</label>
                        <textarea class="controls" name="descripcion" id="descripcion" placeholder="Descripción"><?php echo $descripcion ?></textarea>
                    </div>
                    <div class="fg">
                        <label class="form_label" for="configuracion">Configuración:</label>
                        <input class="controls" type="file" name="configuracion" id="configuracion" placeholder="Configuración">
                    </div>
                </div>
                <input class="btnA" type="submit" value="Actualizar">
                <input name="cancelar" class="btnC" type="submit" value="Cancelar">
                </a>
            </form>

        </section>
    </div>
</body>

</html>