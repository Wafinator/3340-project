<?php
// Database Configuration
// Choose your setup by uncommenting the appropriate section

// ========================================
// OPTION 1: Local Development (myweb.cs.uwindsor.ca)
// ========================================
$host = 'localhost';
$db   = 'hassan95_3340_project';
$user = 'hassan95_3340_project';
$pass = 'vcyQAK2UGe9TBXm6AyWY';

// ========================================
// OPTION 2: Cloud Database (for GitHub/other hosting)
// ========================================
// Uncomment and configure these for cloud hosting:
/*
$host = 'aws.connect.psdb.cloud';  // Your cloud DB host
$db   = 'your_database_name';      // Your cloud DB name  
$user = 'your_username';           // Your cloud DB username
$pass = 'your_password';           // Your cloud DB password
*/

// ========================================
// OPTION 3: Railway (Alternative cloud hosting)
// ========================================
// Uncomment and configure these for Railway:
/*
$host = 'containers-us-west-1.railway.app';  // Railway host
$db   = 'railway';                           // Railway database name
$user = 'root';                              // Railway username
$pass = 'your_railway_password';             // Railway password
$port = '1234';                              // Railway port (usually 1234)
*/

try {
    // For Railway, include port in connection string
    if (isset($port)) {
        $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db;charset=utf8", $user, $pass);
    } else {
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    }
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}
?>
