<?php

session_start();

include('../server/connection.php');

if(isset($_SESSION['admin_logged_in'])){
  header('Location: dashboard.php');
  exit;
}


if(isset($_POST['login_btn'])) {

  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $stmt = $conn->prepare("SELECT admin_id, admin_name, admin_email, admin_password FROM admins WHERE admin_email=? AND admin_password=? LIMIT 1");

  $stmt->bind_param('ss', $email, $password);

  if($stmt->execute()) {
    $stmt->bind_result($admin_id, $admin_name, $admin_email, $admin_password);
    $stmt->store_result();

    if($stmt->num_rows() == 1) {

      $stmt->fetch();

      $_SESSION['admin_id'] = $admin_id;
      $_SESSION['admin_name'] = $admin_name;
      $_SESSION['admin_email'] = $admin_email;
      $_SESSION['admin_logged_in'] = true;

      header('location: dashboard.php?login_success=logged in successfully');

    } else {

      header('location: login.php?error=could not verify your account');

    }
  } else {

    header('location: login.php?error=something went wrong');

  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./admin/assets/css/style.css">
</head>
<body>
    <div class="login-container ">
        <form class="login-form" action="login.php" method="post">
            <h2>LiBing's Admin Login</h2>
            <?php if (isset($error)): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>
            <label for="username">Username</label>
            <input type="text" id="username" name="email" required> <!-- Thay đổi 'username' thành 'email' -->
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit" name="login_btn" value="login">Login</button>
        </form>
    </div>
</body>
</html>
