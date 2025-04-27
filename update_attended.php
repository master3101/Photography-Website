<?php
include_once "dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];

    
    $sql = "UPDATE booknow1 SET attended = CASE WHEN attended = ' not done' THEN ' done' ELSE ' not done' END WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "done"; 
    } else {
        echo "error"; 
    }
}

$conn->close();
?>
