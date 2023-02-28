<?php

include '../clases/Inventario.php';

$inventario = new Inventario();
$consulta = $inventario->get_all_inventario();
$datos = $consulta[0];

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
            <h1 id="h3Dis" name="h3Dis">Fallucapp</h1>
         <!--  a href="" style="color: azure;">Regresar</a>--> 
    
        </nav>
    </header>   

    <h2 >Inventario</h2>

    <section id="listaInventario">
        <a href="">
            <ul>
                <li>Tipo</li>
            </ul>
        </a>
        <ul>Cantidad</ul>
        <?php foreach ($datos as $dato): ?>
            <ul>
                <li><a href="dispositivos.php"><?= $dato['tipo']; ?></a></li>
            </ul>
            <p>Cantidad: <?= $dato['cantidad']; ?></p>
        <?php endforeach; ?>
    </section>
    
</body>
</html>