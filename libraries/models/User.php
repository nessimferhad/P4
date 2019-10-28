<?php

namespace Models;


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