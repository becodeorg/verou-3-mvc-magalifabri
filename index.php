<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'classes/Article.php';
require 'classes/DatabaseManager.php';

require 'Model/ArticleModel.php';

require 'Controller/HomepageController.php';
require 'Controller/ArticleController.php';

$page = $_GET['page'] ?? null;

switch ($page) {
    case 'articles':
        (new ArticleController())->index();
        break;

    case 'articles-details':
        // TODO: detail page
        (new ArticleController())->show();
        break;

    case 'home':
    default:
        (new HomepageController())->index();
        break;
}
