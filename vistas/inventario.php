<?php

include '../clases/Conexion.php';
include '../clases/Inventario.php';


$pagina_actual = 1;
if (isset($_GET['page'])) {
    $pagina_actual = $_GET['page'];
}

$inventario = new Inventario();
$consulta = $inventario->get_all_inventario($pagina_actual);
$datos = $consulta[0];
$pagina = $consulta[2];
$total_paginas = $consulta[3];

if ($pagina_actual > $total_paginas) {
    header('Location: inventario.php?page=1');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../recursos/css/styleEli.css">
    <title>Inventario</title>
</head>

<body>
    <header>
        <a href="../vistas/Fallucapp.php">
            <div class="claseLogo">
                <img src="../recursos/imagenes/logo.png" alt="">
            </div>


        </a>
        <nav>
            <h1 id="h1Dis" name="h1Dis">Fallucapp</h1>
            <!--  a href="" style="color: azure;">Regresar</a>-->

        </nav>
    </header>

    <h2>Inventario</h2>

    <section id="listaInventario">
        <?php if ($_GET['alerta'] == 1) { ?>
            <div class="alerta ">
                <p>Dispositivo Agregado</p>
            </div>

        <?php } ?>

        <?php if ($_GET['alerta'] == 2) { ?>
            <div class="alerta ">
                <p>Dispositivo Actualizado</p>
            </div>

        <?php } ?>
        <?php if ($_GET['alerta'] == 3) { ?>
            <div class="alerta ">
                <p>Dispositivo Eliminado</p>
            </div>

        <?php } ?>
        <?php foreach ($datos as $dato) : ?>
            <ul>
                <li><a href="dispositivos.php?id=<?= $dato['idTipoDisp']; ?>"><?= $dato['tipo']; ?></a></li>
            </ul>
            <p>Cantidad: <?= $dato['cantidad']; ?></p>
            <br>
        <?php endforeach; ?>

        <?php
        if ($total_paginas != 1) {
            for ($i = 1; $i <= $total_paginas; $i++) :
        ?>
                <button><a href="inventario.php?page=<?= $i ?>"><?= $i ?></a></button>
        <?php
            endfor;
        }
        ?>
    </section>

</body>

</html>