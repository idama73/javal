<?php
session_start();
if(!isset( $_SESSION['adminName']))
{
  header("Location:Index.php");
}

    include '../dbConnection.php';
    
    $conn = getDatabaseConnection("Library");
    
    function getCategories($catId) {
    global $conn;
    
    $sql = "SELECT catID, catName FROM category ORDER BY catName";
    
    $statement = $conn->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($records as $record) {
        echo "<option  ";
        echo ($record["catID"] == $catId)? "selected": ""; 
        echo " value='".$record["catID"] ."'>". $record['catName'] ." </option>";
    }
}


function getAuthor(){
    global $conn;
    
    $sql = "SELECT authorID, authorName FROM author ORDER BY authorName";
    
    $statement = $conn->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($records as $record) {
        echo "<option value='".$record["authorID"] ."'>". $record['authorName'] ." </option>";
    }
}
    //fix for database library
    function getBookInfo()
    {
        global $conn;
        
        $sql = "SELECT * FROM `book` WHERE bookID = " . $_GET['bookID'] ;
    
        //echo $_GET["productId"];
        
        $statement = $conn->prepare($sql);
        $statement->execute();
        $record = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $record;
    }
    
    
    if (isset($_GET['updateBook'])) {
        
        //echo "Trying to update the product!";
        
        // $sql = "UPDATE om_product
        //         SET productName = :productName,
        //             productDescription = :productDescription,
        //             productImage = :productImage,
        //             price = :price,
        //             catId = :catId
        //         WHERE productId = :productId";
        
         $sql = "UPDATE book
                SET bookName = :bookName,
                    bookDescription = :bookDescription,
                    bookImage = :bookImage,
                    categoryID = :categoryID
                    price = :price
                WHERE bookID = :bookID";
        
        $np = array();
        $np[":bookName"] = $_GET['bookName'];
        $np[":bookDescription"] = $_GET['description'];
        $np[":bookImage"] = $_GET['bookImage'];
        $np[":categoryID"] = $_GET['categoryID'];
        $np[":price"] = $_GET[''];
        $np[":bookID"] = $_GET['bookID'];
                
        $statement = $conn->prepare($sql);
        $statement->execute($np);        

         header("Location: adminpage.php");
    }
    
    
    if(isset ($_GET['bookID']))
    {
        $product = getBookInfo();
    }
    
    //print_r($product);
    
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update Book </title>
        <style>
        @import url("https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
        @import url("css/styles.css");
    </style>
    </head>
    <body>
        <h1>Update Book</h1>
        
        <form>
            <input type="hidden" name="bookID" value= "<?=$product['bookID']?>"/>
            Book name: <input type="text" value = "<?=$product['bookName']?>" name="bookName"><br>
            Description: <textarea name="description" cols = 50 rows = 4><?=$product['bookDescription']?></textarea><br>
            Price: <input type="text" name="price" value = "<?=$product['price']?>"><br>
    
            Category: <select name="categoryID">
                <option>Select One</option>
                <?php getCategories($product['categoryID']); ?>
            </select> <br />
            Set Image Url: <input type = "text" name = "bookImage" value = "<?=$product['bookImage']?>"><br>
            <input type="submit" name="updateBook" value="Update Book">
            <?php echo "<button type=\"button\" onclick=\"history.back(-1);\"> Back </button>";?>
        </form>
        
        <script src="https://ajax.googleapis.com./ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.css"></script>
    </body>
</html>