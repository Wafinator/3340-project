<?php
session_start();
header('Content-Type: application/json');

$action = isset($_POST['action']) ? $_POST['action'] : '';
$product_id = isset($_POST['product_id']) ? (string)$_POST['product_id'] : '';

if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

switch ($action) {
    case 'update':
        $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 0;
        if ($quantity < 0) { $quantity = 0; }
        if ($product_id !== '' && isset($_SESSION['cart'][$product_id])) {
            if ($quantity === 0) {
                unset($_SESSION['cart'][$product_id]);
            } else {
                $_SESSION['cart'][$product_id]['quantity'] = $quantity;
            }
        }
        break;
    case 'remove':
        if ($product_id !== '' && isset($_SESSION['cart'][$product_id])) {
            unset($_SESSION['cart'][$product_id]);
        }
        break;
    case 'clear':
        $_SESSION['cart'] = [];
        break;
}

// Compute count and cart list
$count = 0;
$cart_list = [];
foreach ($_SESSION['cart'] as $pid => $item) {
    $qty = isset($item['quantity']) ? (int)$item['quantity'] : 0;
    $count += $qty;
    $cart_list[] = $item;
}

echo json_encode(array('success' => true, 'count' => $count, 'cart' => $cart_list));
?>

