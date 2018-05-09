<?php

include '../dbConnection.php';

$connection = getDatabaseConnection("Library");

$sql = "DELETE FROM book WHERE bookID= " .$_GET['bookID'];
$statement = $connection->prepare($sql);
//$statement->execute();

header("Location: adminpage.php");
?>