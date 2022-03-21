<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'classes/Article.php';
require 'classes/DatabaseManager.php';

require 'Model/ArticleModel.php';
require 'Model/AuthorModel.php';

require 'Controller/HomepageController.php';
require 'Controller/ArticleController.php';
require 'Controller/AuthorController.php';

$page = $_GET['page'] ?? null;

switch ($page) {
    case 'articles':
        (new ArticleController())->index();
        break;

    case 'articles-details':
        (new ArticleController())->show();
        break;

    case 'author':
        (new AuthorController())->index();
        break;

    case 'home':
    default:
        (new HomepageController())->index();
        break;
}
