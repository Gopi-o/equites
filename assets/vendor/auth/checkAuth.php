<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/function.php';

    echo json_encode([
    'isLoggedIn' => isLoggedIn()
]);
?>