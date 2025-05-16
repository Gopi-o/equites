<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/function.php';

header('Content-Type: application/json');

try {
    if (isLoggedIn()) {
        $userId = $_SESSION['id_user'];
        $order = query("SELECT items, total FROM orders WHERE user_id = ? AND status = 'корзина' LIMIT 1", [$userId]);
        
        $cart = $order ? json_decode($order[0]['items'], true) : [];
        $total = $order ? $order[0]['total'] : 0;
    } else {
        $cart = $_SESSION['cart'] ?? [];
        $total = calculateCartTotal($cart);
    }
    
    $items = [];
    foreach ($cart as $item) {
        $items[] = [
            'product_id' => $item['product_id'],
            'name' => $item['name'],
            'price' => $item['price'],
            'price_formatted' => number_format($item['price'], 0, '', ' '),
            'quantity' => $item['quantity'],
            'total' => $item['price'] * $item['quantity'],
            'total_formatted' => number_format($item['price'] * $item['quantity'], 0, '', ' ')
        ];
    }
    
    echo json_encode([
        'success' => true,
        'items' => $items,
        'total' => $total,
        'total_formatted' => number_format($total, 0, '', ' '),
        'cart_total' => countCartItems($cart)
    ]);
    
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
