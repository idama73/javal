<?php

session_start();
if(!isset( $_SESSION['adminName']))
{
  header("Location:Index.php");
}
include '../dbConnection.php';
$conn = getDatabaseConnection("Library");

function displayAllProducts(){
    global $conn;
    $sql="SELECT * FROM book";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    //print_r($records);

    return $records;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Main Page </title>
        <style>
        @import url("https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
        @import url("css/styles.css");
            form{
                display: inline;
            }
        </style>
        <script>
            function confirmDelete(){
                return confirm("Are you sure you want to delete it?");
            }
        </script>
    </head>
    <body>


        
        <h1> Admin Main Page </h1>
        
        <h3> Welcome <?=$_SESSION['adminName']?>! </h3>
        
        <br />
        <form action="addBook.php">
            <input type="submit" name="addproduct" value="Add Product"/>
        </form>
        
        <form action="addAuthor.php">
            <input type="submit" name="addauthor" value="Add Author"/>
        </form>
        
         <form action="logout.php">
            <input type="submit" value="logout"/>
        </form>
        
        <br /><br />
        <strong> Books: </strong> <br />
        
        <?php $records=displayAllProducts();
            foreach($records as $record) {
                echo "[<a href='updateBook.php?bookID=".$record['bookID']."'>Update</a>]";
                //echo "<input type ='submit' value='Remove'>";
                //echo "[<a href='deleteProduct.php?productId=".$record['productId']."'>Delete</a>]";

                echo "<form action='deleteBook.php' onsubmit='return confirmDelete()'>";
                echo "<input type='hidden' name='bookID' value=" .$record['bookID']. "/>";
                echo "<input type ='submit' value='Remove'>";
                echo "</form>";
                
                echo $record['bookName'];
                echo '<br>';
            }
        
        ?>
        
        
    <script src="https://ajax.googleapis.com./ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.css"></script>
    </body>
</html>