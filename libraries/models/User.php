<?php

namespace Models;


// Ce fichier contient la class user qui extend et recupere les propriétés de la class Model 
// Protected table fait réference a la table de la bdd avec laquelle on travaille

class User extends Model{

    protected $table = 'users';

    public function findUser(): array
    {
        $sql = "SELECT * FROM {$this->table} WHERE `id` = 1";
        //retourne la liste des articles dans un array
        $resultats = $this->pdo->query($sql);
        // On fouille le résultat pour en extraire les données réelles
        $user = $resultats->fetch();
        return $user;
    }

}