<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/function.php');

redirectIfNotLoggedIn();
redirectIfNotAdmin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /pages/admin/admin-contact.php');
    exit;
}

$name = validate($_POST['name'] ?? '');
$information = validate($_POST['information'] ?? '');

if (empty($name)) {
    $_SESSION['admin_error'] = 'Заголовок обязателен';
    header('Location: /pages/admin/admin-contact.php');
    exit;
}

if (make("INSERT INTO contact_inform (name, information) VALUES (?, ?)", [$name, $information])) {
    $_SESSION['admin_message'] = 'Контакт добавлен';
} else {
    $_SESSION['admin_error'] = 'Ошибка при добавлении контакта';
}

header('Location: /pages/admin/admin-contact.php');
exit;
?>