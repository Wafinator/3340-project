<?php
session_start();
require_once '../includes/db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Get user data
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

// Get user's orders (with error handling for missing tables)
$orders = [];
try {
    $stmt = $pdo->prepare("
        SELECT o.*, COUNT(oi.id) as item_count 
        FROM orders o 
        LEFT JOIN order_items oi ON o.id = oi.order_id 
        WHERE o.user_id = ? 
        GROUP BY o.id 
        ORDER BY o.id DESC
    ");
    $stmt->execute([$_SESSION['user_id']]);
    $orders = $stmt->fetchAll();
} catch (PDOException $e) {
    // If orders table doesn't exist, just use empty array
    $orders = [];
}

// Handle profile updates
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    if ($action === 'update_profile') {
        $email = trim($_POST['email'] ?? '');
        $current_password = $_POST['current_password'] ?? '';
        $new_password = $_POST['new_password'] ?? '';
        $confirm_password = $_POST['confirm_password'] ?? '';
        
        $errors = [];
        
        // Validate email
        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Please enter a valid email address.";
        }
        
        // Validate password change
        if (!empty($new_password)) {
            if (empty($current_password)) {
                $errors[] = "Current password is required to change password.";
            } elseif (!password_verify($current_password, $user['password_hash'])) {
                $errors[] = "Current password is incorrect.";
            } elseif (strlen($new_password) < 6) {
                $errors[] = "New password must be at least 6 characters long.";
            } elseif ($new_password !== $confirm_password) {
                $errors[] = "New passwords do not match.";
            }
        }
        
        if (empty($errors)) {
            try {
                $updates = [];
                $params = [];
                
                if (!empty($email)) {
                    $updates[] = "email = ?";
                    $params[] = $email;
                }
                
                if (!empty($new_password)) {
                    $updates[] = "password_hash = ?";
                    $params[] = password_hash($new_password, PASSWORD_DEFAULT);
                }
                
                if (!empty($updates)) {
                    $params[] = $_SESSION['user_id'];
                    $stmt = $pdo->prepare("UPDATE users SET " . implode(", ", $updates) . " WHERE id = ?");
                    $stmt->execute($params);
                    $success_message = "Profile updated successfully!";
                    
                    // Update session email if changed
                    if (!empty($email)) {
                        $_SESSION['email'] = $email;
                    }
                }
            } catch (PDOException $e) {
                $errors[] = "Database error: " . $e->getMessage();
            }
        }
    }
}

$page_title = "My Profile";
include '../includes/header.php';
?>

<div class="container">
    <section class="profile-hero">
        <h1>My Profile</h1>
        <p class="profile-subtitle">Manage your account and view your order history</p>
    </section>

    <div class="profile-content">
        <div class="profile-sidebar">
            <div class="user-info">
                <div class="user-avatar">👤</div>
                <h3><?php echo htmlspecialchars($user['username']); ?></h3>
                <p><?php echo htmlspecialchars($user['email']); ?></p>
                <p class="member-since">Member since <?php echo 'N/A'; ?></p>
            </div>
            
            <nav class="profile-nav">
                <a href="#profile" class="profile-nav-item active">Profile Settings</a>
                <a href="#orders" class="profile-nav-item">Order History</a>
                <a href="orders.php" class="profile-nav-item">My Orders</a>
                <a href="logout.php" class="profile-nav-item">Logout</a>
            </nav>
        </div>

        <div class="profile-main">
            <?php if (isset($success_message)): ?>
                <div class="alert alert-success"><?php echo $success_message; ?></div>
            <?php endif; ?>
            
            <?php if (!empty($errors)): ?>
                <div class="alert alert-error">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <section id="profile" class="profile-section">
                <h2>Profile Settings</h2>
                <form method="post" class="profile-form">
                    <input type="hidden" name="action" value="update_profile">
                    
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" value="<?php echo htmlspecialchars($user['username']); ?>" disabled>
                        <small>Username cannot be changed</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input type="password" id="current_password" name="current_password">
                        <small>Required only if changing password</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input type="password" id="new_password" name="new_password">
                        <small>Leave blank to keep current password</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="confirm_password">Confirm New Password</label>
                        <input type="password" id="confirm_password" name="confirm_password">
                    </div>
                    
                    <button type="submit" class="btn">Update Profile</button>
                </form>
            </section>

            <section id="orders" class="profile-section">
                <h2>Recent Orders</h2>
                
                <?php if (empty($orders)): ?>
                    <div class="empty-state">
                        <div class="empty-icon">📦</div>
                        <h3>No Orders Yet</h3>
                        <p>You haven't placed any orders yet. Start shopping to see your order history here!</p>
                        <a href="../products/index.php" class="btn">Browse Products</a>
                    </div>
                <?php else: ?>
                    <div class="orders-list">
                        <?php foreach ($orders as $order): ?>
                        <div class="order-card">
                            <div class="order-header">
                                <div class="order-info">
                                    <h3>Order #<?php echo $order['id']; ?></h3>
                                    <p class="order-date"><?php echo 'N/A'; ?></p>
                                </div>
                                <div class="order-status">
                                    <span class="status-badge <?php echo $order['status']; ?>">
                                        <?php echo ucfirst($order['status']); ?>
                                    </span>
                                </div>
                            </div>
                            
                            <div class="order-details">
                                <div class="order-summary">
                                    <p><strong>Total:</strong> $<?php echo number_format($order['total_amount'], 2); ?></p>
                                    <p><strong>Items:</strong> <?php echo $order['item_count']; ?> product(s)</p>
                                </div>
                                
                                <div class="order-actions">
                                    <a href="orders.php?id=<?php echo $order['id']; ?>" class="btn-small">View Details</a>
                                    <?php if ($order['status'] === 'pending'): ?>
                                        <button class="btn-small btn-secondary">Cancel Order</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <div class="view-all-orders">
                        <a href="orders.php" class="btn btn-secondary">View All Orders</a>
                    </div>
                <?php endif; ?>
            </section>
        </div>
    </div>
