<?php

session_start();
include('server/connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='LGCT' OR product_category='LGNJ' OR product_category='LGF' LIMIT 12 ");

$category = $_POST['category'];

$stmt->execute();

$products = $stmt->get_result();//[]

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LiBingStore - ShopPage </title>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> 
    <script src="/assets/js/script.js" defer></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style-shop.css">

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
                <a class="nav-link" href="./index.php" id="navlink">Home</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="./shop.php" id="navlink">Shop</a>
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
    
    <!-- featured products -->
    <section class="fea-product pt-5 mt-5 pd-5" id="feaatured">
        <div class="wrapper ">
            <div class="category-filter">
                <div class="container mt-5 py-5">
                    <div class="title">
                        <h1>Featured Products</h1>
                    </div>
                        <div class="row mx-auto container-fluid">
                        <div class="filter-btns pb-5 pt-3" name="filter-product" id="filter-product">

                            <button class="filter-btn all" name="category" onclick="filterProducts('all')"> ALL </button>
                            <button class="filter-btn" value="LGCT" name="category" onclick="filterProducts('LGCT')"> Lego City </button>
                            <button class="filter-btn" value="LGNJ" name="category" onclick="filterProducts('LGNJ')"> Lego Ninja </button>
                            <button class="filter-btn" value="LGF" name="category" onclick="filterProducts('LGF')"> Lego Friends </button>
                            <button class="filter-btn" value="LGJW" name="category" onclick="filterProducts('LGJW')"> Lego Jurassic Word </button>

                        </div>

                    <?php  include('server/get_lgct.php'); ?>
                    <?php  include('server/get_lgnj.php'); ?>
                    <?php  include('server/get_lgf.php'); ?>

                    <?php while($row = $products->fetch_assoc()){ ?>
                        
                        <div class="product text-center col-lg-3 col-md-4 col-sm-12 filter-item all <?php echo $row['product_category']; ?>">
                          <img src="./assets/imgs/<?php echo $row['product_image']; ?>" class="img-fluid mb-3 <?php echo $row['product_category']; ?>">
                          <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                          </div>
              
                          <h5 class="p-name"> <?php echo $row['product_name']; ?> </h5>
                          <h4 class="p-sale"> $ <?php echo $row['product_price']; ?> </h4>
                          
                          <a href="<?php echo "./single_product.php?product_id=". $row['product_id'];?>"><button class="buy-btn"> Buy Now </button></a> 
                          
                        </div>
                        
                    <?php } ?>
                    </div>

                </div>
            </div>
        </div>
    </section>
    
    <!-- Pagination -->
    <section class="paginations">

        <ul class="pagination">
            <li class="pagination-item">
                <a href="" class="pagination-item_link">
                    <i class="pagination-item_icon fas fa-angle-left"></i>
                </a>
            </li>

            <li class="pagination-item pagination-item--active">
                <a href="" class="pagination-item_link"> 1 </a>
            </li>

            <li class="pagination-item">
                <a href="" class="pagination-item_link"> 2 </a>
            </li>

            <li class="pagination-item">
                <a href="" class="pagination-item_link"> 3 </a>
            </li>

            <li class="pagination-item">
                <a href="" class="pagination-item_link"> 4 </a>
            </li>

            <li class="pagination-item">
                <a href="" class="pagination-item_link">
                    <i class="pagination-item_icon fas fa-angle-right"></i>
                </a>
            </li>
        </ul>

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
    
    <script>
    function filterProducts(category) {
        var products = document.getElementsByClassName('product');
        if (category === 'all') {
            for (var i = 0; i < products.length; i++) {
                products[i].style.display = 'block';
            }
        } else {
            for (var i = 0; i < products.length; i++) {
                if (products[i].classList.contains(category)) {
                    products[i].style.display = 'block';
                } else {
                    products[i].style.display = 'none';
                }
            }
        }
    }
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>