<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/function.php');

redirectIfNotLoggedIn();
redirectIfNotAdmin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /pages/admin/admin-contact.php');
    exit;
}

$field = $_POST['field'] ?? '';
$value = validate($_POST['value'] ?? '');

$allowedFields = ['address', 'phone', 'email', 'working_hours_weekdays', 'working_hours_weekends'];
if (!in_array($field, $allowedFields)) {
    $_SESSION['admin_error'] = 'Недопустимое поле для редактирования';
    header('Location: /pages/admin/admin-contact.php');
    exit;
}

// Проверяем существование записи (используем query вместо fetch)
$exists = query("SELECT 1 FROM contact_info LIMIT 1");

if (!empty($exists)) {
    $sql = "UPDATE contact_info SET $field = ?";
} else {
    $sql = "INSERT INTO contact_info ($field) VALUES (?)";
}

if (make($sql, [$value])) {
    $_SESSION['admin_message'] = 'Контакт обновлен';
} else {
    $_SESSION['admin_error'] = 'Ошибка при обновлении';
}

header('Location: /pages/admin/admin-contact.php');
exit;
?>