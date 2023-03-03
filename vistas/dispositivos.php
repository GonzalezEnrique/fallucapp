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
    <h2 >Dispositivos</h2>
   
    
    
        <div id="btnAgregarDispositivos" name="btnAgregarDispositivos">
           <a href="../vistas/registrarDispositivo.php"><button><img src="../recursos/imagenes/agregar.png" alt=""></button></a> 
        </div>
        <div id="cajaBuscar" name="cajaBuscar" >
            <input type="text" placeholder="Buscar">
        </div>
        <div id="btnBuscarDispositivos" name="btnBuscarDispositivos">
            <button><img src="../recursos/imagenes/buscar.png" alt=""></button>
        </div>
       

 
   <section id="listaDispositivos" name="listaDispositivos">
       <ul id="lNombre"><li>Nombre(Tipo-Ubicación)</li></ul>
      <a href="../vistas/protocolos.php"> <ul>Switch</ul></a>
       <ul id="lDescripcion">Descripción Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa ex ut odio voluptates deleniti. Aliquid inventore aut cum vero minima facere recusandae suscipit eveniet iste, fugiat illum explicabo veritatis sapiente?</ul>
       <div id="btnCajaBotones">
            <button type="submit" class="btnLista">Editar</button>
            <button type="submit" class="btn2Lista">Eliminar</button>
       </div>

   </section>

</div>
</body>
</html>