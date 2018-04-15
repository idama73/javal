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
    
    $statement = $conn->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach($records as $record){
        echo "<option value='".$record["catId"]."'>".$record['catName']."</option>";
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
        <style>
        @import url("https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
        @import url("css/styles.css");
    </style>
    </head>
    <body>
        <h1> Add a product</h1>
        <form>
            Product name: <input type="text" name="productName"><br>
            Description <textarea name="description" cols=50 rows=4></textarea><br>
            Price: <input type="text" name="price"><br>
            Category: <select name = "catId">
                <option value="1">-Select One-</option>
                <?php getCategories(); ?>
            </select> <br>
            Set Image URL:<input type="text" name="productImage"><br>
            <br>
            <input type="submit" name="submitProduct" value="Add Product"><br>
        </form>

    <script src="https://ajax.googleapis.com./ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.css"></script>
    </body>
</html>