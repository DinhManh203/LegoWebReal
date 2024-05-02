<?php 

session_start();
include('connection.php');


if(isset($_GET['order_id'])){

    $order_id = $_GET['order_id'];
    $order_status = "paid";
    // $transaction_id = $_GET['transaction_id'];
    $user_id = $_SESSION['user_id'];
    
    //Thay doi trang thai don hang
    $stmt = $conn->prepare("UPDATE orders SET order_status=? WHERE order_id=? ");
    $stmt->bind_param('si',$order_status,$order_id);

    $stmt->execute();


    //Thong tin gio hang thanh toan
    $stmt1 = $conn->prepare("INSERT INTO payments (order_id,user_id)
                            VALUES (?,?); ");

    $stmt1->bind_param('ii',$order_id,$user_id);

    $stmt1->execute();

    //Den voi tai khoan nguoi dung
    header("location: ../account.php?payment_message=Paid successfully, thanks for your shopping with us");

}else{

    header('location: /index.php');
    exit;

}

?>