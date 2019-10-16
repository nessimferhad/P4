<?php

namespace Models;


class Article extends Model
{
    protected $table = 'articles';

    
    public function insertArticle(string $author, string $content, int $article_id): void
    {
        $query = $this->pdo->prepare('INSERT INTO articles SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');
        $query->execute(compact('author', 'content', 'article_id'));
    }
}
