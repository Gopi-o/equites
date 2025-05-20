<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/function.php');

redirectIfNotLoggedIn();
redirectIfNotAdmin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /pages/admin/admin-novelties.php');
    exit;
}

$title = validate($_POST['title'] ?? '');
$description = validate($_POST['description'] ?? '');

if (empty($title)) {
    $_SESSION['admin_error'] = 'Заголовок обязателен';
    header('Location: /pages/admin/admin-novelties.php');
    exit;
}

if (make("INSERT INTO novelties (title, description, date) VALUES (?, ?, NOW())", [$title, $description])) {
    $_SESSION['admin_message'] = 'Новинка добавлена';
} else {
    $_SESSION['admin_error'] = 'Ошибка при добавлении новинки';
}

header('Location: /pages/admin/admin-novelties.php');
exit;
?>