<?php

// Autoloader qui va charger les classes necessaires 

spl_autoload_register(function ($className) {
    $className = str_replace("\\", "/", $className);

    require_once("libraries/$className.php");
});