</div>

<style>
/* Profile Page - Enhanced Modern Theme */

.profile-hero {
    text-align: center;
    padding: 80px 0;
    background: linear-gradient(135deg, rgba(100, 181, 246, 0.1), rgba(25, 118, 210, 0.1));
    border-radius: 15px;
    margin-bottom: 40px;
    position: relative;
    overflow: hidden;
}

.profile-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 50% 50%, rgba(100, 181, 246, 0.1), transparent 70%);
    pointer-events: none;
}

.profile-hero h1 {
    position: relative;
    z-index: 1;
    text-shadow: 0 0 20px rgba(100, 181, 246, 0.5);
}

.profile-subtitle {
    font-size: 1.3em;
    margin: 20px 0 30px;
    color: #ccc;
    position: relative;
    z-index: 1;
}

.profile-content {
    display: grid;
    grid-template-columns: 300px 1fr;
    gap: 40px;
    margin: 40px 0;
    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
    padding: 0 20px;
}

.profile-sidebar {
    background: rgba(255, 255, 255, 0.08);
    border-radius: 15px;
    border: 1px solid rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
    padding: 30px;
    height: fit-content;
    transition: all 0.3s ease;
}

.profile-sidebar:hover {
    box-shadow: 0 15px 50px rgba(100, 181, 246, 0.1);
}

.user-info {
    text-align: center;
    padding: 30px 20px;
    background: rgba(255, 255, 255, 0.08);
    border-radius: 15px;
    border: 1px solid rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    margin-bottom: 30px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.user-info::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, #64b5f6, #1976d2, #64b5f6);
    opacity: 0.8;
}

.user-info:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(100, 181, 246, 0.2);
}

.user-avatar {
    font-size: 3em;
    margin-bottom: 20px;
}

.user-info h3 {
    margin-bottom: 15px;
    color: #64b5f6;
}

.user-info p {
    margin: 5px 0;
    color: #ccc;
}

.member-since {
    font-size: 0.9em;
    color: #888;
}

.profile-nav {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.profile-nav-item {
    padding: 12px 15px;
    text-decoration: none;
    color: #ccc;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.profile-nav-item:hover {
    background: rgba(100, 181, 246, 0.1);
    color: #64b5f6;
}

.profile-nav-item.active {
    background: #64b5f6;
    color: white;
}

.profile-main {
    display: flex;
    flex-direction: column;
    gap: 40px;
}

.profile-section h2 {
    color: #64b5f6;
    margin-bottom: 30px;
    font-size: 1.8em;
}

.profile-form {
    max-width: 600px;
    margin: 0;
    padding: 30px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.profile-form .form-group {
    margin-bottom: 20px;
}

.profile-form .form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #64b5f6;
}

.profile-form .form-group input,
.profile-form .form-group select,
.profile-form .form-group textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #444;
    border-radius: 5px;
    background: rgba(255, 255, 255, 0.1);
    color: #fff;
    font-size: 16px;
}

