<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/function.php';

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$productId = (int)($input['product_id'] ?? 0);
$quantity = (int)($input['quantity'] ?? 1);

if ($productId <= 0) {
    echo json_encode(['success' => false, 'message' => 'Неверный ID товара']);
    exit;
}

try {
    // Получаем информацию о товаре
    $product = query("SELECT product_id, name, price FROM products WHERE product_id = ?", [$productId]);
    if (!$product) {
        throw new Exception('Товар не найден');
    }

    if (isLoggedIn()) {
        $userId = $_SESSION['id_user'];
        // Работа с БД для авторизованных
        $order = query("SELECT * FROM orders WHERE user_id = ? AND status = 'корзина' LIMIT 1", [$userId]);
        
        $cart = $order ? json_decode($order[0]['items'], true) : [];
        
        // Обновляем корзину
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'product_id' => $productId,
                'name' => $product[0]['name'],
                'price' => $product[0]['price'],
                'quantity' => $quantity
            ];
        }
        
        // Сохраняем в БД
        $total = calculateCartTotal($cart);
        $itemsJson = json_encode($cart);
        
        if ($order) {
            make("UPDATE orders SET items = ?, total = ?, updated_at = NOW() WHERE order_id = ?", 
                [$itemsJson, $total, $order[0]['order_id']]);
        } else {
            make("INSERT INTO orders (user_id, items, total, status) VALUES (?, ?, ?, 'корзина')", 
                [$userId, $itemsJson, $total]);
        }
    } else {
        // Работа с сессией для неавторизованных
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        
        $cart = &$_SESSION['cart'];
        
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'product_id' => $productId,
                'name' => $product[0]['name'],
                'price' => $product[0]['price'],
                'quantity' => $quantity
            ];
        }
    }
    
    echo json_encode([
        'success' => true,
        'cart_total' => countCartItems($cart),
        'message' => 'Товар добавлен в корзину'
    ]);
    
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}