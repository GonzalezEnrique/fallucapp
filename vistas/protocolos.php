<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protocolos</title>
    <style>
        button 
        {
           padding: 0; 
           margin: 0;
        }
    </style>
</head>
<header>
    <h1>Protocolos</h1>
</header>
<body>
    <form action="#" method="get">
        <div style="margin-left: 1260px; margin-top: 50px;">
            <label for="file-input">
                <img src="../img/subirArch.jpg" height="55px" width="55px">
            </label>
            <input id="file-input" type="file" style="display: none;">
        </div>

        <div style="margin-left: 1260px; margin-top: 50px;">
            <button type="button" id="botonEliminar" name="botonEliminar" style="border: 1cm;">
                <img src="../img/eliminarArch.jpg"
                height="55px"
                width="55px">
            </button>
        </div>
    </form>

    <div style="margin-top: -120px; margin-left: 580px;">
    <section id="tablaContenido" name="tablaContenido">
        <table id="idProtocolo" name="Protocolo" border="1">
            <tr>
                <td>
                    <p>Código</p>
                </td>
                <td>
                    <p>Nombre del protocolo</p>
                </td> 
            </tr>

            <tr>
                <td>
                    <p></p>
                </td>
                <td>
                    <p></p>
                </td>  
            </tr> 
            
        </table>
    </section>
    </div>
    
</body>
</html>