<head>
    <title>Modification de l'article</title>
    <link href="/ressources/css/styleform.css" rel="stylesheet">
</head>
<body>
<div class="main-block">
    <form action="?action=blogpostupdate&id=<?= $numArticle ?>" method="POST">
        <h1>Modifier l'article</h1>
        <label for="title">Titre de l'article
            <input class="title" value="<?= $article["title"] ?>" type="text" id="title" name="title">
        </label>
        <label for="contenu">Contenu
            <input type="text" id="contenu" name="content" value="<?= $article["content"] ?>">
        </label>
        <label for="datedebut">Date de publication
            <input type="text" name="publishdate" id="datedebut" value="<?= $article["publishdate"] ?>">
        </label>
        <label for="lastdate">Disponible jusqu'à
            <input type="text" name="lastdate" id="lastdate" value="<?= $article["lastdate"] ?>">
        </label>
        <label for="importdegree">Rating
            <input type="text" name="importdegree" id="importdegree" value="<?= $article["importdegree"] ?>">
        </label>
        <label for="autor_id">ID de l'auteur
            <input type="text" name="autors_id" id="autors_id" value="<?= $article["autors_id"] ?>">
        </label>
        <button type="submit" href="/">Submit</button>
</form>
</div>
</body>