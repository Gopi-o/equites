<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/function.php';

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$productId = (int)($input['product_id'] ?? 0);

if ($productId <= 0) {
    echo json_encode(['success' => false, 'message' => 'Неверный ID товара']);
    exit;
}

try {
    if (isLoggedIn()) {
        $userId = $_SESSION['id_user'];
        $order = query("SELECT order_id, items FROM orders WHERE user_id = ? AND status = 'корзина' LIMIT 1", [$userId]);
        
        if (!$order) {
            throw new Exception('Корзина не найдена');
        }
        
        $cart = json_decode($order[0]['items'], true);
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            
            $total = calculateCartTotal($cart);
            $itemsJson = json_encode($cart);
            
            make("UPDATE orders SET items = ?, total = ?, updated_at = NOW() WHERE order_id = ?", 
                [$itemsJson, $total, $order[0]['order_id']]);
        }
    } else {
        if (isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
        }
    }
    
    echo json_encode([
        'success' => true,
        'cart_total' => countCartItems($cart ?? []),
        'message' => 'Товар удален из корзины'
    ]);
    
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
