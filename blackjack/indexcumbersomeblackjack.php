<?php

$numPlayers = 2;
$cards = $numPlayers*2;
$cardsArray = ['2 of clubs', '3 of clubs', '4 of clubs', '5 of clubs', '6 of clubs', '7 of clubs', '8 of clubs', '9 of clubs', '10 of clubs', 'Jack of clubs', 'Queen of clubs', 'King of clubs', 'Ace of clubs', '2 of diamonds', '3 of diamonds', '4 of diamonds', '5 of diamonds', '6 of diamonds', '7 of diamonds', '8 of diamonds', '9 of diamonds', '10 of diamonds', 'Jack of diamonds', 'Queen of diamonds', 'King of diamonds', 'Ace of diamonds', '2 of hearts', '3 of hearts', '4 of hearts', '5 of hearts', '6 of hearts', '7 of hearts', '8 of hearts', '9 of hearts', '10 of hearts', 'Jack of hearts', 'Queen of hearts', 'King of hearts', 'Ace of hearts', '2 of spades', '3 of spades', '4 of spades', '5 of spades', '6 of spades', '7 of spades', '8 of spades', '9 of spades', '10 of spades', 'Jack of spades', 'Queen of spades', 'King of spades', 'Ace of spades'];
$playerCards = [];
$playerScores = [];

$i = 1;
while ($i <= $cards) {
    $randomkey = array_rand($cardsArray);
//    echo '<p>' . $randomkey . '</p>';
    $pickedCard = $cardsArray[$randomkey];
    if (str_starts_with($pickedCard, 10)) {
        $cardValue = 10;
        } elseif (is_numeric(substr($pickedCard,0,1))) {
        $cardValue = substr($pickedCard, 0, 1) * 1;
    } elseif (str_contains($pickedCard,'Ace')) {
        $cardValue = 11;
    } else {
        $cardValue = 10;
    }
//    echo '<p>' . $pickedCard . '</p>';
//    echo '<p>' . 'Value of card is ' . $cardValue . '</p>';
//    echo '<p>' . '   ------------------' . '</p>';
    //add $pickedCard to an array to some for players later
    array_push($playerCards, $pickedCard);
    array_push($playerScores, $cardValue);
    unset ($cardsArray[$randomkey]);
    $i++;
}

echo '<pre>';
print_r($playerCards);
echo '</pre>';

echo '<pre>';
print_r($playerScores);
echo '</pre>';

//let's say minimum players is 2
//maximum is five
//if there are two players
//if more than two could i make an array that reorders cards array into sequence
// would that be easier somehow

if ($numPlayers = 2) {
    $p1Score = $playerScores[0]+$playerScores[2];
    $p1Cards = $playerCards[0] . ' and ' . $playerCards[2];
    echo '<p>' . 'Player One drew ' . $p1Cards . ' and scored ' . $p1Score . '</p>';
    $p2Score = $playerScores[1]+$playerScores[3];
    $p2Cards = $playerCards[1] . ' and ' . $playerCards[3];
    echo '<p>' . 'Player Two drew ' . $p2Cards . ' and scored ' . $p2Score . '</p>';
    if ($p1Score > 21 and $p2Score > 21) {
        $winner = ' neither ...both busted';
    } elseif ($p1Score > 21) {
        $winner = 'Player Two';
    } elseif ($p2Score > 21) {
        $winner = 'Player One';
    } elseif (($p1Score - $p2Score) === 0) {
        $winner = '...neither, both drew';
    } elseif ($p1Score > $p2Score) {
        $winner = 'Player One';
    } else {
        $winner = 'Player Two';
    }
    echo '<p>' . 'The winner is ' . $winner . '</p>';
}

