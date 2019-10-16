<?php

namespace Controllers;

abstract class Controller
{
    protected $model;
    protected $modelName;

    public function __construct()
    {
        //1. Initiation de l'objet qu'on va chercher dans le namespace Models
        $this->model = new $this->modelName();
    }
}
