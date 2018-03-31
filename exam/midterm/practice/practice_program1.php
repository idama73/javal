<?php

$letterArray = range("A", "Z");

function selectletter(){
    global $letterArray;
    foreach($letterArray as $letter){
        echo "<option value='$letter'>$letter</option>";
    }
}

function getLetterTable($size, $lettertofind, $lettertoomit){
    global $letterArray;
    
    $letterTable = array();
    for($i=0; $i < $size*$size; $i++){
        do{
            $randomLetter = $letterArray[array_rand($letterArray)];
        }
        while($randomLetter == $lettertofind || $randomLetter == $lettertoomit);
        $letterTable[] = $randomLetter;
    }
    
    $letterTable[array_rand($letterTable)] = $lettertofind;
    
    return $letterTable;
    
}
    
function displayTable(){
    if(isset($_GET['submit'])){
        $lettertofind = $_GET['findletter'];
        $lettertoomit = $_GET['omit'];
        $size = $_GET['size'];
        
        if($lettertofind == $lettertoomit){
            echo "<br/><br/><strong>Error: Letter to Omit must be Different from Letter to Omit</strong>";
            return;
        }
        
        echo "<hr><h1> Find the Letter " .$lettertofind. "</h1>";
        echo "<strong> Letter to Ommit: " .$lettertoomit."</strong><br/>";
        
        $letterTable = getLetterTable($size, $lettertofind,$lettertoomit);
        echo "<table border='1' style='margin:0 auto' cellpadding=7>";
        $index=0;
        
        for($rows = 0; $rows < $size; $rows++){
            echo"<tr>";
            for($cols = 0; $cols < $size; $cols++){
                $lettertodisplay = $letterTable[$index];
                if($lettertodisplay < 'H'){
                    $color = "red";
                } else if($lettertodisplay < 'P'){
                    $color = "blue";
                } else {
                    $color = "green";
                }
                echo "<td style='color:$color'>".$lettertodisplay."</td>";
                $index++;
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Practice Program 1: Find the letter</title>
        <style>
	td {
		font-size: 1.8em;
	}
	#option {
		margin: 0 auto;
		width: 800px;
		text-align: center;
	}
  </style>
    </head>
    <body>
      <div id="option">
        <?php
        echo "<h2> Select your Table and letter</h2>"
        ?>
        <br><br>
        <form method='get'>
            
            <strong>Select Letter to Find</strong>
            <select name="findletter">
                <?=selectletter()?>
            </select>
            <br><br>
                
                <label for="size">Select Table Size:</label>
                <select name="size">
                <option value="0">6x6</option>
                <option value="1">7x7</option>
                <option value="2">8x8</option>
                <option value="3">9x9</option>
                <option value="4">10x10</option>
                </select>
                <br><br>
                
                <label for="omit">Select Letter to Omit:</label>
                <select name="omit">
                    <?=selectletter()?>
                </select>
                <br>
            
            <br>        
            <input type="submit" value="Create Table" name="submit"/>

        </form>
        <?=displayTable()?>
      </div>

    </body>
</html>