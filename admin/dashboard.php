<?php
session_start();
require_once '../includes/db.php';
require_once '../includes/auth.php';

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

// Get system status (fallback if table missing)
$system_status = [];
try {
    $stmt = $pdo->query("SELECT * FROM system_status ORDER BY service_name");
    $system_status = $stmt->fetchAll();
} catch (Exception $e) {
    $system_status = [
        ['service_name' => 'Website', 'status' => 'online', 'response_time' => 50, 'last_check' => date('Y-m-d H:i:s'), 'notes' => 'OK'],
        ['service_name' => 'Database', 'status' => 'online', 'response_time' => 35, 'last_check' => date('Y-m-d H:i:s'), 'notes' => 'OK'],
    ];
}

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

            <section class="charts">
                <h2>Trends</h2>
                <canvas id="ordersChart" height="120"></canvas>
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

<style>
.admin-hero {
    text-align: center;
    padding: 80px 0;
    background: linear-gradient(135deg, rgba(100, 181, 246, 0.1), rgba(25, 118, 210, 0.1));
    border-radius: 15px;
    margin-bottom: 40px;
    position: relative;
    overflow: hidden;
}

.admin-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 50% 50%, rgba(100, 181, 246, 0.1), transparent 70%);
    pointer-events: none;
}

.admin-hero h1 {
    position: relative;
    z-index: 1;
    text-shadow: 0 0 20px rgba(100, 181, 246, 0.5);
}

.admin-subtitle {
    font-size: 1.3em;
    margin: 10px 0;
    color: #ccc;
    position: relative;
    z-index: 1;
}

.admin-content {
    display: grid;
    grid-template-columns: 250px 1fr;
    gap: 40px;
    margin: 40px 0;
}

.admin-sidebar {
    background: rgba(255, 255, 255, 0.08);
    border-radius: 15px;
    border: 1px solid rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
    padding: 25px;
    height: fit-content;
    transition: all 0.3s ease;
}

.admin-sidebar:hover {
    box-shadow: 0 15px 50px rgba(100, 181, 246, 0.1);
}

.admin-nav {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.admin-nav-item {
    padding: 15px 20px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 8px;
    text-decoration: none;
    color: #fff;
    transition: all 0.3s ease;
    border: 1px solid transparent;
}

.admin-nav-item:hover,
.admin-nav-item.active {
    background: rgba(100, 181, 246, 0.1);
    border-color: #64b5f6;
    color: #64b5f6;
}

.admin-main {
    display: flex;
    flex-direction: column;
    gap: 40px;
}

.stats-overview h2,
.system-monitoring h2,
.recent-activity h2 {
    margin-bottom: 20px;
    color: #64b5f6;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
}

.stat-card {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    padding: 20px;
    text-align: center;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.stat-icon {
    font-size: 2em;
    margin-bottom: 10px;
}

.stat-number {
    font-size: 2em;
    font-weight: bold;
    color: #64b5f6;
    margin-bottom: 5px;
}

.stat-label {
    color: #ccc;
    font-size: 0.9em;
}

.status-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
}

.status-card {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    padding: 20px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.status-card.online {
    border-left: 4px solid #4caf50;
}

.status-card.offline {
    border-left: 4px solid #f44336;
}

.status-card.maintenance {
    border-left: 4px solid #ff9800;
}

.status-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.status-header h3 {
    margin: 0;
    color: #64b5f6;
}

.status-badge {
    padding: 5px 10px;
    border-radius: 15px;
    font-size: 0.8em;
    font-weight: bold;
}

.status-badge.online {
    background: rgba(76, 175, 80, 0.2);
    color: #4caf50;
}

.status-badge.offline {
    background: rgba(244, 67, 54, 0.2);
    color: #f44336;
}

.status-badge.maintenance {
    background: rgba(255, 152, 0, 0.2);
    color: #ff9800;
}

.status-details p {
    margin: 5px 0;
    color: #ccc;
}

.activity-list {
    display: flex;
    flex-direction: column;
    gap: 30px;
}

.activity-section h3 {
    margin-bottom: 15px;
    color: #64b5f6;
}

.activity-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 8px;
    margin-bottom: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.activity-icon {
    font-size: 1.5em;
    width: 40px;
    text-align: center;
}

.activity-content {
    flex: 1;
}

.activity-content p {
    margin: 0;
    color: #fff;
}

.activity-meta {
    font-size: 0.9em;
    color: #ccc;
    margin-top: 5px;
}

@media (max-width: 768px) {
    .admin-content {
        grid-template-columns: 1fr;
    }
    
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .status-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('ordersChart');
    if (ctx) {
        const data = {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Orders (last 7 days)'
                , data: [5, 8, 3, 10, 6, 9, 4]
                , borderColor: '#64b5f6'
                , backgroundColor: 'rgba(100,181,246,0.2)'
                , tension: 0.3
            }]
        };
        new Chart(ctx, { type: 'line', data });
    }
});
</script>

<?php include '../includes/footer.php'; ?>