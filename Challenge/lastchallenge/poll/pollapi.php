<?php
    
    if(!isset($_GET["val"]) ){
        echo "false";
        exit(0);
    }
    
     include "../../../dbConnection.php";
     
     $conn = getDatabaseConnection("Results");
     
    $sql = "UPDATE results
            SET ";
    switch ($_GET["val"]) {
        case 'Yes':
            $sql .= "Yes = Yes + 1";
            break;
        case 'No':
            $sql .= "No = No + 1";
            break;
        case 'Maybe':
            $sql .= "Maybe = Maybe + 1";
            break;
        default:
            echo "false";
            break;
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    $sql = "SELECT * FROM results";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo json_encode($rec);
?>