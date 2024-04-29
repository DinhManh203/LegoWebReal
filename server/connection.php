<?php

$conn = mysqli_connect("localhost","root","","php_legoweb_project")
        or die("Couldn't connect to database");



// function getAllProducts(){
//         $conn = connect();
//         $res = $mysqli->query("SELECT * FROM products ORDER BY RAND() ");
//         while($row = $res->fetch_assoc()){
//                 $products[] = $row;
//         }
//         return $products;
// }

// function getProductsByCategory($category){
//         $conn = connect();
//         $res = $mysqli->query("SELECT * FROM products WHERE product_category = '$category'");
//         while($row = $res->fetch_assoc()){
//                 $products[] = $row;
//         }
//         return $products;
// }
?>