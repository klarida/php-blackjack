<?php

declare(strict_types=1);


ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


//we are going to use session variables so we need to enable sessions
session_start();
require 'classes/Player.php';
require 'classes/suit.php';
require 'classes/card.php';
require 'classes/deck.php';
require 'classes/Blackjack.php';
$Blackjack = new Blackjack();
$deck = new Deck();
$deck->shuffle();
foreach($deck->getCards() AS $card) {
    echo $card->getUnicodeCharacter(true);
    echo '<br>';
}