.profile-form .form-group input:focus,
.profile-form .form-group select:focus,
.profile-form .form-group textarea:focus {
    outline: none;
    border-color: #64b5f6;
    box-shadow: 0 0 10px rgba(100, 181, 246, 0.3);
}

.profile-form small {
    color: #888;
    font-size: 0.9em;
}

/* Use consistent button styling from main site */
.profile-form .btn {
    background: linear-gradient(45deg, #64b5f6, #1976d2);
    color: white;
    padding: 12px 24px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
}

.profile-form .btn:hover {
    background: linear-gradient(45deg, #1976d2, #64b5f6);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(100, 181, 246, 0.4);
}

.orders-section {
    margin: 60px 0;
}

.orders-list {
    display: grid;
    gap: 30px;
    margin-top: 40px;
}

.order-card {
    text-align: center;
    padding: 30px 20px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: transform 0.3s ease;
}

.order-card:hover {
    transform: translateY(-5px);
}

.order-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 15px;
}

.order-info h3 {
    margin: 0 0 5px 0;
    color: #64b5f6;
}

.order-date {
    margin: 0;
    color: #888;
    font-size: 0.9em;
}

.status-badge {
    padding: 5px 15px;
    border-radius: 15px;
    font-size: 0.8em;
    font-weight: bold;
}

.status-badge.pending {
    background: rgba(255, 152, 0, 0.2);
    color: #ff9800;
}

.status-badge.processing {
    background: rgba(100, 181, 246, 0.2);
    color: #64b5f6;
}

.status-badge.shipped {
    background: rgba(156, 39, 176, 0.2);
    color: #9c27b0;
}

.status-badge.delivered {
    background: rgba(76, 175, 80, 0.2);
    color: #4caf50;
}

.status-badge.cancelled {
    background: rgba(244, 67, 54, 0.2);
    color: #f44336;
}

.order-details {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.order-summary p {
    margin: 5px 0;
    color: #ccc;
}

.order-actions {
    display: flex;
    gap: 10px;
}

.btn-small {
    background: linear-gradient(45deg, #64b5f6, #1976d2);
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    font-weight: bold;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
}

.btn-small:hover {
    background: linear-gradient(45deg, #1976d2, #64b5f6);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(100, 181, 246, 0.4);
}

.btn-small.btn-secondary {
    background: linear-gradient(45deg, #666, #999);
}

.btn-small.btn-secondary:hover {
    background: linear-gradient(45deg, #999, #666);
}

.view-all-orders {
    text-align: center;
    margin-top: 40px;
}

.empty-state {
    text-align: center;
    padding: 60px 20px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.empty-icon {
    font-size: 3em;
    margin-bottom: 20px;
}

.empty-state h3 {
    margin-bottom: 15px;
    color: #64b5f6;
}

.empty-state p {
    margin: 0 0 30px 0;
    color: #ccc;
}

@media (max-width: 768px) {
    .profile-content {
        grid-template-columns: 1fr;
        gap: 30px;
        padding: 0 20px;
    }
    
    .profile-form {
        padding: 30px 20px;
    }
    
    .order-header {
        flex-direction: column;
        gap: 15px;
    }
    
    .order-details {
        flex-direction: column;
        gap: 15px;
        align-items: flex-start;
    }
    
    .order-actions {
        width: 100%;
        justify-content: flex-start;
    }
}
</style>

<script>
// Smooth scrolling for navigation
document.querySelectorAll('.profile-nav-item[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Update active nav item based on scroll position
window.addEventListener('scroll', function() {
    const sections = document.querySelectorAll('.profile-section');
    const navItems = document.querySelectorAll('.profile-nav-item[href^="#"]');
    
    let current = '';
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        if (pageYOffset >= sectionTop - 200) {
            current = section.getAttribute('id');
        }
    });
    
    navItems.forEach(item => {
        item.classList.remove('active');
        if (item.getAttribute('href') === '#' + current) {
            item.classList.add('active');
        }
    });
});
</script>

<?php include '../includes/footer.php'; ?>
