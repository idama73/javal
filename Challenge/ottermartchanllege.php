<?php
$sql1 = "SELECT COUNT(1) 
        FROM `purchase`  p
        INNER JOIN user u
        on p.user_id = u.userId
        WHERE purchaseDate >= \"2018-02-01\" AND purchaseDate <= \"2018-02-29\"
        "
        
$sql2 = "SELECT productName
        FROM user u
        INNER JOIN purchase p 
        on u.userId = p.user_id
        INNER JOIN product pro
        on p.productId = pro.productId
        WHERE email LIKE \"%@aol.com\"
        "
$sql3 = "SELECT SUM(quantity), sex
        FROM user u
        INNER JOIN purchase p 
        ON u.userId = p.user_id
        GROUP BY sex
        "
        
$sql4 = "SELECT DISTINCT(catName)
        FROM user u
        INNER JOIN purchase p 
        on u.userId = p.user_id
        INNER JOIN product pro
        on p.productId = pro.productId
        INNER JOIN category cat 
        on pro.catId = cat.catId
        WHERE purchaseDate >= \"2018-02-01\" AND purchaseDate <= \"2018-02-29\"
        "
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>

    </body>
</html>