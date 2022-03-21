<?php require 'View/includes/header.php' ?>

<?php // Use any data loaded in the controller here 
?>

<section>
    <h1><?= ucwords($article->title) ?></h1>
    <p><?= $article->formatPublishDate() ?></p>
    <p><?= $article->description ?></p>
    <p>Written by
        <a href="?page=author&author-id=<?= $article->authorId ?>">
            <?= $article->authorName ?>
        </a>
    </p>

    <?php if ($previous) : ?>
        <a href="?page=articles-details&article-id=<?= $previous ?>"">Previous article</a>
    <?php endif ?>
    <?php if ($next) : ?>
        <a href=" ?page=articles-details&article-id=<?= $next ?>"">Next article</a>
    <?php endif ?>
</section>

<?php require 'View/includes/footer.php' ?>