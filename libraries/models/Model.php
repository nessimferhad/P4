<?php

// CE FICHIER CONTENT TOUTES LES FONCTIONS UTILISEES PAR LES DIFFERENTS MODELS 
// Protected pdo fait appel a la fonction pdo dans le fichier database pour permettre la connextion a la BDD
// Protected table fait reference aux tables qui vont etre utilisées pour travailler avec

namespace Models;

abstract class Model
{

    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = \Database::getPdo();
    }
    // revoie tout le contenu de la table donnée
    public function findAll(?string $order = ""): array
    {
        $sql = "SELECT * FROM {$this->table}";
        if ($order) {
            $sql .= " ORDER BY " . $order;
        }
        //retourne la liste des articles dans un array
        $resultats = $this->pdo->query($sql);
        // On fouille le résultat pour en extraire les données réelles
        $articles = $resultats->fetchAll();

        return $articles;
    }

    public function findReported(): array
    {
        $sql = "SELECT * FROM {$this->table} WHERE `report` > 5";
        //retourne la liste des articles dans un array
        $resultats = $this->pdo->query($sql);
        // On fouille le résultat pour en extraire les données réelles
        $reportedcomments = $resultats->fetchAll();

        return $reportedcomments;
    }
    

        // renvoie un contenu en particulier selon la table donnée
    public function find(int $id)
    {

        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");

        // On exécute la requête en précisant le paramètre :article_id 
        $query->execute(['id' => $id]);

        // On fouille le résultat pour en extraire les données réelles de l'article
        $item = $query->fetch();

        return $item;
    }
    // supprime quelque chose selon la table donnée
    public function delete(int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
    }
}

