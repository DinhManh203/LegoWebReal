<?php

session_start();

include('server/connection.php');

if(isset($_POST['register'])){

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];

  //Kiểm tra mật khẩu xem có khớp hay không
  if($password !== $confirmPassword){
    header('location: register.php?error=passwords do not match');
  }

  else if(strlen($password) < 6){
    header('location: register.php?error=password must be at least 6 characters');
  } 
  else {

      //Kiểm tra email này có thực hay không 
      $stmt1 = $conn->prepare("SELECT count(*) FROM users where user_email=?");
      $stmt1->bind_param('s', $email);
      $stmt1->execute();
      $stmt1->bind_result($num_rows);
      $stmt1->store_result();
      $stmt1->fetch();


      // Nếu Email đã được đăng ký   
      if($num_rows != 0){
        header('location: register.php?error=user with this email already exist');

      //Nếu không có người nào đăng ký tài khoản với email trước đây
      }else{

          //Tạo mới tài khoản người dùng
          $stmt = $conn->prepare("INSERT INTO users (user_name,user_email,user_password) 
                          VALUE (?,?,?) ");

          $stmt->bind_param('sss',$name,$email,md5($password));


          if($stmt->execute()){

              $user_id = $stmt->insert_id;
              $_SESSION['user_id'] = $user_id;
              $_SESSION['user_email'] = $email;
              $_SESSION['user_name'] = $name;
              $_SESSION['logged_in'] = true;
              header('location: account.php?register_succes=Registered Successfully');

          }else{

            header('location: register.php?error=Could not create an account at the moment');

          }
      }
  }

}else if(isset($_SESSION['logged_in'])){

  header('location: account.php');
  exit;

}





?>


<?php

  include('layouts/header.php');

?>

    <!-- Register -->

    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="font-weight-bold"> Register </h2>
            <hr class="mx-auto w-50">
        </div>

        <div class="mx-auto container">
            <form action="" id="register-form" method="POST" action="register.php">
              <p style="color: red"> <?php if(isset($_GET['error'])){ echo $_GET['error']; }?> </p>
                <div class="form-group">
                    <label for="" >Name</label>
                    <input type="text" class="form-control" id="register-name" name="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label for="" >Email</label>
                    <input type="text" class="form-control" id="register-email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="" >Password</label>
                    <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="" >Confirm Password</label>
                    <input type="password" class="form-control" id="register-confirmpassword" name="confirmPassword" placeholder="Confirm Password" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn" id="register-btn" name="register" value="Register">
                </div>
                <div class="form-group">
                    <a href="login.php" id="login-url" class="btn"> Do you have an account? Login</a>
                </div>
            </form>
        </div>

    </section>



<?php

include('layouts/footer.php');

?>