<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='LGF' LIMIT 12 ");

$stmt->execute();

$featured_products = $stmt->get_result();//[]


?>