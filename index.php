<?php

declare(strict_types=1);

require 'classes/Player.php';
require 'classes/Blackjack.php';
require 'classes/suit.php';
require 'classes/card.php';
require 'classes/deck.php';
session_start();

$Blackjack = new Blackjack();
$deck = new Deck();

$deck->shuffle();
foreach($deck->getCards() AS $card) {
    echo $card->getUnicodeCharacter(true);

}


$_SESSION['blackjack'] = new Blackjack();



$player = $_SESSION["blackjack"]->getPlayer();
$dealer = $_SESSION["blackjack"]->getDealer();


if (isset($_POST["action"])){
    echo "game has started";
}
elseif($_POST["action"]=== "hit"){
    echo "player hit";



}
elseif($_POST["action"]=== "stand"){
    echo "player stand";
}
if (isset($_POST['surrender'])) {
    $_SESSION['blackJack']->getPlayer()->surrender();
    $_SESSION['playerLost'] = $_SESSION['blackJack']->getPlayer()->hasLost();
}


function assignSessionVar(): void
{
    $_SESSION['playerLost'] = false;
    $_SESSION['dealerLost'] = false;
    $_SESSION['playerScore'] = $_SESSION['blackJack']->getPlayer()->getScore();
    $_SESSION['dealerScore'] = 0;
    $_SESSION['showDealerCards'] = false;
}

function checkPlayer(): void
{
    //$_SESSION['blackJack']->getPlayer()->getScore();
    if ($_SESSION['blackJack']->getPlayer()->hasLost()) {
        $_SESSION['playerLost'] = true;
    }
}

function whoIsTheWinner(): void
{
    $_SESSION['playerScore'] = $_SESSION['blackJack']->getPlayer()->getScore();
    $_SESSION['dealerScore'] = $_SESSION['blackJack']->getDealer()->getScore();
    if ($_SESSION['playerScore'] > $_SESSION['dealerScore']) {
        $_SESSION['dealerLost'] = true;
    } else {
        $_SESSION['playerLost'] = true;
    }


}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Black Jack OOP</title>
</head>
<body>
<div class="container">
    <div class="row align-items-center">
        <div class="col-6 col-md-3 text-center">
            <p style="font-size:2rem">
<div>Player score: <?php echo $player->getScore()?></div>
<div>Dealer score: <?php echo $dealer->getScore()?></div>

<form action="index.php" method="post">
    <button type="submit" class="btn btn-info">Play</button> <br>
    <button class="submit" class="btn btn-reset" >Reset</button> <br>
    <button type="submit" class="btn btn-secondary">Hit</button>
    <button type="submit" class="btn btn-success">Stand</button>
    <button type="submit" class="btn btn-danger">Surrender</button>

</form>

<!-- made buttons -->

<div>
    Player cards:
    <?php
    foreach($player->getCards() as $card){
        echo $card->getUnicodeCharacter(true);
    }
    ?>
</div>

<div>
    Dealer cards:
    <?php
    foreach($dealer->getCards() as $card){
        echo $card->getUnicodeCharacter(true);
    }
    ?>
</div>

<div>
    <?php
    if ($dealer->hasLost()){
        echo "Dealer loses";
    }
    else if ($player->hasLost()){
        echo "Player loses";
    }
    ?>


</div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                    crossorigin="anonymous"></script>
</body>
</html>