<?php
session_start();

if (!isset($_SESSION["number"]) || $_GET["PlayAgain"]) {
    $_SESSION["number"] = rand(1, 10);
    $_SESSION["tries"] = 0;
} 

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Challenge Activity</title>
    </head>
    <body>
        <?php
            if(isset($_GET['GiveUp'])){
                echo "The guessed number was ".$_SESSION['number'];
                $_SESSION["number"] = rand(1, 10);
                $_SESSION["tries"] = 0;
            }
        ?>
        <form>
            Guess: <input type="text" name="number"/>
            <input type="submit" value="Guess Number"/>
        </form>
        <br>
        <form>
            <input type="submit" name="GiveUp" value="Give Up"/>
        </form>
        <form>
            <input type="submit" name="PlayAgain" value="Play Again"/>
        </form>
        <?php
        if (isset($_GET["number"])) {
            if ($_GET["number"] == $_SESSION["number"]) {
                 $_SESSION["history"][] = array("number" => $_SESSION["number"], "tries" => $_SESSION["tries"]);
                echo "You have guessed the number!<br>";
                unset($_SESSION["number"]);
            } else {
                $_SESSION["tries"]++;
                if($_GET['number'] < $_SESSION['number']){
                    echo "The number is higher<br>";
                }else{
                    echo "The number is lower<br>";
                }
            }
        }
        
        if (isset($_SESSION["history"])) {
            echo "Guess history<br>";
            foreach ($_SESSION["history"] as $game) {
                echo "You guessed the number " . $game["number"] . " in " . $game["tries"] . " tries.<br>";
            }
        }
        ?>
    </body>
</html>