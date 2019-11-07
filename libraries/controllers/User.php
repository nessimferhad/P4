<?php

// CE FICHIER CONTIENT TOUTES LES FONCTIONS "ACTION" LIE AUX USERS
// Protected ModelName fait appel au model avec lequel on interagit


namespace Controllers;




class User extends Controller
{
   protected $modelName = \Models\User::class;

   function logIn(){

    $user = $this->model->findUser("WHERE `id` = 1");


    \Renderer::render('articles/connection', compact('user')); // compile et envoie la variable user dans la page connection
   }

   function disconnect(){

      session_destroy();

      \Http::redirect("index.php"); // redirection vers l'index
    }
   }
