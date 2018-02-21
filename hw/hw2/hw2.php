<?php
$player;
$dealers;
?>
<!DOCTYPE html>
<html>
    <head>
        <title> 21 </title>
        <meta charset="utf-8"/>
        <style>
            @import url("css/style.css");
        </style>
    </head>
    <body>
        <main>
        <div id="player">
            <h2>Your Hand</h2>
        <?php
        include 'inc/21Functions.php';
        $player=play();
        
        ?>
        
        <div id="dealers">
            <h2>Dealer's Hand</h2>
        <?php
        //include 'inc/21Functions.php';
        $dealers=play();
        ?>
        </div>
        <?php
        if($player > $dealers || $player == 21){echo "<h2> Player Wins!! <h2>";}
        elseif($player < $dealers || $dealers){echo "<h2> Dealer Wins!! <h2>";}
        elseif($player == $dealers){echo "<h2> DRAW! <h2>";}
        ?>
        <form>
            <input value="New Hand" type="submit"/>
        </form>
        
        </main>
        

    </body>
    <footer> 
    <hr>
            CST 336. 2018&copy; Avalos<br />
            <strong>Disclaimer: </strong> The information is this webpage is fictitous. <br />
            It is used for academic purpose only.<br/>
            <img src="../../img/csumb_logo.jpg" alt="Logo"/>
            </footer>
</html>