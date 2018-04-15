<?php
session_start();
include '../../dbConnection.php';

$conn = getDatabaseConnection('Challenge_History');


if (!isset($_SESSION["number"]) || $_GET["PlayAgain"]) {
    $_SESSION["number"] = rand(1, 10);
    $_SESSION["tries"] = 0;
} 

function getHistory(){
    global $conn;
    
    $sql = "SELECT * FROM Number";
    
    $statement = $conn->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function addGuess(){
    global $conn;
    
    $number = $_SESSION["number"];
    $guesses = $_SESSION["tries"];
    
    $sql = "INSERT INTO Number (Number, Guesses) VALUES ($number, $guesses)";
    
    $statement = $conn->prepare($sql);
    $statement->execute();
    
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
        <br>
        <?php
        if (isset($_GET["number"])) {
            $_SESSION["tries"]++;
            if ($_GET["number"] == $_SESSION["number"]) {
                 /*$_SESSION["history"][] = array("number" => $_SESSION["number"], "tries" => $_SESSION["tries"]);*/
                 addGuess();
                echo "You have guessed the number!<br><br>";
                unset($_SESSION["number"]);
            } else {
                /*$_SESSION["tries"]++;*/
                if($_GET['number'] < $_SESSION['number']){
                    echo "The number is higher<br><br>";
                }else{
                    echo "The number is lower<br><br>";
                }
            }
        }
        
        $history = getHistory();
        
        if (count($history) > 0) {
            echo "Guess history<br>";
            foreach ($history as $game) {
                echo "You guessed the number " . $game["Number"] . " in " . $game["Guesses"] . " tries.<br>";
            }
        }
        /*
        if (isset($_SESSION["history"])) {
            echo "Guess history<br>";
            foreach ($_SESSION["history"] as $game) {
                echo "You guessed the number " . $game["number"] . " in " . $game["tries"] . " tries.<br>";
            }
        }
        UPDATE Number SET (Guesses) VALUES (Guesses + 1)
        */
        ?>
    </body>
</html>