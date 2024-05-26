<?php
include('../server/connection.php');

// Định nghĩa số sản phẩm mỗi trang
$productsPerPage = 4;

// Lấy trang hiện tại từ tham số truy vấn URL (nếu không có, mặc định là trang 1)
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Tính toán offset
$offset = ($current_page - 1) * $productsPerPage;

// Chuẩn bị câu truy vấn SQL để đếm tổng số sản phẩm
$count_stmt = $conn->prepare("SELECT COUNT(*) AS total FROM products WHERE product_category IN ('LGCT', 'LGNJ', 'LGF', 'LGJW')");
$count_stmt->execute();
$count_result = $count_stmt->get_result();
$count_row = $count_result->fetch_assoc();
$totalProducts = $count_row['total'];

// Chuẩn bị câu truy vấn SQL với LIMIT và OFFSET
$stmt = $conn->prepare("SELECT * FROM products WHERE product_category IN ('LGCT', 'LGNJ', 'LGF', 'LGJW') LIMIT ? OFFSET ?");
$stmt->bind_param('ii', $productsPerPage, $offset);
$stmt->execute();

$products = $stmt->get_result();
?>

<?php
include('../admin_page/admin/includes/header.php');
?> 

<section>
    <div class="content">
        <h2 style="color: #6A5ACD">Products</h2>

        <div class="container">
            <div class="row">
                <?php while($row = $products->fetch_assoc()){ ?>

                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="product text-center">
                        <img src="../assets/imgs/<?php echo $row['product_image']; ?>" class="img-fluid mb-3 <?php echo $row['product_category']; ?>" style="width: 30%">
                        <h5 class="p-name" style="font-size: 14px"><?php echo $row['product_name']; ?></h5>
                        <h4 class="p-sale">$<?php echo $row['product_price']; ?></h4>
                        <a href="edit_product.php?id=<?php echo $row['product_id']; ?>" class="btn btn-primary btn-sm">Sửa</a>
                        <a href="delete_product.php?id=<?php echo $row['product_id']; ?>" class="btn btn-danger btn-sm">Xóa</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="pagination">
            <?php
            // Tính số trang dựa trên tổng số sản phẩm và số sản phẩm mỗi trang
            $totalPages = ceil($totalProducts / $productsPerPage);
            for ($i = 1; $i <= $totalPages; $i++) {
                echo '<a href="?page=' . $i . '">' . $i . '</a> ';
            }
            ?>
        </div>
    </div>
</section>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<?php include('../admin_page/admin/includes/footer.php'); ?>
