<?php

require_once "config/config.php";
echo URL_ROOT;

spl_autoload_register(
    function ($class) {
        $class = str_replace('\\', '/', $class);
        $file = __DIR__ . '/libs/' . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }
);




echo "<br/>Bootstrapping the framework libraries";