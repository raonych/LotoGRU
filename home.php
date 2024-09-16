<?php 
if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
}
else if (isset($_GET['nome'])) {
    $nome = $_GET['nome'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible">
    <title>LotoGRU</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=SUSE:wght@100..800&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo">LotoGRU</div>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h1 >Escolha seus números da sorte <?php echo $nome?>!!</h1>
        </div>
    </section>

    <main>
        <form action="recebe-dado.php" method="post" class="number-selection">
            <h2 class="hero-content">Escolha 25 números</h2>
            <div class="number-grid">
                <?php include "./modulos/indexnums.php" ?>
            </div>
            <div class="actions">
                <label for="bet" class="label-bet">Insira o valor da aposta:</label>
                <input type="text" name="bet" class="bet-input">
                <input type="hidden" name="nome" value="<?php echo $nome ?>">
                <button type="submit" class="submit-btn">Enviar</button>            
            </div>
</form>
    </main>
</body>
</html>
