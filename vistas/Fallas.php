<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../recursos/css/hojaEstiloAndy.css">
    <title>Fallas</title>
</head>
<body>
    <header>
    <a href="../vistas/Fallucapp.php">
            <div class="logo"> 
                <img id="prinicpal" name="prinicpal" src= "../recursos/imagenes/logo.png" width="90">
            </div>
        </a>
        
 <h1>Fallucapp</h1> 
        
    </header>   
  
   
        <div id="botonagregar" name="botonagregar">
   <button><a href=" ../vistas/registrarFalla.php"> <img src="../recursos/imagenes/agregar.png "> </a></button> 
   </div>

        <div id="cajaBuscar" name="cajaBuscar">
        <input type="text" name="txnombre" id="txnombre">

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
    
       <div id="btnCajaBotones">
            <button type="submit" class="btnLista">Editar</button>
            <button type="submit" class="btnLista">Eliminar</button>
       </div>
   </section>
   </div>
</body>
</html>