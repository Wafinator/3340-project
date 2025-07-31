<?php
session_start();
require_once '../includes/db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Get user's orders with pagination
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$per_page = 10;
$offset = ($page - 1) * $per_page;

$stmt = $pdo->query("SELECT COUNT(*) as total FROM orders WHERE user_id = " . $_SESSION['user_id']);
$total_orders = $stmt->fetch()['total'];
$total_pages = ceil($total_orders / $per_page);

$stmt = $pdo->prepare("
    SELECT o.*, COUNT(oi.id) as item_count, SUM(oi.quantity * oi.price) as total_amount 
    FROM orders o 
    LEFT JOIN order_items oi ON o.id = oi.order_id 
    WHERE o.user_id = ? 
    GROUP BY o.id 
    ORDER BY o.created_at DESC 
    LIMIT ? OFFSET ?
");
$stmt->execute([$_SESSION['user_id'], $per_page, $offset]);
$orders = $stmt->fetchAll();

$page_title = "My Orders";
include '../includes/header.php';
?>

<div class="container">
    <section class="orders-hero">
        <h1>My Orders</h1>
        <p class="orders-subtitle">View your complete order history</p>
    </section>

    <div class="orders-content">
        <?php if (empty($orders)): ?>
            <div class="empty-state">
                <div class="empty-icon">📦</div>
                <h2>No Orders Yet</h2>
                <p>You haven't placed any orders yet. Start shopping to see your order history here!</p>
                <a href="../products/index.php" class="btn">Browse Products</a>
            </div>
        <?php else: ?>
            <div class="orders-summary">
                <h2>Order History (<?php echo $total_orders; ?> orders)</h2>
                <p>Showing orders from newest to oldest</p>
            </div>

            <div class="orders-list">
                <?php foreach ($orders as $order): ?>
                <div class="order-card">
                    <div class="order-header">
                        <div class="order-info">
                            <h3>Order #<?php echo str_pad($order['id'], 6, '0', STR_PAD_LEFT); ?></h3>
                            <p class="order-date">Placed on <?php echo date('F j, Y \a\t g:i A', strtotime($order['created_at'])); ?></p>
                        </div>
                        <div class="order-status">
                            <span class="status-badge status-<?php echo strtolower($order['status']); ?>">
                                <?php echo ucfirst($order['status']); ?>
                            </span>
                        </div>
                    </div>

                    <div class="order-details">
                        <div class="detail-row">
                            <span class="detail-label">Items:</span>
                            <span class="detail-value"><?php echo $order['item_count']; ?> items</span>
                        </div>
                        
                        <div class="detail-row">
                            <span class="detail-label">Total Amount:</span>
                            <span class="detail-value">$<?php echo number_format($order['total_amount'], 2); ?></span>
                        </div>
                        
                        <?php if (!empty($order['shipping_address'])): ?>
                        <div class="detail-row">
                            <span class="detail-label">Shipping Address:</span>
                            <span class="detail-value"><?php echo htmlspecialchars($order['shipping_address']); ?></span>
                        </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($order['notes'])): ?>
                        <div class="detail-row">
                            <span class="detail-label">Order Notes:</span>
                            <span class="detail-value"><?php echo htmlspecialchars($order['notes']); ?></span>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="order-actions">
                        <button class="btn btn-secondary" onclick="viewOrderDetails(<?php echo $order['id']; ?>)">
                            View Details
                        </button>
                        
                        <?php if ($order['status'] === 'pending'): ?>
                        <button class="btn btn-danger" onclick="cancelOrder(<?php echo $order['id']; ?>)">
                            Cancel Order
                        </button>
                        <?php endif; ?>
                        
                        <?php if ($order['status'] === 'delivered'): ?>
                        <button class="btn btn-secondary" onclick="reorder(<?php echo $order['id']; ?>)">
                            Reorder
                        </button>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
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
        <?php endif; ?>
    </div>
</div>

<!-- Order Details Modal -->
<div id="orderModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="orderModalContent">
            <!-- Order details will be loaded here -->
        </div>
    </div>
