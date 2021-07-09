<?php

//$pdo = require_once './data/database/database.php';

class ArticleDB
{
    private PDOStatement $statementCreateOne;
    private PDOStatement $statementUpdateOne;
    private PDOStatement $statementReadOne;
    private PDOStatement $statementReadAll;
    private PDOStatement $statementDeleteOne;

    function __construct(private PDO $pdo)
    {
        $this->statementCreateOne = $pdo->prepare('
            INSERT INTO article (
                title,
                category,
                content,
                image,
                author
            ) VALUES (
                :title,
                :category,
                :content,
                :image,
                :author
            )
        ');

        $this->statementUpdateOne = $pdo->prepare('
            UPDATE article 
            SET    
                title=:title,
                category=:category,
                content=:content,
                image=:image,
                author=:author
            WHERE id=:id   
        ');

        $this->statementReadOne = $pdo->prepare('SELECT * FROM article WHERE id=:id');

        $this->statementReadAll = $pdo->prepare('SELECT * FROM article');

        $this->statementDeleteOne = $pdo->prepare('DELETE FROM article WHERE id=:id');
    }

    public function fetchAll()
    {
        $this->statementReadAll->execute();
        return $this->statementReadAll->fetchAll();
    }

    public function fetchOne(int $id)
    {
        $this->statementReadOne->bindValue(':id', $id);
        $this->statementReadOne->execute();
        return $this->statementReadOne->fetch();
    }

    public function createOne($article)
    {
        $this->statementCreateOne->bindValue(':title', $article['title']);
        $this->statementCreateOne->bindValue(':image', $article['image']);
        $this->statementCreateOne->bindValue(':category', $article['category']);
        $this->statementCreateOne->bindValue(':content', $article['content']);
        $this->statementCreateOne->bindValue(':author', $article['author']);
        $this->statementCreateOne->execute();
        return $this->fetchOne($this->pdo->lastInsertId());
    }

    public function updateOne($article)
    {
        $this->statementUpdateOne->bindValue(':title', $article['title']);
        $this->statementUpdateOne->bindValue(':image', $article['image']);
        $this->statementUpdateOne->bindValue(':category', $article['category']);
        $this->statementUpdateOne->bindValue(':content', $article['content']);
        $this->statementCreateOne->bindValue(':author', $article['author']);
        $this->statementUpdateOne->bindValue(':id', $article['id']);
        $this->statementUpdateOne->execute();
        return $article;
    }

    public function deleteOne(int $id)
    {
        $this->statementDeleteOne->bindValue(':id', $id);
        $this->statementDeleteOne->execute();
        return $id;
    }
}

return new ArticleDB($pdo);
