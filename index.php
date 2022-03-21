<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'Model/Article.php';

require 'Controller/HomepageController.php';
require 'Controller/ArticleController.php';

$page = $_GET['page'] ?? null;

switch ($page) {
    case 'articles':
        (new ArticleController())->index();
        break;

    case 'articles-show':
        // TODO: detail page

    case 'home':
    default:
        (new HomepageController())->index();
        break;
}
