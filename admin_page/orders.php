<?php
session_start();
include('../server/connection.php');

// Fetch orders from the database
$order_stmt = $conn->prepare("SELECT orders.order_id, orders.order_cost, orders.order_status, orders.order_date, users.user_id, orders.user_phone, orders.user_city, orders.user_address FROM orders JOIN users ON orders.user_id = users.user_id");
if (!$order_stmt) {
    die("Error in SQL query: " . $conn->error);
}

if (!$order_stmt->execute()) {
    die("Error executing SQL query: " . $order_stmt->error);
}

$order_result = $order_stmt->get_result();

include('../admin_page/admin/includes/header.php');
?> 

<div class="content">
    <h2 style="color: #6A5ACD">Orders</h2>

    <div class="order-list row">
        <?php while($order = $order_result->fetch_assoc()) { ?>
            <div class="order ">
                <h4>Order #<?php echo $order['order_id']; ?></h3>
                <p>User ID: <?php echo $order['user_id']; ?></p>
                <p>User Phone: <?php echo $order['user_phone']; ?></p>
                <p>User City: <?php echo $order['user_city']; ?></p>
                <p>User Address: <?php echo $order['user_address']; ?></p>
                <p style="color: green;">Total Cost: $<?php echo $order['order_cost']; ?></p>
                <p style="color: red;">Status: <?php echo $order['order_status']; ?></p>
                <p>Out Date: <?php echo $order['order_date']; ?></p>
            </div>
        <?php } ?>
    </div>
</div>

</body>
</html>
