<?php

require_once 'function.php';

function getAllReviews() {
    return query("
        SELECT user_name, rating, comment, created_at 
        FROM reviews 
        ORDER BY created_at DESC
    ");
}


function addReview($email, $phone, $user_name, $rating, $comment) {
    return make(
        "INSERT INTO reviews (email, phone, user_name, rating, comment, created_at, is_approved) 
         VALUES (?, ?, ?, ?, ?, CURDATE(), 0)",
        [$email, $phone, $user_name, $rating, $comment]
    );
}
?>