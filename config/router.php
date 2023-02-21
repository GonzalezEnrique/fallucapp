<?php



$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
echo $uri;

$routes = [
    '/' => 'vistas/fallucap.php',
    '/fallas' => 'vistas/Fallas.php',
    '/fallucapp/registrar-falla' => 'vistas/registrarFalla.php',
    '/fallucapp/protocolos' => '../vistas/protocolos.php',
    '/dispositivos' => 'vistas/dispositivos.php',
    '/fallucapp/registrar-dispositvo' => '../vistas/registrarDispositivo.php'
];

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    //http_response_code(404);
    //require 'views/404.php';
    //die();
}