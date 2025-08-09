<?php
session_start();
require_once '../includes/db.php';

// Check if user is logged in and is admin
if (!isset($_SESSION['user_id']) || empty($_SESSION['is_admin'])) {
    header("Location: ../user/login.php");
    exit;
}

// Get system statistics
$stats = [];
$stmt = $pdo->query("SELECT COUNT(*) as total FROM users");
$stats['users'] = $stmt->fetch()['total'];

$stmt = $pdo->query("SELECT COUNT(*) as total FROM products");
$stats['products'] = $stmt->fetch()['total'];

$stmt = $pdo->query("SELECT COUNT(*) as total FROM orders");
$stats['orders'] = $stmt->fetch()['total'];

$stmt = $pdo->query("SELECT COUNT(*) as total FROM contact_messages WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)");
$stats['recent_messages'] = $stmt->fetch()['total'];

// Get system status
$stmt = $pdo->query("SELECT * FROM system_status ORDER BY service_name");
$system_status = $stmt->fetchAll();

$page_title = "Admin Dashboard";
include '../includes/header.php';
?>

<div class="container">
    <section class="admin-hero">
        <h1>Admin Dashboard</h1>
        <p class="admin-subtitle">Welcome back, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
    </section>

    <div class="admin-content">
        <div class="admin-sidebar">
            <nav class="admin-nav">
                <a href="dashboard.php" class="admin-nav-item active">Dashboard</a>
                <a href="manage-products.php" class="admin-nav-item">Manage Products</a>
                <a href="manage-users.php" class="admin-nav-item">Manage Users</a>
                <a href="settings.php" class="admin-nav-item">Settings</a>
                <a href="../user/logout.php" class="admin-nav-item">Logout</a>
            </nav>
        </div>

        <div class="admin-main">
            <section class="stats-overview">
                <h2>Quick Statistics</h2>
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon">👥</div>
                        <div class="stat-number"><?php echo $stats['users']; ?></div>
                        <div class="stat-label">Total Users</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">🖥️</div>
                        <div class="stat-number"><?php echo $stats['products']; ?></div>
                        <div class="stat-label">Products</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">📦</div>
                        <div class="stat-number"><?php echo $stats['orders']; ?></div>
                        <div class="stat-label">Orders</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">💬</div>
                        <div class="stat-number"><?php echo $stats['recent_messages']; ?></div>
                        <div class="stat-label">Recent Messages</div>
                    </div>
                </div>
            </section>

            <section class="system-monitoring">
                <h2>System Status</h2>
                <div class="status-grid">
                    <?php foreach ($system_status as $service): ?>
                    <div class="status-card <?php echo $service['status']; ?>">
                        <div class="status-header">
                            <h3><?php echo htmlspecialchars($service['service_name']); ?></h3>
                            <span class="status-badge <?php echo $service['status']; ?>">
                                <?php echo ucfirst($service['status']); ?>
                            </span>
                        </div>
                        <div class="status-details">
                            <p><strong>Response Time:</strong> <?php echo $service['response_time']; ?>ms</p>
                            <p><strong>Last Check:</strong> <?php echo date('M j, Y g:i A', strtotime($service['last_check'])); ?></p>
                            <?php if ($service['notes']): ?>
                            <p><strong>Notes:</strong> <?php echo htmlspecialchars($service['notes']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <section class="recent-activity">
                <h2>Recent Activity</h2>
                <div class="activity-list">
                    <?php
                    // Get recent orders
                                $stmt = $pdo->query("SELECT o.*, u.username FROM orders o LEFT JOIN users u ON o.user_id = u.id ORDER BY o.created_at DESC LIMIT 5");
            $recent_orders = $stmt->fetchAll();
                    ?>
                    
                    <div class="activity-section">
                        <h3>Recent Orders</h3>
                        <?php if (empty($recent_orders)): ?>
                            <p>No recent orders</p>
                        <?php else: ?>
                            <?php foreach ($recent_orders as $order): ?>
                            <div class="activity-item">
                                <div class="activity-icon">📦</div>
                                <div class="activity-content">
                                    <p><strong>Order #<?php echo $order['id']; ?></strong> - $<?php echo number_format($order['total_amount'], 2); ?></p>
                                    <p class="activity-meta">
                                        <?php echo $order['username'] ? 'by ' . htmlspecialchars($order['username']) : 'Guest'; ?> • 
                                        <?php echo date('M j, Y', strtotime($order['created_at'])); ?>
                                    </p>
                                </div>
                                <span class="status-badge <?php echo $order['status']; ?>"><?php echo ucfirst($order['status']); ?></span>
                            </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <?php
                    // Get recent contact messages
                                $stmt = $pdo->query("SELECT * FROM contact_messages ORDER BY created_at DESC LIMIT 5");
            $recent_messages = $stmt->fetchAll();
                    ?>
                    
                    <div class="activity-section">
                        <h3>Recent Messages</h3>
                        <?php if (empty($recent_messages)): ?>
                            <p>No recent messages</p>
                        <?php else: ?>
                            <?php foreach ($recent_messages as $message): ?>
                            <div class="activity-item">
                                <div class="activity-icon">💬</div>
                                <div class="activity-content">
                                    <p><strong><?php echo htmlspecialchars($message['subject']); ?></strong></p>
                                    <p class="activity-meta">
                                        from <?php echo htmlspecialchars($message['first_name'] . ' ' . $message['last_name']); ?> • 
                                        <?php echo date('M j, Y', strtotime($message['created_at'])); ?>
                                    </p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>



<?php include '../includes/footer.php'; ?>
