<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar falla</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" href="../recusos/imagenes/logo.png" type="image/x-icon">
</head>

<header>
    <a href="../vistas/Fallucapp.php">
        <div class="logo">
            <img src="imagenes/logo.png" width="90"> </img>
        </div>
    </a>

    <h1>Fallucapp</h1>
</header>

<body>

     
    <section id="form-register" name="form-register">
        <form class="form">
            <h2>Registrar falla</h2>
            <div class="form_container">

                
                <div class="fg">
                    <label class="form_label" >Código</label>
                    <input class="controls" type="text" name="codigo" id="codigo">
                </div>
    
                <div class="fg">
                    <label class="form_label">Nombre</label>
                        <select class="controls" name="nombre" id="nombre">
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                </div>
    
                <div class="fg">
                    <label class="form_label" >Ubicación</label>
                    <input class="controls" type="text" name="ubicacion">
                </div>
    
                <div class="fg">
                    <label class="form_label" >Descripción</label>
                    <textarea class="controls" name="descripcion"></textarea>
                </div>
    
                <div class="fg">
                    <label class="form_label" >Dispositivo</label>
                    <select class="controls" name="dispositivo" id="dispositivo">
                        <option></option>
                        <option>Router</option>
                        <option>Switch</option>
                      </select>
    
                </div>
                <input class="botons" type="submit" value="Registrar">

            </div>

            

        </form>

                
    </section>
    
</body>


</html>