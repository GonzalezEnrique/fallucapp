<?php



$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'vistas/fallucap.php',
    '/fallas' => 'vistas/Fallas.php',
    '/registrar-falla' => 'vistas/registrarFalla.php',
    '/protocolos' => 'vistas/protocolos.php',
    '/dispositivos' => 'vistas/dispositivos.php',
    '/registrar-dispositivo' => 'vistas/registrarDispositivo.php'
];

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    http_response_code(404);
    require 'vistas/error404.php';
    die();
}