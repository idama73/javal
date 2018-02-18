<?php
function displayCards($randSet, $randUnit){
    switch ($randSet){
        case 0: $set="";
        break;
        case 1:
            break;
        case 2:
            break;
        case 3:
            break;
        case 4:
            break;
    }
    switch($randUnit){
        case 0:
            break;
        case 1:
            break;
        case 2:
            break;
        case 3:
            break;
        case 4:
            break;
        case 5:
            break;
        case 6:
            break;
        case 7:
            break;
        case 8:
            break;
        case 9:
            break;
        case 10:
            break;
        case 11:
            break;
        case 12:
            break;
        case 13:
            break;
        case 14:
            break;
    }
}

function play(){
    for($i =1 ; $i<=2; $i++){
        ${"randomValue" . $i } = rand(0,4);
                displayCards(${"randomValue" . $i}, $i);
    }
    
}

function addCard(){
    
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