<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <header>
        <h1>Resultado do processamento</h1>
    </header>
    <main>
        <?php
        $n = $_GET["nome"] ?? "anônimo"; //serve pra colocar um valor par default
        $s = $_GET["sobrenome"];
        echo "<p>É um prazer te conhecer, <strong>$n $s</strong>. Receba as boas-vindas!<p>";
        ?>
        <p><a href="javascript:history.go(-1)">Voltar para a página</a></p>
    </main>
</body>
</html>