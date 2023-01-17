<?php



spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require $class . ".php";
});


require_once "../utils/functions.php";
require_once "../routes/route.php";
require_once "../routes/app.php";