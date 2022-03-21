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
        $articles = $this->articleModel->getArticles();

        require 'View/articles/index.php';
    }

    public function show()
    {
        $article = $this->articleModel->getArticleDetails($_GET['article-id']);
        $next = $this->articleModel->getNextArticleId($_GET['article-id']);
        $previous = $this->articleModel->getPreviousArticleId($_GET['article-id']);

        require 'View/articles/show.php';
    }
}
