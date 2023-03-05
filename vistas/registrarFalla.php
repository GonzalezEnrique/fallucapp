<?php

include '../clases/Conexion.php';
include '../clases/Dispositivos.php';
include '../clases/Fallas2.php';

$falla = new falla();
$disp = new Dispositivos();

$error = "";

if (isset($_POST['registrar'])) {
    $codigo = $_POST['codigo'];
    $tipo = $_POST['tipo'];
    $ubicacion = $_POST['ubicacion'];
    $descripcion = $_POST['descripcion'];
    $dispositivo = $_POST['dispositivo'];

    $datos = array($codigo, $ubicacion, $descripcion, $dispositivo, $tipo);

    foreach ($datos as $dato) {
        if (empty(trim($dato))) {
            $error = "Completa los campos restantes";
        } else {
            $falla->nuevaFalla($codigo, $ubicacion, $descripcion, $dispositivo, $tipo);
            header('Location: Fallas.php');
        }
    }
}



$tipos_fallas = $falla->listarTiposF();
$lista_dispositivos = $disp->get_dispositivos();

// echo "<pre>";
// var_dump($tipos_fallas);
// var_dump($lista_dispositivos);
// echo "</pre>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar falla</title>
    <link rel="stylesheet" href="../recursos/css/estilos.css">
    <link rel="shortcut icon" href="../recursos/imagenes/logo.png" type="image/x-icon">
</head>

<header>
    <a href="../vistas/Fallucapp.php">
        <div class="logo">
            <img src="../recursos/imagenes/logo.png" width="90"> </img>
        </div>
    </a>

    <h1>Fallucapp</h1>
</header>

<body>

     
    <section id="form-register" name="form-register">
        <form class="form" method="post">
            <h2>Registrar falla</h2>
            <div class="form_container">
            <?php if (!empty(trim($error))) : ?>
                <div class="alerta error">
                    <?php echo $error ?>
                </div>
            <?php endif; ?>

                
                <div class="fg">
                    <label class="form_label" >Código</label>
                    <input class="controls" type="text" name="codigo" id="codigo">
                </div>
    
                <div class="fg">
                    <label class="form_label">Tipo</label>
                        <select class="controls" name="tipo" id="nombre">
                            <?php foreach ($tipos_fallas as $tipo): ?>
                                <option value="<?= $tipo['idTipoF']; ?>"><?= $tipo['tipo']; ?></option>
                            <?php endforeach; ?>
                        </select>
                </div>
    
                <div class="fg">
                    <label class="form_label" >Ubicación</label>
                    <input class="controls" type="text" name="ubicacion">
                </div>
    
                <div class="fg">
                    <label class="form_label" >Descripción</label>
                    <textarea class="controls" name="descripcion"></textarea>
                </div>
    
                <div class="fg">
                    <label class="form_label" >Dispositivo</label>
                        <select class="controls" name="dispositivo" id="dispositivo">
                            <?php foreach ($lista_dispositivos as $elemento): ?>
                                <option value="<?= $elemento['idTipoDisp']; ?>"><?= $elemento['nombre']; ?></option>
                            <?php endforeach; ?>
                        </select>
        
                </div>
                <input class="boton" name="registrar" type="submit" value="Registrar">
                <input class="botons" type="submit" value="Cancelar">
            </div>
        </form>       
    </section>   
</body>


</html>