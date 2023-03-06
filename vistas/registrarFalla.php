<?php

include '../clases/Conexion.php';
include '../clases/Dispositivos.php';
include '../clases/Fallas2.php';

$falla = new falla();
$disp = new Dispositivos();

$error = "";
$idFalla = null;
$resultado = [];

if (isset($_GET['falla'])) {
    $idFalla = $_GET['falla'];
    $resultado = $falla->getFalla($idFalla);

}

if (isset($_POST['registrar'])) {
    $codigo = $_POST['codigo'];
    $tipo = $_POST['tipo'];
    $ubicacion = $_POST['ubicacion'];
    $descripcion = $_POST['descripcion'];
    $dispositivo = $_POST['dispositivo'];
    $estado = $_POST['estado'];

    $datos = array(
        "codigo" => $codigo, 
        "ubicacion" => $ubicacion, 
        "descripcionFalla" => $descripcion, 
        "estado" => $estado, 
        "idDispositivo" => $dispositivo, 
        "idTipoF" => $tipo);

    foreach ($datos as $dato) {
        if (empty(trim($dato))) {
            $error = "Completa los campos restantes";
            break;
        } else {
            if (!isset($_GET['falla'])) {
                $falla->agregarFalla($datos);
            } else {
                $falla->actualizarFalla($datos, $idFalla);
            }
            break;
        }
    }
    header('Location: Fallas.php');
}

if (isset($_POST['cancelar'])) {
    header('Location: Fallas.php');
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
                    <input class="controls" type="text" name="codigo" id="codigo" 
                    value="<?= $resultado[0]['codigo']; ?>">
                </div>
    
                <div class="fg">
                    <label class="form_label">Tipo</label>
                        <select class="controls" name="tipo" id="nombre">
                            <?php foreach ($tipos_fallas as $tipo): ?>
                                <option value="<?= $tipo['idTipoF']; ?>"
                                 <?php if ($resultado[0]['idTipoF'] == $tipo['idTipoF']) {
                                    ?> selected 
                                    <?php } ?>><?= $tipo['tipo']; ?></option>
                            <?php endforeach; ?>
                        </select>
                </div>
    
                <div class="fg">
                    <label class="form_label" >Ubicación</label>
                    <input class="controls" type="text" name="ubicacion" 
                    value="<?= $resultado[0]['ubicacion']; ?>">
                </div>
    
                <div class="fg">
                    <label class="form_label" >Descripción</label>
                    <textarea class="controls" name="descripcion">
                        <?= trim($resultado[0]['descripcionFalla']); ?>
                    </textarea>
                </div>
    
                <div class="fg">
                    <label class="form_label" >Dispositivo</label>
                        <select class="controls" name="dispositivo" id="dispositivo">
                            <?php foreach ($lista_dispositivos as $elemento): ?>
                                <option value="<?= $elemento['idTipoDisp']; ?>" 
                                <?php if (strcmp($resultado[0]['nombre'], $elemento['nombre']) == 0) {
                                    ?> selected 
                                    <?php } ?>><?= $elemento['nombre']; ?></option>
                            <?php endforeach; ?>
                        </select>
                </div>

                <?php if (isset($_GET['falla'])): ?>
                    <div class="fg">
                        <label class="form_label" >Dispositivo</label>
                        <select class="controls" name="estado" id="dispositivo">
                            <option value="0" 
                            <?php if ($resultado[0]['estado'] == 0) { ?>
                                selected
                            <?php } ?>>Pendiente</option>
                            <option value="1" 
                            <?php if ($resultado[0]['estado'] == 1) { ?>
                                selected
                            <?php } ?>>Resuelta</option>
                        </select>
                    </div>
                <?php endif; ?>


                <input class="boton" name="registrar" type="submit" value="Registrar">
                <input class="botons" name="cancelar" type="submit" value="Cancelar">
            </div>
        </form>       
    </section>   
</body>


</html>