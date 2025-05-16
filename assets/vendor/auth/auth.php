<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/function.php';

    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    $user = getUserByEmail($email);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['id_user'] = $user['user_id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['is_admin'] = $user['role'] === 'admin';
        
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Неверный email или пароль']);
    }
?>