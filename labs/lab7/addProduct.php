<?php
session_start();
if(!isset( $_SESSION['adminName']))
{
  header("Location:index.php");
}
include '../../dbConnection.php';
$conn = getDatabaseConnection("ottermart");

function getCategories(){
    global $conn;
    
    $sql = "SELECT catId, catName FROM om_category ORDER BY catName";
    $statement = $conn ->prepare($sql);
    $statement ->execute();
    $record = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($records as $record){
        echo "<oprion>".$record['catName'].">".$record['catName']."</option>";
    }
}

if(isset($_GET['submitProduct'])){
    $productName = $_GET['productName'];
    $productDescription = $_GET['description'];
    $productImage = $_GET['productImage'];
    $productPrice = $_GET['price'];
    $catId = $_GET['catId'];
    
    $sql = "INSERT INTO om_product
            (`productId`, `productName`, `productDescription`, `productImage`, `price`, `catId`) 
             VALUES (:productName, :productDescription, :productImage, :price, :catId)";
             
    $nameParameters = array();
    $nameParameters[':productName'] = $productName;
    $nameParameters[':productDescription'] = $productDescription;
    $nameParameters[':productImage'] = $productImage;
    $nameParameters[':price'] = $productPrice;
    $nameParameters[':catId'] = $catId;
    $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Add a product</title>
    </head>
    <body>
        <h1> Add a product</h1>
        <form>
            Product name: <input type="text" name="productName"><br>
            Description <textarea name="description" cols=50 rows=4></textarea><br>
            Price: <input type="text" name="price"><br>
            Category: <select name = "catId">
                <option value="1">-Select One-</option>
                <??>
            </select><br>
            Image URL:<input type="text" name="productImage"><br>
            <input type="submit" value="submitProduct"><br>
        </form>

    </body>
</html>