<?php
// Database Configuration - Loads from secure config file
// IMPORTANT: Copy config.sample.php to config.php and update with your credentials
// config.php is not tracked by git for security

// Load database credentials from secure config file
if (file_exists(__DIR__ . '/config.php')) {
    require_once __DIR__ . '/config.php';
} else {
    // Fallback - you MUST create config.php with your actual credentials
    die("ERROR: config.php not found. Copy config.sample.php to config.php and update with your database credentials.");
}

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
