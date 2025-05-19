<?php
error_reporting(E_ALL);
ini_set('display_errors', 0); // Отключаем вывод ошибок на экран
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");

// Убедитесь, что нет никакого вывода перед этим

require_once $_SERVER['DOCUMENT_ROOT'] . '/function.php';


try {
    // Получаем данные
    $input = json_decode(file_get_contents('php://input'), true);
    if (!$input) {
        throw new Exception('Неверный формат данных');
    }

    // Валидация
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

    // Проверки
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Некорректный email');
    }

    if ($rating < 1 || $rating > 5) {
        throw new Exception('Рейтинг должен быть от 1 до 5');
    }

    // Добавление отзыва
    $success = addReview($email, $phone, $user_name, $rating, $comment);

    if ($success) {
        echo json_encode([
            'success' => true, 
            'message' => 'Отзыв успешно добавлен'
        ]);
    } else {
        throw new Exception('Ошибка при сохранении отзыва');
    }
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
    file_put_contents('debug_error.log', date('Y-m-d H:i:s') . " - " . $e->getMessage() . "\n", FILE_APPEND);
}