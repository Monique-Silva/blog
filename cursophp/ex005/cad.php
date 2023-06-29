<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Resultado</title>
</head>
<body>
    <header>
        <h1>Resultado final</h1>
    </header>
    <main>
        <?php
        $numero = $_GET["numero"];
        $numeroAntecessor = $numero - 1;
        $numeroSucessor = $numero + 1;
        echo "<p>O número escolhido foi <strong>$numero</strong>.<p>";
        echo "<p>O seu antecessor é o <strong>$numeroAntecessor</strong>.<p>";
        echo "<p>O seu sucessor é o <strong>$numeroSucessor</strong>.<p>";
        ?>
        <p><a href="javascript:history.go(-1)">Voltar para a página</a></p>
    </main>
</body>
</html>