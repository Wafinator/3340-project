<?php
// db.php - Handles MySQL connection
$host = 'localhost';      // Change if different
$db   = 'hassan95_3340_project';       // Your MySQL DB name
$user = 'hassan95_3340_project';  // DB username
$pass = 'vcyQAK2UGe9TBXm6AyWY';  // DB password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}
?>
