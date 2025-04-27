<?php
include_once "dbconnect.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $event_id = $_POST["id"];

    
    $sql = "DELETE FROM booknow1 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $event_id);

    if ($stmt->execute()) {
        echo "success"; 
    } else {
        echo "error"; 
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request";
}
?>
