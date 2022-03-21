<?php

declare(strict_types=1);

class AuthorController
{
    private AuthorModel $authorModel;

    public function __construct()
    {
        $this->authorModel = new AuthorModel();
    }

    public function index()
    {
        $authorInfo = $this->authorModel->getAuthorInfo($_GET['author-id']);
        $articlesInfo = $this->authorModel->getArticlesInfo($_GET['author-id']);

        require 'View/author.php';
    }
}
