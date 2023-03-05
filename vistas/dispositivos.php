<?php

include '../clases/Conexion.php';
include '../clases/Dispositivos.php';


$pagina_actual = 1;
if (isset($_GET['page'])) {
    $pagina_actual = $_GET['page'];
}

$tipoDisp = $_GET['id'];
$dispositivos = new Dispositivos();
$consulta = $dispositivos->get_all_dispositivos($pagina_actual, $tipoDisp);
$datos = $consulta[0];
$pagina = $consulta[2];
$total_paginas = $consulta[3];

if ($pagina_actual > $total_paginas) {
    header('Location: dispositivos.php?page=1');
}

if ($_SERVER['REQUEST_METHOD']=="POST"){
    $valor = $_POST["eliminar"];
    $carpetaConfig = "../recursos/archivosConfig/";
    $dispositivoEliminar = $dispositivos->getDispositivo(intval($valor));
    if ($_POST["eliminar"]){
        //var_dump($dispositivoEliminar);
        unlink($carpetaConfig . $dispositivoEliminar[0]['configuracion']);
        $dispositivos->eliminar($valor);
        header('location: /vistas/inventario.php?alerta=3');
    }
}



?>
<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="../recursos/css/styleEli.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">
    <title>Dispositivos</title>
</head>





<body>
    <div class="contenedor">
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
        <h2>Dispositivos</h2>

        <div id="btnAgregarDispositivos" name="btnAgregarDispositivos">
            <a href="../vistas/registrarDispositivo.php"><button><img src="../recursos/imagenes/agregar.png" alt=""></button></a>
        </div>

        <form method="POST">

            <div for="cajaBuscar" id="cajaBuscar" name="cajaBuscar">
                <input type="text" name="buscar" placeholder="Buscar">
            </div>
            <div id="btnBuscarDispositivos" name="btnBuscarDispositivos">
                <button type="submit"><img src="../recursos/imagenes/buscar.png" alt=""></button>
            </div>
        </form>



        <?php

        if ($_SERVER['REQUEST_METHOD'] != "POST" || !$_POST['buscar']) {

            foreach ($datos as $dato) :
        ?>
                <section id="listaDispositivos" name="listaDispositivos">
                    <ul id="lNombre">
                        <li> <?php echo $dato['nombre'] . " ("  . $dato['ubicacion'] . ")" ?></li>
                    </ul>
                    <?php
                    $ruta = "../recursos/archivosConfig/" . $dato['configuracion'];
                    if (is_file($ruta)) { ?>
                        <a href="../recursos/archivosConfig/<?php echo $dato['configuracion'] ?>">
                            <ul>Configuracion</ul>
                        </a>
                    <?php } else { ?>

                        <ul>Configuracion</ul>

                    <?php } ?>
                    <ul id="lDescripcion"><?php echo $dato['descripcion'] ?></ul>
                    <div id="btnCajaBotones">
                        <a href="editarDispositivo.php?dispositivo=<?php echo $dato['idDispositivo'] ?>">
                            <button type="submit" class="btnLista">Editar</button>
                        </a>
                       
                        <form action="" method="POST">
                            <input type="hidden" name="eliminar" value="<?php echo $dato['idDispositivo'] ?>">
                            <input type="submit" class="btn2Lista" value="Eliminar">
                        </form>
                        
                        

                    </div>

                </section>

            <?php endforeach;
        } else {
            $valor = $_POST['buscar'];
            $busqueda = $dispositivos->buscar($valor);
            //var_dump($busqueda);

            foreach ($busqueda as $dato) :
            ?>

                <section id="listaDispositivos" name="listaDispositivos">
                    <ul id="lNombre">
                        <li> <?php echo $dato['nombre'] . " ("  . $dato['ubicacion'] . ")" ?></li>
                    </ul>
                    <?php
                    $ruta = "../recursos/archivosConfig/" . $dato['configuracion'];
                    if (is_file($ruta)) { ?>
                        <a href="../recursos/archivosConfig/<?php echo $dato['configuracion'] ?>">
                            <ul>Configuracion</ul>
                        </a>
                    <?php } else { ?>

                        <ul>Configuracion</ul>

                    <?php } ?>
                    <ul id="lDescripcion"><?php echo $dato['descripcion'] ?></ul>
                    <div id="btnCajaBotones">
                    <a href="editarDispositivo.php">
                            <button type="submit" class="btnLista">Editar</button>
                        </a>
                        <form  method="POST">
                            <input type="hidden" name="eliminar" value="<?php echo $dato['idDispositivo'] ?>">
                            <input name="eliminar" type="submit" class="btn2Lista" value="Eliminar">
                        </form>
                    </div>

                </section>

        <?php endforeach;
        } ?>




    </div>
</body>

</html>