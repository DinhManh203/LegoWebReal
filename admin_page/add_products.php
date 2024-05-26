<?php
    include('../server/connection.php');

    // Kiểm tra xem biểu mẫu đã được gửi chưa
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy dữ liệu từ biểu mẫu
        $product_name = $_POST['product_name'];
        $product_category = $_POST['product_category'];
        $product_description = $_POST['product_description'];
        $product_price = $_POST['product_price'];
        $product_special_offer = $_POST['product_special_offer'];
        $product_color = $_POST['product_color'];

        // Xử lý ảnh
        $target_dir = "../assets/imgs/";
        $product_image = $target_dir . basename($_FILES["product_image"]["name"]);
        move_uploaded_file($_FILES["product_image"]["tmp_name"], $product_image);
        // Xử lý ảnh sản phẩm 2
        $product_image_2 = $target_dir . basename($_FILES["product_image_2"]["name"]);
        move_uploaded_file($_FILES["product_image_2"]["tmp_name"], $product_image_2);

        // Xử lý ảnh sản phẩm 3
        $product_image_3 = $target_dir . basename($_FILES["product_image_3"]["name"]);
        move_uploaded_file($_FILES["product_image_3"]["tmp_name"], $product_image_3);

        // Xử lý ảnh sản phẩm 4
        $product_image_4 = $target_dir . basename($_FILES["product_image_4"]["name"]);
        move_uploaded_file($_FILES["product_image_4"]["tmp_name"], $product_image_4);


        // Chuẩn bị câu lệnh SQL để chèn dữ liệu vào cơ sở dữ liệu
        $stmt = $conn->prepare("INSERT INTO products (product_name, product_category, product_description, product_image, product_price, product_special_offer, product_color) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $product_name, $product_category, $product_description, $product_image, $product_price, $product_special_offer, $product_color);

        // Thực thi câu lệnh SQL
        if ($stmt->execute()) {
            echo "<script>alert('Sản phẩm đã được thêm thành công.');</script>";

        } else {
            echo "Đã xảy ra lỗi khi thêm sản phẩm: " . $conn->error;
        }

        // Đóng kết nối
        $stmt->close();
        $conn->close();
    }
?>

<?php include('../admin_page/admin/includes/header.php'); ?>

<section class="mt-5 pt-5">
    <div class="content">
        <h2 class="pb-3" style="color: #6A5ACD">Add Products</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-5">
                    <label for="product_name">Tên Sản Phẩm:</label>
                    <input type="text" id="product_name" name="product_name" required><br><br>

                    <label for="product_category">Danh Mục Sản Phẩm:</label>
                    <input type="text" id="product_category" name="product_category" required><br><br>

                    <label for="product_description">Mô Tả:</label>
                    <textarea id="product_description" name="product_description" rows="4" cols="50" required></textarea><br><br>

                    <label for="product_image">Ảnh Sản Phẩm:</label>
                    <input type="file" id="product_image" name="product_image" required><br><br>
                </div>
                <div class="col-md-5">
                
                    <label for="product_price">Giá:</label>
                    <input type="number" id="product_price" name="product_price" required><br><br>

                    <label for="product_special_offer">Ưu Đãi:</label>
                    <input type="text" id="product_special_offer" name="product_special_offer"><br><br>

                    <label for="product_color">Thể Loại:</label>
                    <input type="text" id="product_color" name="product_color"  ><br><br>
                    <input type="submit" value="Thêm Sản Phẩm" class="text-center">
                </div>
            </div>
        </form>
    </div>
</section>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">  
