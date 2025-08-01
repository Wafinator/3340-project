<?php
session_start();
// Static data for myweb hosting

// Check if user is logged in and is admin
if (!isset($_SESSION['user_id']) || empty($_SESSION['is_admin'])) {
    header("Location: ../user/login.php");
    exit;
}

// Handle settings updates
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    switch ($action) {
        case 'update_site_settings':
            // Update site settings (in a real app, you'd store these in a settings table)
            $_SESSION['admin_message'] = "Site settings updated successfully.";
            break;
            
        case 'update_admin_profile':
            $new_email = trim($_POST['email'] ?? '');
            $current_password = $_POST['current_password'] ?? '';
            $new_password = $_POST['new_password'] ?? '';
            
            // Demo mode - simulate profile update for myweb hosting
            $_SESSION['admin_message'] = "Admin profile updated successfully! (Demo mode - not permanently saved)";
            }
            break;
            
        case 'clear_cache':
            // Clear any cached data (in a real app, you'd implement actual cache clearing)
            $_SESSION['admin_message'] = "Cache cleared successfully.";
            break;
    }
    
    header("Location: settings.php");
    exit;
}

// Get current admin user data
// Demo admin user details for myweb hosting
$admin_user = [
    'id' => $_SESSION['user_id'] ?? 1,
    'username' => $_SESSION['username'] ?? 'admin',
    'email' => 'admin@wafitechparts.com',
    'created_at' => '2024-01-01'
];

$page_title = "Admin Settings";
include '../includes/header.php';
?>

<div class="container">
    <section class="admin-hero">
        <h1>Admin Settings</h1>
        <p class="admin-subtitle">Manage system settings and admin preferences</p>
    </section>

    <div class="admin-content">
        <div class="admin-sidebar">
            <nav class="admin-nav">
                <a href="dashboard.php" class="admin-nav-item">Dashboard</a>
                <a href="manage-products.php" class="admin-nav-item">Manage Products</a>
                <a href="manage-users.php" class="admin-nav-item">Manage Users</a>
                <a href="settings.php" class="admin-nav-item active">Settings</a>
                <a href="../user/logout.php" class="admin-nav-item">Logout</a>
            </nav>
        </div>

        <div class="admin-main">
            <?php if (isset($_SESSION['admin_message'])): ?>
                <div class="alert alert-success"><?php echo $_SESSION['admin_message']; unset($_SESSION['admin_message']); ?></div>
            <?php endif; ?>
            
            <?php if (isset($_SESSION['admin_error'])): ?>
                <div class="alert alert-error"><?php echo $_SESSION['admin_error']; unset($_SESSION['admin_error']); ?></div>
            <?php endif; ?>

            <div class="settings-grid">
                <!-- Site Settings -->
                <section class="settings-section">
                    <h2>Site Settings</h2>
                    <form method="post" class="settings-form">
                        <input type="hidden" name="action" value="update_site_settings">
                        
                        <div class="form-group">
                            <label for="site_name">Site Name</label>
                            <input type="text" id="site_name" name="site_name" value="WafiTechParts" readonly>
                            <small>Site name is currently hardcoded</small>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_description">Site Description</label>
                            <textarea id="site_description" name="site_description" rows="3" readonly>Your one-stop shop for custom PC parts and builds</textarea>
                            <small>Description is currently hardcoded</small>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact_email">Contact Email</label>
                            <input type="email" id="contact_email" name="contact_email" value="info@wafitechparts.com" readonly>
                            <small>Contact email is currently hardcoded</small>
                        </div>
                        
                        <button type="submit" class="btn">Update Site Settings</button>
                    </form>
                </section>

                <!-- Admin Profile -->
                <section class="settings-section">
                    <h2>Admin Profile</h2>
                    <form method="post" class="settings-form">
                        <input type="hidden" name="action" value="update_admin_profile">
                        
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" value="<?php echo htmlspecialchars($admin_user['username']); ?>" readonly>
                            <small>Username cannot be changed</small>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($admin_user['email']); ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input type="password" id="current_password" name="current_password" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="new_password">New Password (leave blank to keep current)</label>
                            <input type="password" id="new_password" name="new_password">
                        </div>
                        
                        <button type="submit" class="btn">Update Profile</button>
                    </form>
                </section>

                <!-- System Information -->
                <section class="settings-section">
                    <h2>System Information</h2>
                    <div class="info-grid">
                        <div class="info-item">
                            <strong>PHP Version:</strong>
                            <span><?php echo phpversion(); ?></span>
                        </div>
                        
                        <div class="info-item">
                            <strong>MySQL Version:</strong>
                            <span>Demo Mode 1.0 (myweb hosting)</span>
                        </div>
                        
                        <div class="info-item">
                            <strong>Server Software:</strong>
                            <span><?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown'; ?></span>
                        </div>
                        
                        <div class="info-item">
                            <strong>Upload Max Size:</strong>
                            <span><?php echo ini_get('upload_max_filesize'); ?></span>
                        </div>
                        
                        <div class="info-item">
                            <strong>Memory Limit:</strong>
                            <span><?php echo ini_get('memory_limit'); ?></span>
                        </div>
                        
                        <div class="info-item">
                            <strong>Max Execution Time:</strong>
                            <span><?php echo ini_get('max_execution_time'); ?> seconds</span>
                        </div>
                    </div>
                    
                    <form method="post" style="margin-top: 20px;">
                        <input type="hidden" name="action" value="clear_cache">
                        <button type="submit" class="btn btn-secondary">Clear Cache</button>
                    </form>
                </section>

                <!-- Database Status -->
                <section class="settings-section">
                    <h2>Database Status</h2>
                    <?php
                    try {
                        $tables = ['users', 'products', 'orders', 'order_items', 'contact_messages', 'system_status'];
                        $status = [];
                        
                        foreach ($tables as $table) {
                                                // Demo table counts for myweb hosting
                    $counts = ['users' => 42, 'products' => 6, 'orders' => 18, 'contact_messages' => 5];
                    $count = $counts[$table] ?? 0;
                            $status[$table] = $count;
                        }
                    ?>
                    
                    <div class="db-status">
                        <?php foreach ($status as $table => $count): ?>
                        <div class="status-item">
                            <span class="status-label"><?php echo ucfirst($table); ?>:</span>
                            <span class="status-value"><?php echo $count; ?> records</span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <div class="db-actions">
                        <a href="../check-database.php" class="btn btn-secondary" target="_blank">Run Database Check</a>
                    </div>
                    
                    <?php } catch (Exception $e) { ?>
                        <div class="alert alert-error">
                            Database connection error: <?php echo $e->getMessage(); ?>
                        </div>
                    <?php } ?>
                </section>
            </div>
        </div>
    </div>
