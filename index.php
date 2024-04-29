<?php

  include('layouts/header.php');

?>


      <!--Home-->
      <section id="home">
        <div class="container">
            <h5>New Arrivals</h5>
            <h1> <span>Best Prices</span> This Season </h1>
            <p class="home-p">Eshop offers the best products for the most affordable prices</p>
            <a href="./shop.html"><button class="btnShop">Shop Now</button></a>
            
        </div>
      </section>

      <!--Brand-->
      <section id="brand" class="container">
        <div class="row d-flex justify-content-center">
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand/brand1.png"/>
          <!-- <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand/brand1.png"/>
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand/brand1.png"/>
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand/brand1.png"/> -->
        </div>
      </section>

      <!--New-->
      <section id="new" class="w-100">
        <div class="row p-0 m-0">
          <!--One-->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/pictures/pics1.jpg"/>
            <div class="details">
              <h2 class="h1-left">Engage in a thrilling galatic chase</h2>
              <button class="btn1-left text-uppercaase">Shop Now</button>
            </div>
          </div>
          <!--Two-->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/pictures/pics2.jpg"/>
            <div class="details">
              <h2>Rev up creative excitement</h2>
              <button class="text-uppercaase">Shop Now</button>
            </div>
          </div>
          <!--Three-->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/pictures/pics3.jpg"/>
            <div class="details">
              <h2 class="h1-right">New Medieval Town Square</h2>
              <button class="btn1-right text-uppercaase">Shop Now</button>
            </div>
          </div>

          <!--Products-->
        <section id="product" class="my-5 pb-5">
          <div class="container text-center mt-5 py-5">
            <h3>Products</h3>
            <hr style="color: coral;" >
            <p class="product-p">We have awesome products</p>
            <div class="slider-wrapper">
              <div class="image-list">
                <img src="assets/imgs/21164.jpg" alt="img-1" class="image-item">
                <img src="assets/imgs/21166.jpg" alt="img-1" class="image-item">
                <img src="assets/imgs/21172.jpg" alt="img-1" class="image-item">
                <img src="assets/imgs/21174.jpg" alt="img-1" class="image-item">
                <img src="assets/imgs/21241.jpg" alt="img-1" class="image-item">
                <img src="assets/imgs/21186.jpg" alt="img-1" class="image-item">
                <img src="assets/imgs/21189.jpg" alt="img-1" class="image-item">
                <img src="assets/imgs/21190.jpg" alt="img-1" class="image-item">
                <img src="assets/imgs/21162.4.jpg" alt="img-1" class="image-item">
                <img src="assets/imgs/21162.4.jpg" alt="img-1" class="image-item">
                <img src="assets/imgs/21162.4.jpg" alt="img-1" class="image-item">
              </div>
              <button id="prev-slide" class="slider-button material-symbols-rounded">chevron_left</button>
              <button id="next-slide" class="slider-button material-symbols-rounded">chevron_right</button>
            </div>
            <div class="slider-scrollbar">
              <div class="scrollbar-track">
                <div class="scrollbar-thumb"></div>
              </div>
            </div>

          </div>

        </div>
        </section>

      <!--Banner-->
      <section id="banner" class="my-5 py-5">
        <div class="container">
          <h4> MID SEASON'S SALE </h4>
          <h1> Super Summer Collection <br> UP to 30% OFF</h1>
          <button class="text-uppercase">Shop Now</button>
        </div>
      </section>

      <!--Featured LGMC-->
      <section id="featured my-5 pb-5">
        <div class="container text-center mt-5 py-5">
          <h3>Super Summer Sales</h3>
          <hr style="color: coral;">
          <p class="fea-p">15/5 -> 15/6 We offer discounts on all Lego Minecraft products UP TO 30% </p>
        </div>
        <div class="row mx-auto container-fluid">

        <?php  include('server/get_featured_product.php'); ?>



        <?php while($row = $featured_products->fetch_assoc()){ ?>

          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img src="./assets/imgs/<?php echo $row['product_image']; ?>" class="img-fluid mb-3">
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
            </div>

            <h5 class="p-name"> <?php echo $row['product_name']; ?> </h5>
            <h4 class="p-price"> $ 144.99 </h4>
            <h4 class="p-sale"> $ <?php echo $row['product_price']; ?> </h4>
            
            <a href="<?php echo "./single_product.php?product_id=". $row['product_id'];?>"> <button class="buy-btn"> Buy Now </button> </a>
            
          </div>
          
          <?php } ?>

        </div>
      </section>


      <!--Featured STARWARS-->
      <section id="featured my-5 pb-5">
        <div class="container text-center mt-5 py-5">
          <h3> STAR WARS </h3>
          <hr style="color: coral;">
          <p class="fea-p">1/6 -> 5/6 Open for limited sale </p>
        </div>
        <div class="row mx-auto container-fluid">

        <?php  include('server/get_lgsw.php'); ?>



        <?php while($row = $featured_products->fetch_assoc()){ ?>

          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img src="./assets/imgs/<?php echo $row['product_image']; ?>" class="img-fluid mb-3">
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
            </div>

            <h5 class="p-name"> <?php echo $row['product_name']; ?> </h5>
            <h4 class="p-sale"> $ <?php echo $row['product_price']; ?> </h4>
            
            <a href="<?php echo "./single_product.php?product_id=". $row['product_id'];?>"> <button class="buy-btn"> Buy Now </button> </a>
            
          </div>
          
          <?php } ?>

        </div>
      </section>

<?php

include('layouts/footer.php');

?>
