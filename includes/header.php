<?php
session_start();
$current_theme = $_SESSION['theme'] ?? 'dark';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="WafiTechParts - Your one-stop shop for custom PC parts and builds. Browse high-performance components for gaming, workstations, and more.">
    <meta name="keywords" content="PC parts, computer components, gaming PC, custom build, CPU, GPU, motherboard, RAM, SSD, power supply, case, cooling">
    <meta name="author" content="WafiTechParts">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="WafiTechParts - Custom PC Parts & Builds">
    <meta property="og:description" content="Premium computer components for gaming, workstations, and custom builds. Free shipping on orders over $100.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://myweb.cs.uwindsor.ca/~hassan95/3340-project/">
    <meta property="og:image" content="assets/images/logo.png">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="WafiTechParts - Custom PC Parts">
    <meta name="twitter:description" content="Premium computer components for your next build">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
    <link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png">
    
    <title><?php echo isset($page_title) ? $page_title . ' - WafiTechParts' : 'WafiTechParts - Custom PC Parts & Builds'; ?></title>
    
    <!-- Theme CSS -->
    <link rel="stylesheet" href="templates/<?php echo $current_theme; ?>.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    
    <!-- JavaScript -->
    <script src="assets/js/main.js" defer></script>
</head>
<body>
    <header>
        <div class="header-top">
            <div class="theme-switcher">
                <label for="theme-select">Theme:</label>
                <select id="theme-select" onchange="changeTheme(this.value)">
                    <option value="dark" <?php echo $current_theme === 'dark' ? 'selected' : ''; ?>>Dark</option>
                    <option value="light" <?php echo $current_theme === 'light' ? 'selected' : ''; ?>>Light</option>
                    <option value="gamer" <?php echo $current_theme === 'gamer' ? 'selected' : ''; ?>>Gamer</option>
                </select>
            </div>
        </div>
        
        <nav>
            <div class="nav-container">
                <div class="logo">
                    <a href="index.php">
                        <span class="logo-text">WafiTechParts</span>
                    </a>
                </div>
                
                <div class="nav-links">
                    <a href="index.php">Home</a>
                    <a href="products/index.php">Browse Parts</a>
                    <a href="products/build-calculator.php">Build Calculator</a>
                    <a href="about.php">About</a>
                    <a href="contact.php">Contact</a>
                    <a href="wiki/index.php">Help Wiki</a>
                    
                    <?php if (!isset($_SESSION['user_id'])): ?>
                        <a href="user/login.php">Login</a>
                        <a href="user/register_form.php">Register</a>
                    <?php else: ?>
                        <a href="user/profile.php">My Profile</a>
                        <a href="user/orders.php">My Orders</a>
                        <?php if (!empty($_SESSION['is_admin'])): ?>
                            <a href="admin/dashboard.php">Admin Panel</a>
                        <?php endif; ?>
                        <span class="user-welcome">Welcome, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong></span>
                        <a href="user/logout.php">Logout</a>
                    <?php endif; ?>
                </div>
                
                <div class="mobile-menu-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </nav>
    </header>
    
    <main>