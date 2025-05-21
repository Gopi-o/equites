<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/function.php'; 
header('Content-Type: application/json');

if (!isset($_GET['id'])) {
    echo json_encode(['error' => 'ID not provided']);
    exit;
}

$id = (int)$_GET['id'];
$pdo = connect(); // Получаем соединение с БД
$stmt = $pdo->prepare("SELECT discount_id, title, description, details, `how_to_use`, `conditions`, start_date, end_date FROM discount WHERE discount_id = ?");
$stmt->execute([$id]);
$discount = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$discount) {
    echo json_encode(['error' => 'Discount not found']);
    exit;
}

echo json_encode([
    'title' => $discount['title'],
    'description' => $discount['description'],
    'start_date' => $discount['start_date'],
    'end_date' => $discount['end_date'],
    'details' => $discount['details'],
    'how_to_use' => $discount['how_to_use'],
    'conditions' => $discount['conditions']
]);
?>