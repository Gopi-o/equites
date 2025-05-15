<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/function.php';
    
    $name = validate($_POST['name']);
    $last_name = validate($_POST['last_name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $phone = validate($_POST['phone'] ?? '');

    $existingUser = getUserByEmail($email);
    if ($existingUser) {
        echo json_encode(['success' => false, 'message' => 'Пользователь с таким email уже существует']);
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $result = make(
        "INSERT INTO users (name, last_name, email, password, phone, role, registration_date) 
        VALUES (?, ?, ?, ?, ?, 'user', NOW())",
        [$name, $last_name, $email, $hashedPassword, $phone]
    );

    if ($result) {
        $userId = connect()->lastInsertId();
        $_SESSION['id_user'] = $userId;
        $_SESSION['user_name'] = $name;
        $_SESSION['user_email'] = $email;
        $_SESSION['is_admin'] = false;
        
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Ошибка при регистрации']);
    }
?>