</div>

<style>
.orders-hero {
    text-align: center;
    padding: 60px 0;
}

.orders-subtitle {
    font-size: 1.3em;
    margin: 20px 0;
    color: #ccc;
}

.orders-content {
    max-width: 1000px;
    margin: 0 auto;
    padding: 20px;
}

.empty-state {
    text-align: center;
    padding: 60px 20px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.empty-icon {
    font-size: 4em;
    margin-bottom: 20px;
}

.empty-state h2 {
    color: #64b5f6;
    margin-bottom: 15px;
}

.empty-state p {
    color: #ccc;
    margin-bottom: 30px;
}

.orders-summary {
    margin-bottom: 30px;
}

.orders-summary h2 {
    color: #64b5f6;
    margin-bottom: 10px;
}

.orders-summary p {
    color: #ccc;
}

.orders-list {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.order-card {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    padding: 25px;
    transition: all 0.3s ease;
}

.order-card:hover {
    background: rgba(255, 255, 255, 0.08);
    transform: translateY(-2px);
}

.order-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 20px;
    flex-wrap: wrap;
    gap: 15px;
}

.order-info h3 {
    color: #64b5f6;
    margin-bottom: 5px;
}

.order-date {
    color: #ccc;
    font-size: 0.9em;
}

.status-badge {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.8em;
    font-weight: bold;
    text-transform: uppercase;
}

.status-pending {
    background: #ffd93d;
    color: #333;
}

.status-processing {
    background: #64b5f6;
    color: white;
}

.status-shipped {
    background: #4ecdc4;
    color: white;
}

.status-delivered {
    background: #51cf66;
    color: white;
}

.status-cancelled {
    background: #ff6b6b;
    color: white;
}

.order-details {
    margin-bottom: 20px;
}

.detail-row {
    display: flex;
    justify-content: space-between;
    padding: 8px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.detail-row:last-child {
    border-bottom: none;
}

.detail-label {
    font-weight: bold;
    color: #ccc;
}

.detail-value {
    color: #fff;
}

.order-actions {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.pagination {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 40px;
    flex-wrap: wrap;
}

/* Modal Styles */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
}

.modal-content {
    background: #1a1a1a;
    margin: 5% auto;
    padding: 30px;
    border-radius: 10px;
    width: 90%;
    max-width: 600px;
    max-height: 80vh;
    overflow-y: auto;
    position: relative;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
    position: absolute;
    right: 20px;
    top: 15px;
}

.close:hover {
    color: #64b5f6;
}

@media (max-width: 768px) {
    .order-header {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .order-actions {
        flex-direction: column;
    }
    
    .detail-row {
        flex-direction: column;
        gap: 5px;
    }
    
    .modal-content {
        width: 95%;
        margin: 10% auto;
    }
}
</style>

<script>
// Modal functionality
const modal = document.getElementById('orderModal');
const closeBtn = document.getElementsByClassName('close')[0];

closeBtn.onclick = function() {
    modal.style.display = 'none';
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}

function viewOrderDetails(orderId) {
    // In a real application, you would fetch order details via AJAX
    // For now, we'll show a placeholder
    document.getElementById('orderModalContent').innerHTML = `
        <h2>Order #${orderId.toString().padStart(6, '0')} Details</h2>
        <p>This would show detailed order information including all items, prices, and shipping details.</p>
        <p>In a real application, this would be populated with actual order data from the database.</p>
    `;
    modal.style.display = 'block';
}

function cancelOrder(orderId) {
    if (confirm('Are you sure you want to cancel this order?')) {
        // In a real application, you would send an AJAX request to cancel the order
        alert('Order cancellation functionality would be implemented here.');
    }
}

function reorder(orderId) {
    if (confirm('Would you like to reorder the items from this order?')) {
        // In a real application, you would add the items to cart
        alert('Reorder functionality would be implemented here.');
    }
}
</script>

<?php include '../includes/footer.php'; ?>
