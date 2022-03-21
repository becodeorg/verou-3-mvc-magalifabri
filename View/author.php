<?php require 'View/includes/header.php' ?>

<section>
    <h1><?= ucwords($authorInfo['name']) ?></h1>

    <p>Articles by this author:</p>
    <ul>
        <?php foreach ($articlesInfo as $article) : ?>
            <li>
                <a href="?page=articles-details&article-id=<?= $article['id'] ?>">
                    <?= ucwords($article['title']) ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
</section>

<?php require 'View/includes/footer.php' ?>