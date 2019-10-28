<?php

// CE FICHIER CONTIENT TOUTES LES FONCTIONS "ACTION" LIE AUX USERS


namespace Controllers;


require_once('libraries/autoload.php');

class User extends Controller
{
   protected $modelName = \Models\User::class;

   function getUser(){

    $user = $this->model->findUser("WHERE `id` = 1");

    //$password = password_verify($_POST['adminaccess'], $user['password']);

    \Renderer::render('articles/connection', compact('user'));
   }

   function disconnect(){

      session_destroy();

      \Http::redirect("index.php");
    }
   }
