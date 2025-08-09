<?php
session_start();
require_once 'includes/db.php';
require_once 'includes/auth.php';

$page_title = 'Checkout';
include 'includes/header.php';

$cart = $_SESSION['cart'] ?? [];
if (empty($cart)) {
    echo '<div class="container"><p>Your cart is empty. <a href="products/index.php">Browse products</a></p></div>';
    include 'includes/footer.php';
    exit;
}

// Simple checkout: collect shipping details and create order
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $city = trim($_POST['city'] ?? '');
    $postal = trim($_POST['postal'] ?? '');
    if ($name && $address && $city && $postal) {
        try {
            $pdo->beginTransaction();
            $total = 0.0;
            foreach ($cart as $it) { $total += $it['price'] * $it['quantity']; }
            $userId = current_user_id();
            $stmt = $pdo->prepare("INSERT INTO orders (user_id, total_amount, status, shipping_address, created_at) VALUES (?, ?, 'pending', ?, NOW())");
            $addr = $name . ', ' . $address . ', ' . $city . ' ' . $postal;
            $stmt->execute([$userId, $total * 1.13, $addr]);
            $orderId = (int)$pdo->lastInsertId();

            $stmtItem = $pdo->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
            foreach ($cart as $it) {
                $stmtItem->execute([$orderId, $it['product_id'], $it['quantity'], $it['price']]);
            }
            $pdo->commit();
            $_SESSION['cart'] = [];
            header('Location: user/orders.php');
            exit;
        } catch (Exception $e) {
            if ($pdo->inTransaction()) $pdo->rollBack();
            $error = 'Checkout failed. Please try again later.';
        }
    } else {
        $error = 'Please fill all required fields.';
    }
}
?>

<div class="container">
    <section class="checkout-hero"><h1>Checkout</h1></section>

    <?php if (!empty($error)): ?>
        <div class="alert alert-error"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <div class="checkout-grid">
        <form method="post" class="checkout-form">
            <h2>Shipping Details</h2>
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city" required>
                </div>
                <div class="form-group">
                    <label for="postal">Postal Code</label>
                    <input type="text" id="postal" name="postal" required>
                </div>
            </div>
            <button type="submit" class="btn">Place Order</button>
        </form>

        <div class="order-summary">
            <h2>Order Summary</h2>
            <div class="items">
                <?php foreach ($cart as $it): ?>
                    <div class="item"><span><?php echo htmlspecialchars($it['name']); ?> × <?php echo (int)$it['quantity']; ?></span><span>$<?php echo number_format($it['price'] * $it['quantity'], 2); ?></span></div>
                <?php endforeach; ?>
            </div>
            <?php $subtotal = array_reduce($cart, fn($c,$i)=>$c+$i['price']*$i['quantity'], 0); ?>
            <div class="row"><span>Subtotal</span><span>$<?php echo number_format($subtotal,2); ?></span></div>
            <div class="row"><span>Tax (13%)</span><span>$<?php echo number_format($subtotal*0.13,2); ?></span></div>
            <div class="row total"><span>Total</span><span>$<?php echo number_format($subtotal*1.13,2); ?></span></div>
        </div>
    </div>
</div>

<style>
.checkout-grid { display:grid; grid-template-columns: 1fr 350px; gap:30px; margin:40px 0; }
.checkout-form, .order-summary { background: rgba(255,255,255,0.05); padding:20px; border-radius:10px; }
.form-row { display:grid; grid-template-columns: 1fr 1fr; gap:15px; }
.row, .item { display:flex; justify-content:space-between; margin-bottom:8px; }
.total { font-weight:bold; color:#64b5f6; }
@media (max-width: 900px) { .checkout-grid { grid-template-columns:1fr; } }
</style>

<?php include 'includes/footer.php'; ?>

