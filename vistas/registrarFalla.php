<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar falla</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<header>
    <a href="../index.html">
        <div class="logo">
            <img src="img/logo.png" width="80"> </img>
        </div>
    </a>

    <h1>Fallucapp</h1>
</header>

<body>
    <h2>Registrar falla</h2>
     
    <section id="formulario" name="formulario">
        <table id="form">
            <tr>
                <td>Código</td>
                <td><input type="text" name="codigo" id="codigo"></td>
            </tr>

            <tr>
                <td>Nombre</td>
                <td>
                    <select name="nombre" id="nombre">
                        <option value="">Seleccionar</option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                </td>
            </tr>

            <tr>
                <td>Ubicación</td>
                <td><input type="text" name="ubicacion"></td>
            </tr>

            <tr>
                <td>Descripción</td>
                <td> <textarea name="descripcion"></textarea></td>
            </tr>

            <tr>
                <td>Dispositivo</td>
                <td>
                    <select name="dispositivo" id="dispositivo">
                        <option>Seleccionar</option>
                        <option>Router</option>
                        <option>Switch</option>
                      </select>
                </td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" value="Registrar"></td>
            </tr>
        </table>
    </section>
    
</body>


</html>