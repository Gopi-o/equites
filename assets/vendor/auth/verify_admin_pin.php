<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/function.php';

if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    echo json_encode(['success' => false, 'message' => 'Доступ запрещен']);
    exit();
}

$pin = validate($_POST['pin']);

$user = query("SELECT admin_pin FROM users WHERE user_id = ?", [$_SESSION['id_user']]);
if (count($user) > 0) {
    if ($user[0]['admin_pin'] === $pin) {
        $_SESSION['admin_verified'] = true;
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Неверный пин-код']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Пользователь не найден']);
}

?>