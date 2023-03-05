<?php

include '../clases/Conexion.php';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../recursos/css/hojaEstiloAndy.css">
    <link rel="shortcut icon" href="../recursos/imagenes/logo.png" type="image/x-icon">
    <title>Falla</title>
</head>
<header>
<a href="../vistas/Fallucapp.php">
            <div class="logo"> 
                <img id="prinicpal" name="prinicpal" src= "../recursos/imagenes/logo.png" width="90">
            </div>
        </a>

            <h1>Fallucapp</h1> 



        </header>
        <h2>FALLAS</h2>


     
            <div id="botonagregar" name="botonagregar">
            <button><a href=" ../vistas/registrarFalla.php"> <img src="../recursos/imagenes/agregar.png "> </a></button> 
   </div>
            <div for="cajaTexto" id="cajaTexto" name="cajaTexto">
                <input type="text" name="buscar" placeholder="Buscar">
            </div>
            <div id="botonbuscar" name="botonbuscar">
            <button><img src="../recursos/imagenes/buscar.png" alt=""></button>
        </div>

                <section id="lista" name="lista">
                        <nav>
        <ul class="">
            <li>id</li>
            <li>codigo</li>
            <li>tipo</li>
            <li>descripcion</li>
            <li>ubicacion</li>
            <li>dispositivos</li>
        </ul>
    </nav>
  
                    <div id="Botones">
                        <button type="submit" class="BotonEditar">Editar</button>
                        <button type="submit" class="BotonEliminar">Eliminar</button>
                    </div>

                </section>

       
 
</body>

</html>