</div>

<style>
.admin-content {
    display: grid;
    grid-template-columns: 250px 1fr;
    gap: 30px;
    margin-top: 30px;
}

.admin-sidebar {
    background: rgba(255, 255, 255, 0.05);
    padding: 20px;
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    height: fit-content;
}

.admin-nav {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.admin-nav-item {
    padding: 12px 15px;
    text-decoration: none;
    color: #ccc;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.admin-nav-item:hover {
    background: rgba(100, 181, 246, 0.1);
    color: #64b5f6;
}

.admin-nav-item.active {
    background: #64b5f6;
    color: white;
}

.admin-main {
    background: rgba(255, 255, 255, 0.05);
    padding: 30px;
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.settings-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 30px;
}

.settings-section {
    background: rgba(255, 255, 255, 0.03);
    padding: 25px;
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.05);
}

.settings-section h2 {
    color: #64b5f6;
    margin-bottom: 20px;
    font-size: 1.3em;
}

.settings-form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.form-group label {
    font-weight: bold;
    color: #ccc;
}

.form-group input,
.form-group textarea {
    padding: 10px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 5px;
    background: rgba(255, 255, 255, 0.05);
    color: #fff;
}

.form-group input:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #64b5f6;
}

.form-group small {
    color: #888;
    font-size: 0.9em;
}

.info-grid {
    display: grid;
    gap: 10px;
}

.info-item {
    display: flex;
    justify-content: space-between;
    padding: 10px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 5px;
}

.status-item {
    display: flex;
    justify-content: space-between;
    padding: 8px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.status-label {
    font-weight: bold;
    color: #ccc;
}

.status-value {
    color: #64b5f6;
}

.db-actions {
    margin-top: 20px;
}

.alert {
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 20px;
}

.alert-success {
    background: rgba(81, 207, 102, 0.1);
    border: 1px solid #51cf66;
    color: #51cf66;
}

.alert-error {
    background: rgba(255, 107, 107, 0.1);
    border: 1px solid #ff6b6b;
    color: #ff6b6b;
}

@media (max-width: 768px) {
    .admin-content {
        grid-template-columns: 1fr;
    }
    
    .settings-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<?php include '../includes/footer.php'; ?>
