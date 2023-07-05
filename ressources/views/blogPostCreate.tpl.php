!DOCTYPE html>
<html>
<head>
    <title>Contact form</title>
    <link href="/ressources/css/styleform.css" rel="stylesheet">
</head>
<body>
<div class="main-block">
    <form action="http://blog.local/?action=blogpostupdate&id=<?php $numArticle?>">
        <h1>Modifier l'article</h1>
        <div class="info">
            <input class="title" type="text" name="title" placeholder="Title">
            <input type="text" name="content" placeholder="Content">
            <input type="text" name="publishdate" placeholder="Date de publication">
            <input type="text" name="lastdate" placeholder="Disponible jusqu'à">
            <input type="text" name="rating" placeholder="Rating">
            <input type="text" name="author" placeholder="Auteur">
        </div>
       </div>
        <button type="submit" href="/">Submit</button>
    </form>
</div>
</body>
</html>
