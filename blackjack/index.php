<?php

$numPlayers = 2;
$cards = $numPlayers*2;
$suits = ['clubs', 'diamonds', 'hearts', 'spades'];
$faces = [11=>'Jack', 12=>'Queen', 13=>'King', 14=>'Ace'];

$i = 1;
while ($i <= $cards) {
    $cardOrder = rand(2,14);
    if ($cardOrder > 1 and $cardOrder <11) {
        $cardNumValue = $cardOrder;
        $cardFace = $cardOrder;
    } elseif ($cardOrder >10 and $cardOrder <14) {
        $cardNumValue = 10;
        $cardFace = $faces[$cardOrder];
    } else {
        $cardNumValue = 14;
        $cardFace = $faces[$cardOrder];
        }
    $cardSuitValue = $suits[array_rand($suits)];
    ${'card' . $i} = $cardFace . ' of ' . $cardSuitValue;
//    echo '<p>' . 'cardorder = ' . $cardOrder . '</p>';
    echo '<p>' . ${'card' . $i} . '</p>';
    $i++;
    }


