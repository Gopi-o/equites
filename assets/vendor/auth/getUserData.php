<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/function.php';

    if (!isLoggedIn()) {
        echo json_encode(['success' => false, 'message' => 'Пользователь не авторизован']);
        exit;
    }

    $user = getUserById($_SESSION['id_user']);
    if (!$user) {
        echo json_encode(['success' => false, 'message' => 'Пользователь не найден']);
        exit;
    }

    echo json_encode([
        'success' => true,
        'user' => [
            'user_id' => $user['user_id'],
            'name' => $user['name'],
            'last_name' => $user['last_name'],
            'email' => $user['email'],
            'phone' => $user['phone'],
            'registration_date' => $user['registration_date'],
            'role' => $user['role']
        ]
    ]);
?>