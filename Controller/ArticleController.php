<?php

declare(strict_types=1);

class ArticleController
{
    private ArticleModel $articleModel;

    public function __construct()
    {
        $this->articleModel = new ArticleModel();
    }

    public function index()
    {
        // Load all required data
        $articles = $this->articleModel->getArticles();

        // Load the view
        require 'View/articles/index.php';
    }

    public function show()
    {
        // Load all required data
        $article = $this->articleModel->getArticleDetails($_GET['article-id']);
        $next = $this->articleModel->getNextArticleId($_GET['article-id']);
        $previous = $this->articleModel->getPreviousArticleId($_GET['article-id']);

        // Load the view
        require 'View/articles/show.php';
    }
}
