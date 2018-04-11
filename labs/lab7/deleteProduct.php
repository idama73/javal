<?php

include '../../dbdConnection.php';

$connection = getDatabaseConnection("ottermart");

$sql = "DELETE FROm om_product WHERE productId = ".$_GET['productId'];
$statement = $connection->prepare($sql);
//$statement->execute();

header("Location: admin.php");
?>