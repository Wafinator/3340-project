<?php
/**
 * Shared site header: meta, SEO, theme, global nav.
 * Computes a relative $prefix so assets and links work from nested directories.
 */
session_start();
$current_theme = $_SESSION['theme'] ?? 'dark';

// Compute path prefix so links work from any directory
$prefix = '';
if (!file_exists(__DIR__ . '/../assets/js/main.js')) {
    // when included from root, __DIR__ is includes; assets is one level up
}
// Detect from the executing script location
if (!file_exists('assets/js/main.js')) {
    if (file_exists('../assets/js/main.js')) {
        $prefix = '../';
    } elseif (file_exists('../../assets/js/main.js')) {
        $prefix = '../../';
    }
}
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
    <meta property="og:image" content="<?php echo $prefix; ?>assets/images/logo.png">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="WafiTechParts - Custom PC Parts">
    <meta name="twitter:description" content="Premium computer components for your next build">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo $prefix; ?>assets/images/favicon.ico">
    <link rel="apple-touch-icon" href="<?php echo $prefix; ?>assets/images/apple-touch-icon.png">
    
    <title><?php echo isset($page_title) ? $page_title . ' - WafiTechParts' : 'WafiTechParts - Custom PC Parts & Builds'; ?></title>
    
    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?php echo $prefix; ?>templates/<?php echo $current_theme; ?>.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo $prefix; ?>assets/css/custom.css">
    
    <!-- JavaScript -->
    <script src="<?php echo $prefix; ?>assets/js/main.js" defer></script>
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
                    <a href="<?php echo $prefix; ?>index.php">
                        <span class="logo-text">WafiTechParts</span>
                    </a>
                </div>
                
                <div class="nav-links">
                    <a href="<?php echo $prefix; ?>index.php">Home</a>
                    <a href="<?php echo $prefix; ?>products/index.php">Browse Parts</a>
                    <a href="<?php echo $prefix; ?>products/build-calculator.php">Build Calculator</a>
                    <a href="<?php echo $prefix; ?>about.php">About</a>
                    <a href="<?php echo $prefix; ?>contact.php">Contact</a>
                    <a href="<?php echo $prefix; ?>wiki/index.php">Help Wiki</a>
                    <a href="<?php echo $prefix; ?>cart.php">Cart <span id="cart-count" class="cart-badge"><?php echo isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'quantity')) : 0; ?></span></a>
                    
                    <?php if (!isset($_SESSION['user_id'])): ?>
                        <a href="<?php echo $prefix; ?>user/login.php">Login</a>
                        <a href="<?php echo $prefix; ?>user/register_form.php">Register</a>
                    <?php else: ?>
                        <a href="<?php echo $prefix; ?>user/profile.php">My Profile</a>
                        <a href="<?php echo $prefix; ?>user/orders.php">My Orders</a>
                        <?php if (!empty($_SESSION['is_admin'])): ?>
                            <a href="<?php echo $prefix; ?>admin/dashboard.php">Admin Panel</a>
                        <?php endif; ?>
                        <span class="user-welcome">Welcome, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong></span>
                        <a href="<?php echo $prefix; ?>user/logout.php">Logout</a>
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