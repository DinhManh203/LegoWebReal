<?php
include('../server/connection.php');

if(isset($_GET['id'])) {
    $product_id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM products WHERE product_id=?");
    $stmt->bind_param('i', $product_id);

    if($stmt->execute()) {
        header("Location: products.php"); // Redirect back to the products page
    } else {
        echo "Failed to delete product.";
    }
} else {
    header("Location: products.php"); // Redirect back to the products page if no product ID is provided
}
?>
