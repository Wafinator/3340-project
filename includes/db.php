<?php
/**
 * File: includes/db.php
 * Purpose: Create and expose a PDO MySQL connection used across the site.
 * Usage: require_once 'includes/db.php'; then use $pdo for queries.
 * Notes:
 *  - Set credentials for your myweb host.
 *  - The connection uses UTF-8 and throws exceptions on errors.
 */
// Handles MySQL connection
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
