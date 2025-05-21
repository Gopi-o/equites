<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/function.php');

redirectIfNotLoggedIn();
redirectIfNotAdmin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /pages/admin/admin-contact.php');
    exit;
}

$id = $_POST['id'] ?? 0;
if (!is_numeric($id)) {
    $_SESSION['admin_error'] = 'Неверный идентификатор';
    header('Location: /pages/admin/admin-contact.php');
    exit;
}

if (make("DELETE FROM contact_inform WHERE id = ?", [$id])) {
    $_SESSION['admin_message'] = 'Контакт удален';
} else {
    $_SESSION['admin_error'] = 'Ошибка при удалении контакта';
}

header('Location: /pages/admin/admin-contact.php');
exit;
?>