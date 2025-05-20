<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/function.php');

redirectIfNotLoggedIn();
redirectIfNotAdmin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /pages/admin/admin-novelties.php');
    exit;
}

$id = $_POST['id'] ?? 0;
if (!is_numeric($id)) {
    $_SESSION['admin_error'] = 'Неверный идентификатор';
    header('Location: /pages/admin/admin-novelties.php');
    exit;
}

if (make("DELETE FROM novelties WHERE id = ?", [$id])) {
    $_SESSION['admin_message'] = 'Новинка удалена';
} else {
    $_SESSION['admin_error'] = 'Ошибка при удалении новинки';
}

header('Location: /pages/admin/admin-novelties.php');
exit;
?>