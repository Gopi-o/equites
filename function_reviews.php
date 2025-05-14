<?php

require_once 'function.php';

function getAllReviews() {
    return query("
        SELECT user_name, rating, comment, created_at 
        FROM reviews 
        ORDER BY created_at DESC
    ");

}
?>