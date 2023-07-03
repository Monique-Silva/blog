//var_dump(getLastBlogPosts($db));

<div class="header">
    <h1>Bienvenue au monde du sport</h1>
</div>

<div class="row">
    <div class="leftcolumn">
        <div class="card">
            <?php if(getLastBlogPosts($db) === null):
            echo "<h2>Sorry, pas de nouveaux articles</h2>";
            else:
                foreach ($lastArticles as $article):
                    echo "<h2>$article[title] <h2>" . "\n";
                    echo "<h3>$article[pseudoname]<h3>" . "\n";
                    endforeach;
            endif;
            ?>
        </div>