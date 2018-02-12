<?php
function getRandomColor(){
    echo "rgba(".rand(0,255)).",".rand
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Random Color </title>
        
        <style>
            
            body {
                
                <?php
                $red = rand(0,255);
                $green = rand(0, 255);
                $blue = rand(0, 255);
                $alpha = rand(0,10) / 10;
                echo "background-color: rgba($red,$green,$blue,$alpha);";
                ?>
            }
            h1 {
                
                <?php
               
                echo "color: rgba(".rand(0,255)).",".rand(0,255).",".rand(0,255).",".$alpha");";
                ?>
            }
            
            h2{
                color: <?php getRandomColor() ?>;
                background-color:<?= getRandomColor ?>;
            }
        </style>
        <h1>Welcome!</h1>
    </head>
    <body>

    </body>
</html>