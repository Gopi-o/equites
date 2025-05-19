<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/function.php';


$email = validate($_POST['email'] ?? '');

$userExists = getUserByEmail($email);

echo json_encode([
    'success' => true,
    'message' => 'Сообщение с инструкцией по востановлению пароля отправлена на почту'
]);