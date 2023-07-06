<div>
    <a href="/index.php?action=blogpostupdate&id=<?= $numArticle ?>">Modifier</a>
    <a href="/index.php?action=blogpostdelete&id=<?= $numArticle ?>">Suprimer</a>
    <h2>
        <?php echo $article["title"] ?>
    </h2>
    <p>
        <?= $article["content"] ?>
    </p>
    <h3>
        <?php echo $article["pseudoname"] ?>
    </h3>
    <?php foreach ($comments as $comment): ?>
    <p><?= $comment["comment"] ?> Par <?= $comment["pseudoname"] ?></p>
    <?php endforeach; ?>
</div>