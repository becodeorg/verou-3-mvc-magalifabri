<?php require 'View/includes/header.php' ?>

<section>
    <h1><?= ucwords($authorInfo['name']) ?></h1>

    <p>Articles by this author:</p>
    <ul>
        <?php foreach ($articleTitles as $title) : ?>
            <li><?= ucwords($title['title']) ?></li>
        <?php endforeach ?>
    </ul>
</section>

<?php require 'View/includes/footer.php' ?>