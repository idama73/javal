<?php
session_start();
if(!isset( $_SESSION['adminName']))
{
  header("Location:Index.php");
}
include "../dbConnection.php";
$conn = getDatabaseConnection("Library");


if (isset($_GET['submitAuthor'])) {

    $Author = $_GET['authorName'];

    
    // $sql = "INSERT INTO om_product
    //         ( `productName`, `productDescription`, `productImage`, `price`, `catId`) 
    //          VALUES ( :productName, :productDescription, :productImage, :price, :catId)";
    $sql = "INSERT INTO author
            (`authorName`)
            VALUES (:authorName)";
    
    $namedParameters = array();
    $namedParameters[':authorName'] = $Author;
     $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);
    header("Location: adminpage.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Add a Author </title>
    </head>
    <body>
        <h1> Add a Author</h1>
        <form>
            Author Name: <input type="text" name="authorName"><br>
           
            <input type="submit" name="submitAuthor" value="Add Author">
            <?php echo "<button type=\"button\" onclick=\"history.go(-1);\"> Back </button>";?>

        </form>
    </body>
</html>