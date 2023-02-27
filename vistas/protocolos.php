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
    <header>
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
            <label for="file-input">
                <img src="../recursos/imagenes/subirA.jpg" > <h4>Subir archivo</h4> </img>
            </label>
            <input id="file-input" type="file" style="display: none;">
    </div>


        <div id="botonEliminar" name="botonEliminar">
            <button type="button" id="botonEliminar" name="botonEliminar">
                <img src="../recursos/imagenes/eliminarA.jpg"> <h4>Eliminar archivo</h4> </img>
            </button>
        </div>

        <div class="estiloCaja">
            <div id="lista" name="lista">
            <ol>
                <li>Protocolo tipo a</li>
                <li>Protocolo tipo b</li>
                <li>Protocolo tipo c</li>
            </ol>
        </div>
        </div>
</body>
</html>