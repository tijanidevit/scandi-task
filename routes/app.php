<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


if (array_key_exists($uri, $routes)) {
    $controller = new $routes[$uri][0];
    $method = $routes[$uri][1];
    echo call_user_func([$controller, $method] );
}
else{
    echo response([
        "success" => false,
        "message" => 'Route not found',
    ], 404);
}