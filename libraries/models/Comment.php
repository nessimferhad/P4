<?php
namespace Models;

// Ce fichier contient la class user qui extend et recupere les propriétés de la class Model 
// Protected table fait réference a la table de la bdd avec laquelle on travaille

class Comment extends Model
{
    // renvoie la table de la bdd a utiliser pour la requete SQL
    protected $table = 'comments';

    //renvoie la liste de TOUS les commentaires dans un array
    public function findAllWithArticle(int $article_id): array
    {

        $query = $this->pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
        $query->execute(['article_id' => $article_id]);
        $commentaires = $query->fetchAll();
        return $commentaires;
    }

    public function deleteAllWithArticle(int $article_id): void
    {
        $query = $this->pdo->prepare("DELETE FROM comments WHERE article_id = :article_id");
        $query->execute(['article_id' => $article_id]);
    }

    
    //insert un commentaire 
    public function insert(string $author, string $content, int $article_id, int $report): void
    {
        $query = $this->pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW(), report = :report');
        $query->execute(compact('author', 'content', 'article_id', 'report'));
    }
    public function report(int $id): void
    { 
        $query = $this->pdo->prepare('UPDATE `comments` SET `report`= report +1 WHERE `id` = :id');
        $query->execute(compact('id'));
    }
}
