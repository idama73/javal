<?php

$cards = array("ace", "one", 2);
//print_r($cards); //for debugging purposes, shows all elements in array.

//echo $cards[0];

$cards[] = "jack"; //adds new element at the end of the array.
array_push($cards, "queen", "king");
$cards[2] ="ten";
//print_r($cards);
//echo"<img src=../Challenge/randomCard/img/cards/clubs/ace.png>"
//displayCard();
//displayCard($cards[2]);

//print_r($cards);
//echo "hr";
//$lastCard = array_pop($cards); //retrives and REMOVE the last item in array
//displayCard($lastCard);
//echo "hr";
//print_r($cards);

unset($cards[1]); //remove element from array.
echo "hr";
print_r($cards);

$cards = array_values($cards); //re-indexes array;
echo "<hr>";
print_r($cards);

shuffle($cards);
echo "<hr>";
print_r($cards);
echo "<hr>";
$randomIndex = rand(0,count($cards)-1); //getting a random array
displayCard($cards[$randomIndex]);
echo "<hr>";
$randomIndex = rand(0,count($cards)-1); //getting a random array
displayCard($cards[$randomIndex]);


function displayCard($card){
    //global $cards; //using variable that is outside of the function
    echo "<img src='../Challenge/randomCard/img/cards/clubs/$card.png'/>";
}

?> 

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>

    </body>
</html>