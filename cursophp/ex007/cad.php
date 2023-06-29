<!DOCTYPE html>
<html lang="pt=br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de moedas</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <header>
        <h1>Conversor de moedas v1.0</h1>
    </header>
    <main>
        <p>
        <?php
            $valorDigitado = $_GET["dinheiro"];
            $conversao = $valorDigitado / 5.23;
            echo "Você tem " . number_format($conversao, 2, ",", ".") . " euros.";
        ?>
        </p>
    </main>
</body>

</html>