<?php

session_start();

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


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LiBingStore - HomePage</title>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> 
    <script src="/assets/js/script.js" defer></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    
    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top py-3">
      <div class="container">
          <a style="cursor: pointer;" href="./index.html"><img src="assets/imgs/libing-new.png" class="img-logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
            <li class="nav-item">
              <a class="nav-link" href="./index.html" id="navlink">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="./shop.html" id="navlink">Shop</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="./contact.html" id="navlink">Contact Us</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#" id="navlink">Help</a>
            </li>
            
            <li class="nav-item">
              <a href="./cart.html"><i class="fa fa-shopping-cart"></i></a>

              <a href="./account.html"><i class="fa fa-user"></i></a>
            </li>
          </ul>
          
        </div>
      </div>
  </nav>

    <!-- Account -->
    <section class="my-5 py-5">
    
        <div class="row container mx-auto">
            <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">

                <h3 class="font-weight-bold"> Account Info</h3>
                <hr class="mx-auto ">
                <div class="account-info">
                    <p>Name <span> <?php if(isset($_SESSION['user_name'])){ echo $_SESSION['user_name'];} ?> </span></p>
                    <p>Email <span> <?php if(isset($_SESSION['user_email'])){ echo $_SESSION['user_email'];} ?> </span></p>
                    <p><a href="#orders" id="orders-btn"> Your Orders </a></p>
                    <p><a href="account.php?logout=1" id="logout-btn"> Log out </a></p>
                </div>

            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <form action="" id="account-form">
                    <h3>Change Password</h3>
                    <hr class="mx-auto">
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" id="account-password" name="password" placeholder="Password">

                    </div>

                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" class="form-control" id="account-confirm-password" name="confirmpassword" placeholder="Confirm Password">
                        
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Change Password" class="btn" id="change-pass-btn">
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
                <th>Product</th>
                <th>Date</th>
            </tr>

            <tr>
                <td>
                    <div class="product-info">
                        <img src="./assets/imgs/products/21162.4.jpg" alt="">
                        <div>
                            <p class="mt-3">Big Bick</p>
                        </div>
                    </div>
                </td>

                <td>
                    <span>2024-1-1</span>
                </td>

            </tr>

            


        </table>

       


    </section>





    <!--Footer-->
    <footer class="mt-5 py-5">
        <div class="row container mx-auto pt-5">
          <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <img src="./assets/imgs/libing-new.png" alt="" class="logo-footer">
            <ul class="text-uppercase">
              <li><a href="#"> Gift Cards</a></li>
              <li><a href="#"> Find Inspriration</a></li>
              <li><a href="#"> LEGO Catalogs</a></li>
              <li><a href="#"> Find a LEGO Store</a></li>
            </ul>
            
          </div>

          <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pb-2"> Featured  </h5>
            <ul class="text-uppercase">
              <li><a href="#"> LEGO Friends</a></li>
              <li><a href="#"> LEGO NinjaGo</a></li>
              <li><a href="#"> LEGO StarWar</a></li>
              <li><a href="#"> LEGO BatMan</a></li>
              <li><a href="#"> LEGO Minecraft</a></li>
            </ul>
          </div>

          <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pb-2"> Contact Us  </h5>
            <div>
              <h6 class="text-uppercase">Address</h6>
              <p> Viet Nam </p>
            </div>
            <div>
              <h6 class="text-uppercase">Phone</h6>
              <p> 01234567898 </p>
            </div>
            <div>
              <h6 class="text-uppercase">Email</h6>
              <p> libingstore0410@gmail.com </p>
            </div>
          </div>

          <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pb-2">Privacy Policy</h5>
            <div class="collumn">
              <li><a href="">Warranty provisions</a></li>
              <li><a href="">Refurn Policy</a></li>
            </div>
          </div>

        </div>

        <div class="copyright mt-5">
          <div class="row container mx-auto">
            <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
              <img src="" alt="" class="">
            </div>
            <div class="col-lg-3 col-md-5 col-sm-12 mb-4 text-nowrap mb-2">
              <p> Ecommerce @2025 ALL Right Reversed </p>
            </div>
            <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
              <a href="https://www.facebook.com/profile.php?id=61557684821356"><i class="fab fa-facebook"></i></a>
              <a href="https://www.facebook.com/profile.php?id=61557684821356"><i class="fab fa-instagram"></i></a>
              <a href="https://discord.gg/zt2ux9pg"><i class="fab fa-discord"></i></a>
              <a href="https://discord.gg/zt2ux9pg"><i class="fab fa-youtube"></i></a>
            </div>
          </div>
        </div>

      </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>