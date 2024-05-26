<?php
include('../server/connection.php');

if(isset($_GET['id'])) {
    $product_id = $_GET['id'];

    if(isset($_POST['update'])) {
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_category = $_POST['product_category'];
        $product_image = $_POST['product_image'];

        $stmt = $conn->prepare("UPDATE products SET product_name=?, product_price=?, product_category=?, product_image=? WHERE product_id=?");
        $stmt->bind_param('sdssi', $product_name, $product_price, $product_category, $product_image, $product_id);

        if($stmt->execute()) {
            header("Location: products.php"); // Redirect back to the products page
        } else {
            echo "Failed to update product.";
        }
    } else {
        $stmt = $conn->prepare("SELECT * FROM products WHERE product_id=?");
        $stmt->bind_param('i', $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();
    }
} else {
    header("Location: products.php"); // Redirect back to the products page if no product ID is provided
}
?>

<?php include('../admin_page/admin/includes/header.php'); ?>

<div class="container">
    <h2>Edit Product</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="product_name">Product Name:</label>
            <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $product['product_name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="product_price">Product Price:</label>
            <input type="number" step="0.01" class="form-control" id="product_price" name="product_price" value="<?php echo $product['product_price']; ?>" required>
        </div>
        <div class="form-group">
            <label for="product_category">Product Category:</label>
            <input type="text" class="form-control" id="product_category" name="product_category" value="<?php echo $product['product_category']; ?>" required>
        </div>
        <div class="form-group">
            <label for="product_image">Product Image:</label>
            <input type="text" class="form-control" id="product_image" name="product_image" value="<?php echo $product['product_image']; ?>" required>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
    </form>
</div>

