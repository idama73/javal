<?php

include '../../dbConnection.php';

$conn = getDatabaseConnection("Library");

$password = $_GET['password'];

//next query allows for SQL injection because of the single quotes
//$sql = "SELECT * FROM lab9_user WHERE username = '$username'";

$sql = "SELECT * FROM admin WHERE password = :password";


$stmt = $conn->prepare($sql);
$stmt->execute( array(":password"=>$password));
$record = $stmt->fetch(PDO::FETCH_ASSOC);

//print_r($record);

echo json_encode($record);

?>