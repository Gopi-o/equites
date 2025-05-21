<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/function.php');

redirectIfNotLoggedIn();
redirectIfNotAdmin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /pages/admin/admin-users.php');
    exit;
}

$userId = $_POST['user_id'] ?? null;

if (!$userId) {
    $_SESSION['admin_error'] = 'Некорректные данные';
    header('Location: /pages/admin/admin-users.php');
    exit;
}

if ($userId == $_SESSION['id_user']) {
    $_SESSION['admin_error'] = 'Вы не можете удалить себя';
    header('Location: /pages/admin/admin-users.php');
    exit;
}

if (make("DELETE FROM users WHERE user_id = ?", [$userId])) {
    $_SESSION['admin_message'] = 'Пользователь успешно удален';
} else {
    $_SESSION['admin_error'] = 'Ошибка при удалении пользователя';
}

header('Location: /pages/admin/admin-users.php');
exit;