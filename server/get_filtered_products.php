<?php
session_start();
include('server/connection.php');

$category = $_GET['category'];

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category = ?");
$stmt->bind_param("s", $category);
$stmt->execute();
$products = $stmt->get_result();

$filteredProducts = array();
while ($row = $products->fetch_assoc()) {
    $filteredProducts[] = $row;
}

echo json_encode($filteredProducts);
?>
