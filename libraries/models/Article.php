<?php

namespace Models;


class Article extends Model
{
    protected $table = 'articles';

    
    public function insertArticle(string $title, string $introduction, string $content): void
    {
        $query = $this->pdo->prepare('INSERT INTO articles SET title = :title, introduction = :introduction, content = :content, created_at = NOW()');
        $query->execute(compact('title', 'introduction', 'content', 'created_at'));
    }
}
