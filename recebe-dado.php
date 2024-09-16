<?php
$nome = $_POST['nome']; 
$num_select = [];
$num_sort = [];
$num_win = [];
$aposta = $_POST["bet"];

//Pega os números selecionados pelo usuario
for ($i = 1; $i <= 50; $i++) {
        if(isset($_POST["n$i"])){
            $num_select[] = $_POST["n$i"];           
        } 
        else{
            continue;
        } 
}

//Passa os numeros selecionados pelo usuario para um array com no máximo 25 números
for ($i = 0; $i <= 24; $i++){ 
    if(isset($num_select[$i])){
    $num_sort[] = $num_select[$i];
    }else{
        continue;
    }
}

//gera uma lista de 25 números aleatorios entre 1 e 50
$num_rand = range(1, 50);
shuffle($num_rand);
$num_win = array_slice($num_rand, 0, 25);

//Compara a lista de números aleatorios com a lista de números selecionados pelo usuario 
for($i = 0; $i < count($num_sort); $i++){
    $x = 0;
    while ($x < 25){
        if($num_sort[$i] == $num_win[$x]){
            $vencedor[] = $num_sort[$i];
            break;
        }else{
            $x++;
        }
    }  
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<header>
        <div class="logo">LotoGRU</div>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>

            </ul>
        </nav>
    </header>
<section class="hero result">    
<h2>
<?php
if (isset($vencedor)){
switch(count($vencedor)){
    case  count($vencedor) < 25: 
        echo "você não acertou a quantidade de números necessários para ganhar o prêmio. </br>";
        header("Refresh: 10; url=home.php?nome=" . urlencode($nome));
        echo "redirecionado <div class=\" spinner\"></div>";

        break;
    case 25: 
        echo "Parabéns!! ";
        echo "Você ganhou R$", (int)$aposta * 50;
        break;
}
}
else{
    if(count($num_sort)== 25){
    echo "Parabéns, você conseguiu errar todos os 25 números! Vai ser recompensado por ser azarado pra caramba";
    echo "Você ganhou R$", (int)$aposta * 50;
    }
    else{
        echo "você não acertou a quantidade de números necessários para ganhar o prêmio. </br>";
        header("Refresh: 10; url=home.php?nome=" . urlencode($nome));
        echo "redirecionado<div class=\"spinner\"></div>";
    }

}
?></h2>
</section>

<div class="winner">
<h4>Números sorteados</h4>
    <div class="display-num">   
    <?php if(isset($num_win)){
        for($i =0; $i < count($num_win); $i++){
            echo '<div class="winner-num">', $num_win[$i], '</div>';
        }?>
    </div>
</div>

<div class="sort">
<h4>Números selecionados</h4>
    <div class="display-num">
    <?php for($i =0; $i < count($num_sort); $i++){
            echo '<div class="sort-num">', $num_sort[$i], '</div>';
        }

        }?>
    </div>
</div>    
<form action="home.php" method="post" class="actions">
    <input type="hidden" name="nome" value="<?php if(isset($nome))echo $nome;?>">
        <button type="submit" class="submit-btn">Jogar novamente</button>            
    </form>
</body>
</html>










