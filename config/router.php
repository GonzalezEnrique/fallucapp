<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => '../vistas/fallucap.php',
    '/fallas' => '../vistas/fallas.php',
    '/registrar-falla' => '../vistas/registrarFalla.php',
    '/protocolos' => '../vistas/protocolos.php',
    '/dispositivos' => '../vistas/dispositivos.php',
    '/registrar-dispositvo' => '../vistas/registrarDispositivo.php'
];

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    http_response_code(404);

    //require 'views/404.php';

    die();
}