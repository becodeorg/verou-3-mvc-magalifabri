<?php

declare(strict_types=1);

class ArticleController
{
    public function index()
    {
        // Load all required data
        $articles = $this->getArticles();

        // Load the view
        require 'View/articles/index.php';
    }

    // Note: this function can also be used in a repository - the choice is yours
    private function getArticles()
    {
        // prepare the database connection
        // Note: you might want to use a re-usable databaseManager class - the choice is yours
        $connection = new PDO(
            "mysql:
                host=localhost;
                port=80;
                dbname=verou",
            'root',
            'root'
        );

        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


        // fetch all articles as $rawArticles (as a simple array)
        $rawArticles = [];

        $query = 'SELECT *
            FROM articles';
        $stmt = $connection->prepare($query);
        $stmt->execute();
        $rawArticles = $stmt->fetchAll();


        $articles = [];
        foreach ($rawArticles as $rawArticle) {
            $articles[] = new Article(
                $rawArticle['id'],
                $rawArticle['title'],
                $rawArticle['description'],
                $rawArticle['publish_date']
            );
        }

        return $articles;
    }

    public function show()
    {
        // Load all required data
        $article = $this->getArticleDetails($_GET['article-id']);

        // Load the view
        require 'View/articles/show.php';
    }

    private function getArticleDetails($id)
    {
        // db connection
        $connection = new PDO(
            "mysql:
                host=localhost;
                port=80;
                dbname=verou",
            'root',
            'root'
        );

        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        // get article from db
        $query = 'SELECT *
            FROM articles
            WHERE id = :id';
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $rawArticle = $stmt->fetch();

        // convert returned row to class
        $article = new Article($rawArticle['id'], $rawArticle['title'], $rawArticle['description'], $rawArticle['publish_date']);

        return $article;
    }
}
