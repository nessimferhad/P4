<?php

// Fichier qui va s'occuper de charger les controlleurs ainsi que les actions a effectuer 

Class Application{
    public static function process()
    {
        $controllerName = "Article"; // nom du controller
        $task = "index"; // nom de la tache a effectuer
            if(!empty($_GET['controller'])) {

                // uppercase premiere lettre => $controllerName // Passe la premiere lettre du nom du controlleur en majuscule pour aller le chercher correctement dans le dossier controlleurs
                $controllerName = ucfirst($_GET['controller']);
            }

            if(!empty($_GET['task'])){
                $task = $_GET['task'];
            }


        $controllerName = "\Controllers\\" . $controllerName; // va chercher le controlleur dans le dossier Controllers

        $controller = new $controllerName(); //insencie le controlleur que l'on utilise 
        $controller->$task(); // execute la tache donnée dans le controlleur
    }
}