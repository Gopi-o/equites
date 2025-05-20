<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/function.php';

header('Content-Type: application/json');

if (!isLoggedIn()) {
    echo json_encode(['success' => false, 'message' => 'Для оформления заказа необходимо авторизоваться']);
    exit;
}

$userId = $_SESSION['id_user'];

try {
    // Находим корзину пользователя
    $order = query("SELECT * FROM orders WHERE user_id = ? AND status = 'корзина' LIMIT 1", [$userId]);
    
    if (!$order || empty(json_decode($order[0]['items'], true))) {
        throw new Exception('Ваша корзина пуста');
    }
    
    // Преобразуем корзину в заказ
    make("UPDATE orders SET status = 'оформлен', updated_at = NOW() WHERE order_id = ?", 
        [$order[0]['order_id']]);
    
    echo json_encode([
        'success' => true,
        'order_id' => $order[0]['order_id'],
        'message' => 'Заказ успешно оформлен'
    ]);
    
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}