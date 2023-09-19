<?php


$numPlayers = 3;
$cards = $numPlayers * 2;

$cardsArray = ['2 of clubs', '3 of clubs', '4 of clubs', '5 of clubs', '6 of clubs', '7 of clubs', '8 of clubs', '9 of clubs', '10 of clubs', 'Jack of clubs', 'Queen of clubs', 'King of clubs', 'Ace of clubs', '2 of diamonds', '3 of diamonds', '4 of diamonds', '5 of diamonds', '6 of diamonds', '7 of diamonds', '8 of diamonds', '9 of diamonds', '10 of diamonds', 'Jack of diamonds', 'Queen of diamonds', 'King of diamonds', 'Ace of diamonds', '2 of hearts', '3 of hearts', '4 of hearts', '5 of hearts', '6 of hearts', '7 of hearts', '8 of hearts', '9 of hearts', '10 of hearts', 'Jack of hearts', 'Queen of hearts', 'King of hearts', 'Ace of hearts', '2 of spades', '3 of spades', '4 of spades', '5 of spades', '6 of spades', '7 of spades', '8 of spades', '9 of spades', '10 of spades', 'Jack of spades', 'Queen of spades', 'King of spades', 'Ace of spades'];
$playerCards = [];
$playerScores = [];
$players = [];


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
    if ($i % $numPlayers === 0) {
        $player = 'Player ' . $numPlayers;
    } else {
        $player = 'Player ' . ($i % $numPlayers);
    }
    //this if clause is a way of working out which player was dealt cards using modulo
    //it's pretty smart
    array_push($playerCards, $pickedCard);
    array_push($playerScores, $cardValue);
    array_push($players, $player);
    unset ($cardsArray[$randomkey]);
    $i++;
}

$allDealtCards = [$playerCards,$playerScores,$players];

echo '<pre>';
print_r($allDealtCards);
echo '</pre>';

$playerTotals = [];

$i = 1;
while ($i <= $numPlayers) {
    $filteredScores = array_filter($playerScores, function ($value, $key) use ($i, $players) {
        //The problem is how to make the $k adaptable
        return $players[$key] === 'Player ' . $i;
    }, ARRAY_FILTER_USE_BOTH);
    $twoCardScore = array_sum($filteredScores);
    array_push($playerTotals,$twoCardScore);
    $i++;
}

echo '<pre>';
print_r($playerTotals);
echo '</pre>';

// Reset array keys if needed
//$filteredArray = array_values($filteredArray);


