<head>
    <title>New article form</title>
    <link href="/ressources/css/styleform.css" rel="stylesheet">
</head>
<body>
<div class="main-block">
    <form action="?action=blogpostcreate" method="POST">
        <h1>Créer un nouveau article</h1>
            <input class="title" type="text" name="title" placeholder="Titre de l'article">
            <input type="text" name="content" placeholder="Contenu">
            <input type="date" name="publishdate" value="2023-01-07" placeholder="Date de publication">
            <input type="date" name="lastdate" value="2024-01-07" placeholder="Disponible jusqu'à">
            <input type="number" name="importdegree" placeholder="Rating">
            <input type="number" name="autors_id" placeholder="ID de l'auteur">
            <button type="submit" href="/">Submit</button>
</div>
    </form>
</div>
</body>
