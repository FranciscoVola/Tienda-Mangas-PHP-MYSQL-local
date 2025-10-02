<?php
spl_autoload_register(function ($class) {
    $paths = [__DIR__ . '/../models/', __DIR__ . '/']; // ACA BUSCA EN MODELS Y EN CONFIG/
    
    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
    
    die("Error: No se pudo cargar la clase $class.");
});
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
