<?php
require_once 'function.php';

function addContact($email, $user_name, $comment) {
    return make(
        "INSERT INTO contact (email, user_name, comment, created_at) 
         VALUES (?, ?, ?, NOW())",
        [$email, $user_name, $comment]
    );
}
?>