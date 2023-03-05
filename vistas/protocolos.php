<?php

include '../clases/Conexion.php';
include '../clases/Fallas2.php';
include '../clases/protocolo.php';

$proto = new Protocolo();
$tipos_fallas = new falla();
$opciones = $tipos_fallas->listarTiposF();

$pagina_actual = 1;
if (isset($_GET['page'])) {
    $pagina_actual = $_GET['page'];
}

if (isset($_POST['subir'])) {
    
    $protocolo = $_FILES['protocolo'];
    $pos = explode("/", $protocolo['tmp_name']);
    
    $carpeta = '../recursos/protocolos/';
    $nombreArchivo = $pos[2] . '-' . $protocolo['name'];
    $pathDestino = $carpeta . $nombreArchivo;

    move_uploaded_file($protocolo['tmp_name'], $pathDestino);
    $proto->add_protocolo($protocolo['name'], $pathDestino, $_POST['tipo']);
}

if (isset($_GET['del'])) {
    $proto->delete_protocolo($_GET['del']);
}

$consulta = $proto->get_protocolos($pagina_actual);
$lista_protocolos = $consulta[0];
$pagina = $consulta[2];
$total_paginas = $consulta[3];

if ($pagina_actual > $total_paginas) {
    header('Location: protocolos.php?page=1');
}
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protocolos</title>
    <link rel="stylesheet" type="text/css" href="../recursos/css/mystyle.css">
    <link rel="shortcut icon" href="../recursos/imagenes/logo.png" type="image/x-icon">
</head>

<body>
        <header class="header">
            <a href="../vistas/Fallucapp.php">
                <div class="claseLogo">
                    <img src="../recursos/imagenes/logo.png" > </img>
                </div>
            </a>
                <h1>Fallucapp</h1>
        </header>
        
        <div class="claseTitulo">
            <h2>
                Protocolos
            </h2>
        </div>
            
        <div id="botonSubir" name="botonSubir">
            <form action="protocolos.php" method="post" enctype="multipart/form-data">
                <label for="file-input">
                    <img src="../recursos/imagenes/subirA.jpg" > <h4>Subir archivo</h4> </img>
                </label>
                <input id="file-input" type="file" name="protocolo" style="display: none;">
                <br>
                <ul class="claseLista">  
                    <select class="controls" name="tipo" id="tipo">
                        <?php foreach ($opciones as $opcion) : ?>
                            <option class="claseDisp" value="<?= $opcion['idTipoF'] ?>"><?= $opcion['tipo']; ?> </option>
                        <?php endforeach; ?>

                    </select>
                </ul>
                <input type="submit" name="subir" value="Subir">
            </form>
        </div>

        

        <div class="estiloCaja">
            <div id="lista" name="lista">
                <ol>
                    <?php foreach ($lista_protocolos as $elemento): ?>
                        <li><a href="<?= $elemento['url']; ?>"><?= $elemento['nombre']; ?></a>
                            <a href="protocolos.php?del=<?= $elemento['idProtocolo'] ?>">
                                <div id="botonEliminar" name="botonEliminar">
                                    <button type="button" id="botonEliminar" name="botonEliminar">
                                        <img src="../recursos/imagenes/eliminarA.jpg"></img>
                                    </button>
                                </div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ol>
                <?php
                if ($total_paginas != 1) {
                    for ($i = 1; $i <= $total_paginas; $i++) :
                ?>
                        <button><a href="protocolos.php?page=<?= $i ?>"><?= $i ?></a></button>
                <?php
                    endfor;
                }
                ?>
            </div>
        </div>
</body>
</html>
