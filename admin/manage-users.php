<?php
session_start();
require_once '../includes/db.php';

// Check if user is logged in and is admin
if (!isset($_SESSION['user_id']) || empty($_SESSION['is_admin'])) {
    header("Location: ../user/login.php");
    exit;
}

// Handle user actions (disable/enable, delete)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $user_id = intval($_POST['user_id'] ?? 0);
    
    switch ($action) {
        case 'toggle_status':
            try {
                // Add column if missing (may fail on older MySQL; harmless)
                $pdo->exec("ALTER TABLE users ADD COLUMN IF NOT EXISTS is_active TINYINT(1) NOT NULL DEFAULT 1");
            } catch (Exception $e) { /* ignore */ }
            try {
                $stmt = $pdo->prepare("UPDATE users SET is_active = 1 - COALESCE(is_active,1) WHERE id = ?");
                $stmt->execute([$user_id]);
                $_SESSION['admin_message'] = "User status toggled.";
            } catch (Exception $e) {
                $_SESSION['admin_error'] = "Unable to toggle status. Ensure 'is_active' column exists.";
            }
            break;
            
        case 'delete':
            // Don't allow admin to delete themselves
            if ($user_id == $_SESSION['user_id']) {
                $_SESSION['admin_error'] = "You cannot delete your own account.";
            } else {
                $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
                $stmt->execute([$user_id]);
                $_SESSION['admin_message'] = "User deleted successfully.";
            }
            break;
    }
    
    header("Location: manage-users.php");
    exit;
}

// Get all users with pagination
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$per_page = 10;
$offset = ($page - 1) * $per_page;

$stmt = $pdo->query("SELECT COUNT(*) as total FROM users");
$total_users = $stmt->fetch()['total'];
$total_pages = ceil($total_users / $per_page);

$stmt = $pdo->prepare("SELECT * FROM users ORDER BY id DESC LIMIT ? OFFSET ?");
$stmt->execute([$per_page, $offset]);
$users = $stmt->fetchAll();

$page_title = "Manage Users";
include '../includes/header.php';
?>

<div class="container">
    <section class="admin-hero">
        <h1>Manage Users</h1>
        <p class="admin-subtitle">User account administration and management</p>
    </section>

    <div class="admin-content">
        <div class="admin-sidebar">
            <nav class="admin-nav">
                <a href="dashboard.php" class="admin-nav-item">Dashboard</a>
                <a href="manage-products.php" class="admin-nav-item">Manage Products</a>
                <a href="manage-users.php" class="admin-nav-item active">Manage Users</a>
                <a href="settings.php" class="admin-nav-item">Settings</a>
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

            <section class="user-list">
                <h2>User List (<?php echo $total_users; ?> users)</h2>
                
                <div class="table-container">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo $user['id']; ?></td>
                                <td>
                                    <strong><?php echo htmlspecialchars($user['username']); ?></strong>
                                    <?php if ($user['id'] == $_SESSION['user_id']): ?>
                                        <span class="badge badge-current">You</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo htmlspecialchars($user['email']); ?></td>
                                <td>
                                    <?php if ($user['is_admin']): ?>
                                        <span class="badge badge-admin">Admin</span>
                                    <?php else: ?>
                                        <span class="badge badge-user">User</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if (!isset($user['is_active']) || $user['is_active']): ?>
                                        <span class="badge badge-active">Active</span>
                                    <?php else: ?>
                                        <span class="badge badge-inactive">Disabled</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo 'N/A'; ?></td>
                                <td class="actions">
                                    <form method="post" style="display: inline;">
                                        <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                        <input type="hidden" name="action" value="toggle_status">
                                        <button type="submit" class="btn btn-small" 
                                                onclick="return confirm('Are you sure you want to toggle this user status?')">
                                            Toggle Status
                                        </button>
                                    </form>
                                    
                                    <?php if ($user['id'] != $_SESSION['user_id']): ?>
                                    <form method="post" style="display: inline;">
                                        <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                        <input type="hidden" name="action" value="delete">
                                        <button type="submit" class="btn btn-small btn-danger" 
                                                onclick="return confirm('Are you sure you want to delete this user? This action cannot be undone.')">
                                            Delete
                                        </button>
                                    </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <?php if ($total_pages > 1): ?>
                <div class="pagination">
                    <?php if ($page > 1): ?>
                        <a href="?page=<?php echo $page - 1; ?>" class="btn btn-small">&laquo; Previous</a>
                    <?php endif; ?>
                    
                    <?php for ($i = max(1, $page - 2); $i <= min($total_pages, $page + 2); $i++): ?>
                        <a href="?page=<?php echo $i; ?>" 
                           class="btn btn-small <?php echo $i == $page ? 'active' : ''; ?>">
                            <?php echo $i; ?>
                        </a>
                    <?php endfor; ?>
                    
                    <?php if ($page < $total_pages): ?>
                        <a href="?page=<?php echo $page + 1; ?>" class="btn btn-small">Next &raquo;</a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </section>
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

.table-container {
    overflow-x: auto;
    margin-top: 20px;
}

.admin-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.admin-table th,
.admin-table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.admin-table th {
    background: rgba(100, 181, 246, 0.1);
    font-weight: bold;
    color: #64b5f6;
}

.badge {
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 0.8em;
    font-weight: bold;
}

.badge-admin {
    background: #ff6b6b;
    color: white;
}

.badge-user {
    background: #4ecdc4;
    color: white;
}

.badge-active {
    background: #51cf66;
    color: white;
}

.badge-inactive {
    background: #868e96;
    color: white;
}

.badge-current {
    background: #64b5f6;
    color: white;
}

.actions {
    display: flex;
    gap: 5px;
    flex-wrap: wrap;
}

.btn-small {
    padding: 6px 12px;
    font-size: 0.8em;
}

.btn-danger {
    background: #ff6b6b;
    color: white;
}

.btn-danger:hover {
    background: #ff5252;
}

.pagination {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 30px;
    flex-wrap: wrap;
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
    
    .admin-table {
        font-size: 0.9em;
    }
    
    .admin-table th,
    .admin-table td {
        padding: 8px 6px;
    }
    
    .actions {
        flex-direction: column;
    }
}
</style>

<?php include '../includes/footer.php'; ?>