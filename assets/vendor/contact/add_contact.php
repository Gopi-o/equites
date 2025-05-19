<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once $_SERVER['DOCUMENT_ROOT'] . '/function.php';

header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");

try {
    // Получаем данные
    $input = json_decode(file_get_contents('php://input'), true);
    if (!$input) {
        throw new Exception('Неверный формат данных');
    }

    // Валидация
    $required = ['name', 'email', 'comment'];
    foreach ($required as $field) {
        if (empty($input[$field])) {
            throw new Exception("Поле {$field} обязательно для заполнения");
        }
    }

    // Обработка данных
    $email = filter_var($input['email'], FILTER_SANITIZE_EMAIL);
    $user_name = htmlspecialchars($input['name']);
    $comment = htmlspecialchars($input['comment']);

    // Проверка email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Некорректный email');
    }

    // Добавление контакта
    $success = addContact($email, $user_name, $comment);

    if ($success) {
        echo json_encode([
            'success' => true, 
            'message' => 'Сообщение успешно отправлено'
        ]);
    } else {
        throw new Exception('Ошибка при сохранении сообщения');
    }
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
    file_put_contents('debug_error.log', date('Y-m-d H:i:s') . " - " . $e->getMessage() . "\n", FILE_APPEND);
}