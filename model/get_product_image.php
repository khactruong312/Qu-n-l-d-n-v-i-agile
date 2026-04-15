<?php
require_once "pdo.php";

header('Content-Type: application/json');

$product_id = $_GET['product_id'] ?? 0;

if (!$product_id) {
    echo json_encode(['image' => null]);
    exit;
}

$sql = "SELECT image_url FROM images WHERE product_id = '$product_id' LIMIT 1";
$result = pdo_query_one($sql);

if ($result) {
    echo json_encode(['image' => $result['image_url']]);
} else {
    echo json_encode(['image' => null]);
}
?>