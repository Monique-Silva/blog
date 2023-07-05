<div>
    <h1>Bienvenue au monde du sport</h1>
</div>
<div>
<?php if(count($lastArticles) === 0):
    echo "<h2>Sorry, pas de nouveaux articles</h2>";
    else:
    foreach ($lastArticles as $article): ?>
        <a href = "?action=blogpost&id=<?= $article["id"] ?>"> <!--target="_blank" -->
        <h2>
        <?php echo $article["title"] ?>
        </h2>
        </a>
        <h3>
        <?php echo $article["pseudoname"] ?>
        </h3>
    <?php endforeach;
endif; ?>
</div>