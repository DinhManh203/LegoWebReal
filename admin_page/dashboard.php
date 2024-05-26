<?php
session_start();
include('../server/connection.php');

if(!isset($_SESSION['admin_logged_in'])){
    header('location: login.php');
    exit();
}

// Fetch total number of users
$user_stmt = $conn->prepare("SELECT COUNT(*) as total_users FROM users");
$user_stmt->execute();
$user_result = $user_stmt->get_result();
$user_row = $user_result->fetch_assoc();
$total_users = $user_row['total_users'];

// Fetch total number of products
$product_stmt = $conn->prepare("SELECT COUNT(*) as total_products FROM products");
$product_stmt->execute();
$product_result = $product_stmt->get_result();
$product_row = $product_result->fetch_assoc();
$total_products = $product_row['total_products'];

// Fetch total number of orders
$order_stmt = $conn->prepare("SELECT COUNT(*) as total_orders FROM orders");
$order_stmt->execute();
$order_result = $order_stmt->get_result();
$order_row = $order_result->fetch_assoc();
$total_orders = $order_row['total_orders'];

include('../admin_page/admin/includes/header.php');
?> 

<div class="content">
    <h2 style="color: #6A5ACD">Statistical</h2>
    <div class="summary">
        <div class="summary-item">
            <h3>Total Users</h3>
            <p><?php echo $total_users; ?></p>
        </div>
        <div class="summary-item">
            <h3>Total Products</h3>
            <p><?php echo $total_products; ?></p>
        </div>
        <div class="summary-item">
            <h3>Total Orders</h3>
            <p><?php echo $total_orders; ?></p>
        </div>
    </div>

    <div class="chart-container">
        <canvas id="myChart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Sample data for the chart
    const labels = ['January', 'February', 'March', 'April', 'May', 'June'];
    const data = {
        labels: labels,
        datasets: [{
            label: 'Sales',
            backgroundColor: 'rgb(54, 162, 235)',
            borderColor: 'rgb(54, 162, 235)',
            data: [100, 200, 300, 400, 500, 600],
        }]
    };

    // Configuration options
    const config = {
        type: 'line',
        data: data,
        options: {}
    };

    // Initialize chart
    var myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>
</body>
</html>
