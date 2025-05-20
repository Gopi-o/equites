<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/function.php';


if (!isLoggedIn()) {
    echo json_encode(['success' => false, 'message' => 'Пользователь не авторизован']);
    exit;
}

$users = query("SELECT user_id, name, email, role, registration_date FROM users ORDER BY user_id DESC");


if (!$user[0]['is_admin']) {
    die(json_encode(['success' => false, 'message' => 'Недостаточно прав']));
}

$users = query("SELECT id_user, name, login, is_admin FROM user ORDER BY id_user DESC");
echo json_encode(['success' => true, 'users' => $users]);
?>