<?php
session_start();
require_once 'includes/db.php';
$page_title = 'Your Cart';
include 'includes/header.php';

$cart = $_SESSION['cart'] ?? [];
$total = 0.0;
foreach ($cart as $item) {
    $total += ((float)$item['price']) * ((int)$item['quantity']);
}
?>

<div class="container">
    <section class="cart-hero">
        <h1>Your Shopping Cart</h1>
        <p class="cart-subtitle">Review your items and proceed to checkout</p>
    </section>

    <div class="cart-content">
        <?php if (empty($cart)): ?>
            <div class="empty-state">
                <div class="empty-icon">🛒</div>
                <h2>Your cart is empty</h2>
                <a href="products/index.php" class="btn">Browse Products</a>
            </div>
        <?php else: ?>
            <div class="cart-items">
                <?php foreach ($cart as $item): ?>
                <div class="cart-item" data-id="<?php echo (int)$item['product_id']; ?>">
                    <div class="cart-item-info">
                        <img src="assets/images/<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" onerror="this.src='assets/images/placeholder.jpg'">
                        <div>
                            <h3><?php echo htmlspecialchars($item['name']); ?></h3>
                            <div class="price">$<?php echo number_format($item['price'], 2); ?></div>
                        </div>
                    </div>
                    <div class="cart-item-actions">
                        <input type="number" class="qty" value="<?php echo (int)$item['quantity']; ?>" min="1">
                        <button class="btn btn-secondary update-item">Update</button>
                        <button class="btn btn-danger remove-item">Remove</button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="cart-summary">
                <div class="summary-row"><span>Subtotal</span><span id="subtotal">$<?php echo number_format($total, 2); ?></span></div>
                <div class="summary-row"><span>Tax (13%)</span><span id="tax">$<?php echo number_format($total * 0.13, 2); ?></span></div>
                <div class="summary-row total"><span>Total</span><span id="grand-total">$<?php echo number_format($total * 1.13, 2); ?></span></div>
                <a href="checkout.php" class="btn">Proceed to Checkout</a>
                <button id="clear-cart" class="btn btn-secondary">Clear Cart</button>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    function post(action, productId, quantity) {
        const params = new URLSearchParams();
        params.append('action', action);
        if (productId !== undefined) params.append('product_id', productId);
        if (quantity !== undefined) params.append('quantity', quantity);
        return fetch('user/manage_cart.php', { method: 'POST', headers: { 'Content-Type': 'application/x-www-form-urlencoded' }, body: params.toString() })
            .then(r => r.json());
    }

    document.querySelectorAll('.update-item').forEach(btn => {
        btn.addEventListener('click', function() {
            const item = this.closest('.cart-item');
            const id = item.dataset.id;
            const qty = item.querySelector('.qty').value;
            post('update', id, qty).then(() => location.reload());
        });
    });

    document.querySelectorAll('.remove-item').forEach(btn => {
        btn.addEventListener('click', function() {
            const item = this.closest('.cart-item');
            const id = item.dataset.id;
            post('remove', id).then(() => location.reload());
        });
    });

    const clearBtn = document.getElementById('clear-cart');
    if (clearBtn) {
        clearBtn.addEventListener('click', function() {
            post('clear').then(() => location.reload());
        });
    }
});
</script>

<style>
.cart-content { display: grid; grid-template-columns: 1fr 350px; gap: 30px; margin: 40px 0; }
.cart-item { display: flex; justify-content: space-between; align-items: center; padding: 15px; background: rgba(255,255,255,0.05); border-radius: 10px; margin-bottom: 10px; }
.cart-item-info { display: flex; gap: 15px; align-items: center; }
.cart-item img { width: 80px; height: 80px; object-fit: cover; border-radius: 8px; }
.cart-item-actions { display: flex; gap: 10px; align-items: center; }
.cart-summary { background: rgba(255,255,255,0.05); padding: 20px; border-radius: 10px; height: fit-content; position: sticky; top: 20px; }
.summary-row { display: flex; justify-content: space-between; margin-bottom: 10px; }
.summary-row.total { font-weight: bold; color: #64b5f6; }
.cart-hero { text-align: center; padding: 60px 0; }
.cart-badge { background:#64b5f6; color:#fff; padding:2px 8px; border-radius:12px; font-size:12px; margin-left:6px; }
@media (max-width: 900px) { .cart-content { grid-template-columns: 1fr; } }
</style>

<?php include 'includes/footer.php'; ?>

