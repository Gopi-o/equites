<?php
require_once 'function.php';

function getAllDiscount(){
    return query(
        "SELECT title, description, start_date, end_date, image_url FROM discount"
    );

}
?>