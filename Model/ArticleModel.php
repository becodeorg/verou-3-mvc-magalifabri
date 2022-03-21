<?php

declare(strict_types=1);

class ArticleModel
{
    private DatabaseManager $databaseManager;

    public function __construct()
    {
        require 'config_localhost.php';

        $this->databaseManager = new DatabaseManager(
            $config['scheme'],
            $config['host'],
            $config['port'],
            $config['user'],
            $config['pass'],
            $config['dbname']
        );

        $this->databaseManager->connect();
    }

    public function getArticles()
    {
        $dbConn = $this->databaseManager->connection;

        $query =
            'SELECT
                ar.id,
                ar.author_id,
                ar.title,
                ar.description,
                ar.publish_date,
                au.name
            FROM articles ar
            LEFT JOIN authors au
                ON au.id = ar.author_id';
        $stmt = $dbConn->prepare($query);
        $stmt->execute();
        $rawArticles = $stmt->fetchAll();

        // convert returned rows to classes
        $articles = [];
        foreach ($rawArticles as $rawArticle) {
            $articles[] = new Article(
                $rawArticle['id'],
                $rawArticle['author_id'],
                $rawArticle['title'],
                $rawArticle['description'],
                $rawArticle['publish_date'],
                $rawArticle['name']
            );
        }

        return $articles;
    }

    public function getArticleDetails($id)
    {
        $dbConn = $this->databaseManager->connection;

        // get article from db
        $query =
            'SELECT
                ar.id,
                ar.author_id,
                ar.title,
                ar.description,
                ar.publish_date,
                au.name
            FROM articles ar
            LEFT JOIN authors au
                ON au.id = ar.author_id
            WHERE ar.id = :id';
        $stmt = $dbConn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $rawArticle = $stmt->fetch();

        // convert returned row to class
        $article = new Article(
            $rawArticle['id'],
            $rawArticle['author_id'],
            $rawArticle['title'],
            $rawArticle['description'],
            $rawArticle['publish_date'],
            $rawArticle['name']
        );

        return $article;
    }

    public function getNextArticleId($id)
    {
        $dbConn = $this->databaseManager->connection;

        $query = 'SELECT id
            FROM articles
            WHERE id = (
                SELECT min(id)
                FROM articles
                WHERE id > :id
            )';
        $stmt = $dbConn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $rawArticle = $stmt->fetch();

        return $rawArticle['id'] ?? 0;
    }

    public function getPreviousArticleId($id)
    {
        $dbConn = $this->databaseManager->connection;

        $query = 'SELECT id
            FROM articles
            WHERE id = (
                SELECT max(id)
                FROM articles
                WHERE id < :id
            )';
        $stmt = $dbConn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $rawArticle = $stmt->fetch();

        return $rawArticle['id'] ?? 0;
    }
}
