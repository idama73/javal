<?php 
include '../dbConnection.php';
$conn = getDatabaseConnection("final_project");

function displayGenre(){
        global $conn;
        
        //$sql = "SELECT catId, catName FROM `category` ORDER BY catName";
        $sql = "SELECT genreId, genreName FROM 'Genre' ORDER BY genreName";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        //print_r($records);
        
        // foreach ($records as $record) {
            
        //     echo "<option " . ($_GET["bookCategory"] == $record["catId"] ? "selected" : "") .
        //      " value='".$record["catId"]."' >" . $record["catName"] . "</option>";
            
        // }
        foreach ($records as $record) {
            
            echo "<option " . ($_GET["GameGenre"] == $record["genreId"] ? "selected" : "") .
             " value='".$record["genreId"]."' >" . $record["genreName"] . "</option>";
            
        }
        
    }
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Game Search </title>
    </head>
    <!---->
    <body>
        
        <form method="GET">
            <label for="genre">Genre: </label>
            <select id="genre" name="GameGenre">
                <option value="" >  Select One </option> 
                <?php displayGenre(); ?> 
            </select>
        
        </form>

    </body>
</html>