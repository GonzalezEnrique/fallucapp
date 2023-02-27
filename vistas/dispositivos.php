<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="../recursos/css/styleEli.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispositivos</title>
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

   <div id="bloqueDispositivos" name="bloqueDispositivos">
    <h2 >Dispositivos</h2>
        <div id="btnAgregarDispositivos" name="btnAgregarDispositivos">
            <button><img src="../recursos/imagenes/agregar.png" alt=""></button>
        </div>
        <div id="cajaBuscar" name="cajaBuscar">
            <input type="text">
        </div>
        <div id="btnBuscarDispositivos" name="btnBuscarDispositivos">
            <button><img src="../recursos/imagenes/buscar.png" alt=""></button>
        </div>
       

   </div> 
   <section id="listaDispositivos" name="listaDispositivos">
       <ul id="lNombre"><li>Nombre(Tipo-Ubicación)</li></ul>
      <a href=""> <ul>Switch</ul></a>
       <ul id="lDescripcion">Descripción</ul>
       <div id="btnCajaBotones">
            <button type="submit">Editar</button>
            <button type="submit">Eliminar</button>
       </div>

   </section>


   </div>
</body>
</html>