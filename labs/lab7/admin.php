<?php

session_start();
if(!isset( $_SESSION['adminName']))
{
  header("Location:index.php");
}
include '../../dbConnection.php';
$conn = getDatabaseConnection("ottermart");

function displayAllProducts(){
    global $conn;
    $sql="SELECT * FROM om_product";
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
        <form action="addProduct.php">
            <input type="submit" name="addproduct" value="Add Product"/>
        </form>
        
         <form action="logout.php">
            <input type="submit" value="logout"/>
        </form>
        
        <br /><br />
        <strong> Products: </strong> <br />
        
        <?php $records=displayAllProducts();
            foreach($records as $record) {
                echo "<div class = 'options'>";
                echo "[<a href='updateProduct.php?productId=".$record['productId']."'>Update</a>]";
                //echo "<input type ='submit' value='Remove'>";
                //echo "[<a href='deleteProduct.php?productId=".$record['productId']."'>Delete</a>]";
                echo "</div>";
                echo"<div class = 'products'>";
                echo "<form action ='deleteProduct.php'onsubmit='return confirmDelete()'>";
                echo "<input type='hidden' name='productId' value=".$record['productId']."/>";
                echo "<input type ='submit' value='Remove'>";
                 echo "</form>";
                
                echo $record['productName'];
                echo '<br>';
                echo "<div>";
                echo '<br>';
            }
        
        ?>
        
        
    <script src="https://ajax.googleapis.com./ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.css"></script>
    </body>
</html>