<?php

Class Application{
    public static function process()
    {
        $controllerName = "Article";
        $task = "index";
            if(!empty($_GET['controller'])) {

                // uppercase premiere lettre => $controllerName // Passe la premiere lettre du nom du controlleur en majuscule pour aller le chercher correctement
                $controllerName = ucfirst($_GET['controller']);
            }

            if(!empty($_GET['task'])){
                $task = $_GET['task'];
            }


        $controllerName = "\Controllers\\" . $controllerName;

        $controller = new $controllerName();
        $controller->$task();
    }
}