<!DOCTYPE html>
<html lang="pt=br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criação de números aleatórios</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <header>
        <h1>Trabalhando com números aleatórios</h1>
    </header>
    <main>
        <p>Gerando um número aleatório entre 0 e 100...</p>
        <?php
        $numeroAleatorio = random_int(0, 100); //cria valores criptografados. senão tem que chamar a função mt_rand() - a rand() já está meio ultrapassada
        echo "<p>O valor gerado foi $numeroAleatorio </p>";
        ?>
        <button onclick="javascript:document.location.reload()">Gerar outro</button>
        </form>
    </main>
</body>

</html>