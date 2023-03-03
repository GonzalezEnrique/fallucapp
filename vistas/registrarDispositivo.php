<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../recursos/css/style.css">
    <link rel="shortcut icon" href="../recursos/imagenes/logo.png" type="image/x-icon">
    
    <title>Registrar dispositivo</title>
</head>
<body>
    <div class="contenedor">
    <header>
        <a href="../vistas/Fallucapp.php">
            
                <img class="lo" src="../recursos/imagenes/logo.png">
            
        </a>
        <h1>Fallucapp</h2>
    </header>

    <section class="form-register">
        <form class="form">
            <h2>Registrar dispositivo</h2>
            <div class="form_container">
                <div class="fg">
                    <label class="form_label" for="nombre">Nombre:</label>
                    <input class="controls" type="text" name="nombre" id="nombre" placeholder="Nombre del dispositivo">
                </div>
                <div class="fg">  
                    <label class="form_label" for="tipo">Tipo:</label>
                    <input class="controls" type="text" name="tipo" id="tipo" placeholder="Tipo de dispositivo">
                </div> 
                <div class="fg">   
                    <label class="form_label" for="ubicacion">Ubicación:</label>
                    <input class="controls" type="text" name="ubicacion" id="ubicacion" placeholder="Ubicación del dispositivo">
                </div>
                <div class="fg">   
                    <label class="form_label" for="descripcion">Descripción:</label>
                    <textarea class="controls" name="descripcion" id="descripcion" placeholder="Descripción"></textarea>
                </div>
                <div class="fg">   
                    <label class="form_label" for="configuracion">Configuración:</label>
                    <input class="controls" type="text" name="configuracion" id="configuracion" placeholder="Configuración">
                </div>
            </div>
            <input class="btnA" type="submit" value="Agregar">
            <input class="btnC" type="submit" value="Cancelar">
        </form>
        
    </section>
</div>
</body>
</html>