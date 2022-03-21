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
        $articleTitles = $this->authorModel->getArticleTitles($_GET['author-id']);

        require 'View/author.php';
    }
}
