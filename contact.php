<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LiBingStore - Contact Us</title>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> 
    <script src="/assets/js/script.js" defer></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style-contactus.css">
</head>
<body>
    
    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top py-3">
      <div class="container">
          <a style="cursor: pointer;" href="./index.php"><img src="assets/imgs/libing-new.png" class="img-logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
            <li class="nav-item">
              <a class="nav-link" href="./index.php" id="navlink">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="./shop.php" id="navlink">Shop</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="./contact.php" id="navlink">Contact Us</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="./about_us.php" id="navlink">About Us</a>
            </li>
            
            <li class="nav-item">
              <a href="./cart.php"><i class="fa fa-shopping-cart"></i></a>

              <a href="./account.php"><i class="fa fa-user"></i></a>
            </li>
          </ul>
          
        </div>
      </div>
  </nav>

    <!-- Contact -->
    
    <section id="contact" class="container my-5 py-5">
        
        <div class="contact-container container text-center mt-5">
            <form action="https://api.web3forms.com/submit" method="POST" class="contact-left">
                <div class="contact-left-title">
                    <h2>Get in touch</h2>
                    <hr style="color: coral;">
                </div>
                <input type="hidden" name="access_key" value="7aca57be-4438-4cb3-845c-f9908c91b8e8">
                <input type="text" name="name" placeholder="Your Name" class="contact-inputs" required>
                <input type="text" name="email" placeholder="Your Email" class="contact-inputs" required>
                <textarea name="message" placeholder="Your Message" class="contact-inputs" required></textarea>
                <button class="" type="submit">Send</button>

            </form>

            <form action="">
              <div class="chatbot">
                <header>
                  <h4>Chatbot</h4>
                </header>
                <ul class="chatbox">
                  <li>
                    <span class="material-symbols-outlined">smart_toy</span>
                    <p>Hi there <br>How can I help you today? </p>
                  </li>
                  <li class="chat outgoing">
                  <p>Hi there <br>How can I help you today? </p>
                  </li>
                </ul>
                <div class="chat-input">
                  <textarea name="" id="" placeholder="Enter a message ... "></textarea>
                  <span id="send-btn" class="material-symbols-outlined"> Send </span>
                </div>

              </div>
            </form>
        </div>
        
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