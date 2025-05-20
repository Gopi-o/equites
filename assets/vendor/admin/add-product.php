<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/function.php');

redirectIfNotLoggedIn();
redirectIfNotAdmin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /pages/admin/admin-catalog.php');
    exit;
}

$name = validate($_POST['name'] ?? '');
$price = (float)($_POST['price'] ?? 0);
$category = validate($_POST['category'] ?? '');

if (empty($name)) {
    $_SESSION['admin_error'] = 'Название обязательно';
} elseif ($price <= 0) {
    $_SESSION['admin_error'] = 'Цена должна быть больше 0';
} else {
    $sql = "INSERT INTO products (name, price, category) VALUES (?, ?, ?)";
    if (make($sql, [$name, $price, $category])) {
        $_SESSION['admin_message'] = 'Товар добавлен';
    } else {
        $_SESSION['admin_error'] = 'Ошибка добавления';
    }
}

header('Location: /pages/admin/admin-catalog.php');
exit;