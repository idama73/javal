<?php
global $sumhand, $hand;


function displayCards($randSet, $randUnit, $pos){
    switch ($randSet){
        case 0: $set="clubs";
            break;
        case 1: $set="diamonds";
            break;
    }
    switch($randUnit){
        case 0: $symbol="two";
            break;
        case 1: $symbol="three";
            break;
        case 2: $symbol="four";
            break;
        case 3: $symbol="five";
            break;
        case 4: $symbol="six";
            break;
        case 5: $symbol="seven";
            break;
        case 6: $symbol="eight";
            break;
        case 7: $symbol="nine";
            break;
        case 8: $symbol="ten";
            break;
        case 9: $symbol="jack";
            break;
        case 10: $symbol="queen";
            break;
        case 11: $symbol="king";
            break;
        case 12: $symbol="ace";
            break;
    }
    
    echo "<img id='hand$pos' src='img/cards/$set/$symbol.png' alt='$symbol' title='".ucfirst($symbol)."' width='90' >";
    
}
function displayPoints($set, $card, $pos){
    //$sumhand ="";
    
    if($card>=0 && $card<=6)
    {
        $hand+=$card+2;
        
    }
    elseif($card == 7)
    {
        $hand+=$card+1;
        
    }
    elseif($card>=8 && $card<=11)
    {
        $hand+=10;
        
    }
    elseif($card==12){
        $hand+=11;
        
    }
    //$card1sum = $sumhand;
    /*
    if($card2>=0 && $card2<=6){$sumhand+=$card2+2;}
    elseif($card2==7){$sumhand+=$card2+1;}
    elseif($card2>=8 && $card2<=11){$sumhand+=10;}
    elseif($card2==12){$sumhand+=11;}
    //$card2sum = $sumhand;
    
    //$total=$card1sum+$card2sum;
    */
   //$sumhand=$card;
    //echo $hand;
    return addhand($hand);
    //echo $card1 ." ". $card2;
}

function addhand($card){
    $sumhand += $card;
    return $sumhand;
}

function play(){
    $totalhand;
    for($i=1; $i<=2; $i++){
        ${"set". $i} = rand(0,1);
            for($j=1; $j <2; $j++){
                ${"randomValue" . $j} = rand(0, 12);
                displayCards(${"set". $i}, ${"randomValue" . $j}, $i);
                $totalhand += displayPoints(${"set". $i}, ${"randomValue" . $j}, $i);
            }
        //displayCards(${"randomValue" . $i}, 5, $i);
    }
    //$sumhand = $set1.$randomValue1;
    
    echo "<div></div>"."<h3>Sum: $totalhand </h3>";
    return $totalhand;
    //displayPoints($randomValue1,$randomValue2);
}



?>
