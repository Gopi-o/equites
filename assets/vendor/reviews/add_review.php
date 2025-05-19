<?php
error_reporting(E_ALL);
ini_set('display_errors', 0); // Отключаем вывод ошибок на экран
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");

// Убедитесь, что нет никакого вывода перед этим

require_once $_SERVER['DOCUMENT_ROOT'] . '/function.php';

function addReview($email, $phone, $user_name, $rating, $comment) {
    $sql = "INSERT INTO reviews (user_id, user_name, rating, comment, created_at) 
            VALUES ((SELECT user_id FROM users WHERE email = ?), ?, ?, ?, CURDATE())";
    return make($sql, [$email, $user_name, $rating, $comment]);
}

try {
    // Получаем и проверяем входные данные
    $input = json_decode(file_get_contents('php://input'), true);
    if (json_last_error() !== JSON_ERROR_NONE || !$input) {
        throw new Exception('Неверный формат данных');
    }

    // Валидация обязательных полей
    $required = ['email', 'user_name', 'comment', 'rating'];
    foreach ($required as $field) {
        if (empty($input[$field])) {
            throw new Exception("Поле {$field} обязательно для заполнения");
        }
    }

    // Обработка данных
    $email = filter_var($input['email'], FILTER_SANITIZE_EMAIL);
    $phone = preg_replace('/[^0-9+]/', '', $input['phone'] ?? '');
    $user_name = htmlspecialchars($input['user_name']);
    $comment = htmlspecialchars($input['comment']);
    $rating = (int)$input['rating'];

    // Дополнительные проверки
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Некорректный email');
    }

    if ($rating < 1 || $rating > 5) {
        throw new Exception('Рейтинг должен быть от 1 до 5');
    }

    // Добавление отзыва
    $success = addReview($email, $phone, $user_name, $rating, $comment);

    echo json_encode([
        'success' => $success,
        'message' => $success ? 'Отзыв успешно добавлен' : 'Ошибка при сохранении отзыва'
    ]);
    exit;

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
    exit;
}