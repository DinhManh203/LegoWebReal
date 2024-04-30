<?php

session_start();
include('server/connection.php');

if(!isset($_SESSION['logged_in'])){
  header('Location: login.php');
  exit;
}

if(isset($_GET['logout'])){

  if(isset($_SESSION['logged_in'])){
    unset($_SESSION['logged_in']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    header('location: login.php');
    exit;

  }
}


if(isset($_POST['change_password'])) {

  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];
  $user_email = $_SESSION['user_email'];

  if($password !== $confirmPassword){
    header('location: account.php?error=password do not match');
  }
  else if(strlen($password) < 6){
    header('location: account.php?error=password must be at least 6 characters');
  }else {

    $stmt = $conn->prepare("UPDATE users SET user_password=? WHERE user_email=? ");
    $stmt->bind_param('ss',md5($password),$user_email);

    if($stmt->execute()){
      header('location: account.php?message=password has been update successfully');
    }else{
      header('location: account.php?error=counld not update password');
    }

  }


}

//Order
if(isset($_SESSION['logged_in'])){

  $user_id = $_SESSION['user_id'];

  $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id=?");

  $stmt->bind_param('i',$user_id);

  $stmt->execute();

  $orders = $stmt->get_result();//[]

}


?>

<?php

  include('layouts/header.php');

?>

    <!-- Account -->
    <section class="my-5 py-5">
    
        <div class="row container mx-auto">
            <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
                <p class="text-center" style="color: green"> <?php if(isset($_GET['register_success'])){ echo $_GET['register_success']; } ?> </p>
                <p class="text-center" style="color: green"> <?php if(isset($_GET['login_success'])){ echo $_GET['login_success']; } ?> </p>
                <h3 class="font-weight-bold"> Account Info</h3>
                <hr class="mx-auto ">
                <div class="account-info">
                    <p>Name :<span> <?php if(isset($_SESSION['user_name'])){ echo $_SESSION['user_name'];} ?> </span></p>
                    <p>Email :<span> <?php if(isset($_SESSION['user_email'])){ echo $_SESSION['user_email'];} ?> </span></p>
                    <p><a href="#orders" id="orders-btn"> Your Orders </a></p>
                    <p><a href="account.php?logout=1" id="logout-btn"> Log out </a></p>
                </div>

            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <form action="account.php" id="account-form" method="POST">
                    <p class="text-center" style="color: red"> <?php if(isset($_GET['error'])){ echo $_GET['error']; } ?> </p>
                    <p class="text-center" style="color: green"> <?php if(isset($_GET['message'])){ echo $_GET['message']; } ?> </p>
                    <h3>Change Password</h3>
                    <hr class="mx-auto">
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" id="account-password" name="password" placeholder="Password">

                    </div>

                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" class="form-control" id="account-confirm-password" name="confirmPassword" placeholder="Confirm Password">
                        
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Change Password" name="change_password" class="btn" id="change-pass-btn">
                    </div>

                </form>
            </div>

        </div>

    </section>



     <!-- Orders -->
    <section id="orders" class="orders container my-5 py-3">
        <div class="container mt-2">
            <h2 class="font-weight-bolder text-center" style="color: #fb774b;"> Your Orders </h2>
            <hr class="mx-auto" style="color: coral;">
        </div>

        <table class="mt-5 pt-5">
            <tr>
                <th>Order id</th>
                <th>Order cost</th>
                <th>Order status</th>
                <th>Order date</th>
                <th>Order details</th>
            </tr>

            <?php while($row = $orders->fetch_assoc()){ ?>

            <tr>
                <td>
                    <!-- <div class="product-info">
                        <img src="./assets/imgs/products/21162.4.jpg" alt="">
                        <div>
                            <p class="mt-3"> <?php echo $row['order_id']; ?> </p>
                        </div>
                    </div> -->
                    <span> <?php echo $row['order_id']; ?> </span>
                </td>

                <td> 
                  <span> <?php echo $row['order_cost']; ?> </span>
                </td>

                <td> 
                  <span> <?php echo $row['order_status']; ?> </span>
                </td>

                <td> 
                  <span> <?php echo $row['order_date']; ?> </span>
                </td>

                <td> 
                  <form action="order_details.php" method="POST">
                    <input type="hidden" name="order_status" value="<?php echo $row['order_status']; ?>" >
                    <input type="hidden" value="<?php echo$row['order_id']; ?>" name="order_id" />
                    <input type="submit" name="order_details_btn" class="btn order-details-btn" value="details">
                  </form>
                </td>

            </tr>

            <?php } ?>


        </table>

       


    </section>





<?php

include('layouts/footer.php');

?>