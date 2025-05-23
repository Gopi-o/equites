<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/function.php');

redirectIfNotLoggedIn();
redirectIfNotAdmin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /pages/admin/admin-novelties.php');
    exit;
}

$id = (int)($_POST['id'] ?? 0);
$title = validate($_POST['title'] ?? '');
$description = validate($_POST['description'] ?? '');

if (empty($title)) {
    $_SESSION['admin_error'] = 'Заголовок обязателен';
} elseif ($id <= 0) {
    $_SESSION['admin_error'] = 'Неверный ID новинки';
} else {
    $linkText = "Подробнее";
    $linkUrl = "#";
    
    $sql = "UPDATE novelties SET 
            title = ?, 
            description = ?, 
            link_text = ?, 
            link_url = ?
            WHERE id = ?";
    
    if (make($sql, [$title, $description, $linkText, $linkUrl, $id])) {
        $_SESSION['admin_message'] = 'Новинка обновлена';
    } else {
        $_SESSION['admin_error'] = 'Ошибка обновления новинки';
    }
}

header('Location: /pages/admin/admin-novelties.php');
exit;
?>