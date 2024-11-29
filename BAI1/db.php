<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "flowers_db";  
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "KET NOI CO SO DU LIEU THANH CONG!"; 
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
