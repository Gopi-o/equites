<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/function.php';

redirectIfNotLoggedIn();
redirectIfNotAdmin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /pages/admin/admin-users.php');
    exit;
}

$userId = $_POST['user_id'] ?? null;
$newRole = $_POST['new_role'] ?? null;

if (!$userId || !in_array($newRole, ['user', 'admin'])) {
    $_SESSION['admin_error'] = 'Некорректные данные';
    header('Location: /pages/admin/admin-users.php');
    exit;
}

if (make("UPDATE users SET role = ? WHERE user_id = ?", [$newRole, $userId])) {
    $_SESSION['admin_message'] = 'Роль пользователя успешно изменена';
} else {
    $_SESSION['admin_error'] = 'Ошибка при изменении роли пользователя';
}

header('Location: /pages/admin/admin-users.php');
exit;