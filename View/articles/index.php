<?php require 'View/includes/header.php' ?>

<?php // Use any data loaded in the controller here 
?>

<section>
    <h1>Articles</h1>
    <ul>
        <?php foreach ($articles as $article) : ?>
            <li><a href="?page=articles-details&article-id=<?= $article->id ?>"><?= ucwords($article->title) ?></a> (<?= $article->formatPublishDate() ?>)</li>
        <?php endforeach; ?>
    </ul>
</section>

<?php require 'View/includes/footer.php' ?>