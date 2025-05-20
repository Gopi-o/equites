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

if ($productId > 0) {
    make("DELETE FROM products WHERE product_id = ?", [$productId]);
    $_SESSION['admin_message'] = 'Товар удален';
}

header('Location: /pages/admin/admin-catalog.php');
exit;