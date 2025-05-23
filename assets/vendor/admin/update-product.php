<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/function.php');

redirectIfNotLoggedIn();
redirectIfNotAdmin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /pages/admin/admin-catalog.php');
    exit;
}

$productId = (int)($_POST['product_id'] ?? 0);
$name = validate($_POST['name'] ?? '');
$price = (float)($_POST['price'] ?? 0);
$category = validate($_POST['category'] ?? '');
$description = validate($_POST['description'] ?? '');

if (empty($name)) {
    $_SESSION['admin_error'] = 'Название обязательно';
} elseif ($price <= 0) {
    $_SESSION['admin_error'] = 'Цена должна быть больше 0';
} elseif ($productId <= 0) {
    $_SESSION['admin_error'] = 'Неверный ID товара';
} else {
    $sql = "UPDATE products SET 
            name = ?, 
            price = ?, 
            category = ?, 
            description = ?
            WHERE product_id = ?";
    
    if (make($sql, [$name, $price, $category, $description, $productId])) {
        $_SESSION['admin_message'] = 'Товар обновлен';
    } else {
        $_SESSION['admin_error'] = 'Ошибка обновления';
    }
}

header('Location: /pages/admin/admin-catalog.php');
exit;
?>