<?php

namespace Models;

// Ce fichier contient la class user qui extend et recupere les propriétés de la class Model 
// Protected table fait réference a la table de la bdd avec laquelle on travaille

class Article extends Model
{
    protected $table = 'articles';


    public function insertArticle(string $title, string $introduction, string $content): void
    {
        $query = $this->pdo->prepare('INSERT INTO articles SET title = :title, introduction = :introduction, content = :content, created_at = NOW()');
        $query->execute(compact('title', 'introduction', 'content', 'created_at'));
    }


    public function updateArticle(string $title, string $introduction, string $content, int $id): void
    {
        $query = $this->pdo->prepare('UPDATE articles SET title = :title, introduction = :introduction, content = :content WHERE `id` = :id');
        $query->execute(compact('title', 'introduction', 'content', 'id'));
    }
}
