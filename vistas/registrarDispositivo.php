<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../recursos/css/style.css">
    
    <title>Registrar dispositivo</title>
</head>
<body>
    <header>
        <h1>Registrar Dispositivo</h2>
    </header>

    <section class="form-register">
        <form action="">
            <table>
            <tr>
                <td>
                    <label for="nombre">Nombre:</label>
                </td>
                <td>
                    <input class="controls" type="text" name="nombre" id="nombre" placeholder="Nombre del dispositivo">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="tipo">Tipo:</label>
                </td>
                <td>
                    <input class="controls" type="text" name="tipo" id="tipo" placeholder="Tipo de dispositivo">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="ubicacion">Ubicación:</label>
                </td>
                <td>
                    <input class="controls" type="text" name="ubicacion" id="ubicacion" placeholder="Ubicación del dispositivo">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="descripcion">Descripción:</label>
                </td>
                <td>
                    <textarea class="controls" name="descripcion" id="descripcion" placeholder="Descripción"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="configuracion">Configuración:</label>
                </td>
                <td>
                    <input class="controls" type="text" name="configuracion" id="configuracion" placeholder="Configuración">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="botons" type="submit" value="Agregar">
                </td>
            </tr>
        </table>
        </form>
        
    </section>
</body>
</html>