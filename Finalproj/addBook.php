<?php
session_start();
if(!isset( $_SESSION['adminName']))
{
  header("Location:Index.php");
}
include "../dbConnection.php";
$conn = getDatabaseConnection("Library");

// fix this to library database
function getCategories() {
    global $conn;
    
    //$sql = "SELECT catId, catName from om_category ORDER BY catName";
    $sql = "SELECT catID, catName from category ORDER BY catName";
    
    $statement = $conn->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($records as $record) {
        echo "<option value='".$record["catId"] ."'>". $record['catName'] ." </option>";
    }
}
function getAuthor(){
    global $conn;
    
    $sql = "SELECT authorID, authorName from author ORDER BY authorName";
    
    $statement = $conn->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($records as $record) {
        echo "<option value='".$record["authorID"] ."'>". $record['authorName'] ." </option>";
    }
}

if (isset($_GET['submitProduct'])) {
    $bookName = $_GET['BookName'];
    $bookAuthor = $_GET['authorId'];
    $bookDescription = $_GET['description'];
    $bookImage = $_GET['BookImage'];
    $bookPrice = $_GET['price'];
    $catId = $_GET['catId'];
    
    // $sql = "INSERT INTO om_product
    //         ( `productName`, `productDescription`, `productImage`, `price`, `catId`) 
    //          VALUES ( :productName, :productDescription, :productImage, :price, :catId)";
    $sql = "INSERT INTO book
            (`bookName`, `authorID`, `bookDescription`, `bookImage`, `price`,`categoryID`)
            VALUES (:bookName, :authorID, :bookDescription, :bookImage, :price,:categoryID)";
    
    $namedParameters = array();
    $namedParameters[':bookName'] = $bookName;
    $namedParameters[':authorID'] = $bookAuthor;
    $namedParameters[':bookDescription'] = $bookDescription;
    $namedParameters[':bookImage'] = $bookImage;
    $namedParameters[':price'] = $bookPrice;
    $namedParameters[':categoryID'] = $catId;
     $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);
    header("Location: adminpage.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Add a product </title>
    </head>
    <body>
        <h1> Add a product</h1>
        <form>
            Book name: <input type="text" name="BookName"><br>
            Author: <select name="authorId">
                <option value="">Select One</option>
                <?php getAuthor(); ?>
            </select> <br />
            Description: <textarea name="description" cols = 50 rows = 4></textarea><br>
            Price: <input type="text" name="price"><br>
            Category: <select name="catId">
                <option value="">Select One</option>
                <?php getCategories(); ?>
            </select> <br />
            Set Image Url: <input type = "text" name = "BookImage"><br>
            <input type="submit" name="submitProduct" value="Add Product">
            <?php echo "<button type=\"button\" onclick=\"history.back();\"> Back </button>";?>
        </form>
    </body>
</html>