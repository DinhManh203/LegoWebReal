<?php

include('server/connection.php');

//Quay lại trang nếu không có ID
if(isset($_GET['product_id'])){

  $product_id = $_GET['product_id'];

  $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ? LIMIT 1 ");
  $stmt->bind_param("i",$product_id);
  $stmt->execute();

  $product = $stmt->get_result();//[]

}else{

  header('location: index.php');

}

?>



<?php

  include('layouts/header.php');

?>


    <!-- Single Product -->
    <section id="" class="container single-product my-5 pt-5 mb-5">
        <div class="row mt-5">

        <?php while($row = $product->fetch_assoc()){ ?>



            <div class="col-lg-5 col-md-6 col-sm-12 ">
                <img src="./assets/imgs/<?php echo $row['product_image']; ?>" alt="" class="" id="mainImg">
                <hr style="border: 1px solid #fb774b;">
                <div class="small-img-group">

                    <div class="small-img-col">
                        <img src="./assets/imgs/<?php echo $row['product_image']; ?>" alt="" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="./assets/imgs/<?php echo $row['product_image2']; ?>" alt=""  class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="./assets/imgs/<?php echo $row['product_image3']; ?>" alt=""  class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="./assets/imgs/<?php echo $row['product_image4']; ?>" alt=""  class="small-img">
                    </div>
                    
                </div>
            </div>

            
            <div class="col-lg-5 offset-lg-2 col-md-12 col-12 mb-5">
                <h6> Lego </h6>
                <h3 class="py-4"> <?php echo $row['product_name']; ?> </h3>
                <h2> $<?php echo $row['product_price']; ?> </h2>

                <form method="POST" action="cart.php">

                  <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                  <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>">
                  <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
                  <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>">

                  <input type="number" name="product_quantity" value="1"/>
                  <button class="buy-btn" type="submit" name="add_to_cart"> Add To Cart </button>

                </form>

                <h4 class="mt-5 mb-5"> Product Detials </h4>
                <span> <?php echo $row['product_description']; ?> </span>
            </div>
          

        <?php } ?>

        </div>
    </section>


    <!--Related Products-->
    <section id="featured mt-5 pb-5">
      <div class="container text-center mt-5 py-6">
        <h3>Related Products</h3>
        <hr>
      </div>
      <div class="row mx-auto container-fluid">
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img src="./assets/imgs/21174.jpg" alt="" class="img-fluid mb-3">
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
          </div>

          <h5 class="p-name">Big Bick</h5>
          <h4 class="p-price"> $ 99.99 </h4>
          <h4 class="p-sale"> $ 50.00 </h4>
          <button class="buy-btn"> Buy Now </button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img src="./assets/imgs/21174.jpg" alt="" class="img-fluid mb-3">
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
          </div>

          <h5 class="p-name">Big Bick</h5>
          <h4 class="p-price"> $ 99.99 </h4>
          <h4 class="p-sale"> $ 50.00 </h4>
          <button class="buy-btn"> Buy Now </button>
        </div>

        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img src="./assets/imgs/21174.jpg" alt="" class="img-fluid mb-3">
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
          </div>

          <h5 class="p-name">Big Bick</h5>
          <h4 class="p-price"> $ 99.99 </h4>
          <h4 class="p-sale"> $ 50.00 </h4>
          <button class="buy-btn"> Buy Now </button>
        </div>

        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img src="./assets/imgs/21174.jpg" alt="" class="img-fluid mb-3">
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
          </div>

          <h5 class="p-name">Big Bick</h5>
          <h4 class="p-price"> $ 99.99 </h4>
          <h4 class="p-sale"> $ 50.00 </h4>
          <button class="buy-btn"> Buy Now </button>
        </div>

      </div>
    </section>

          
    <!-- Replace SmallImage -->
    <script>

      var mainImg = document.getElementById("mainImg");
      var smallImg = document.getElementsByClassName("small-img");
      
      for(let i=0; i<4; i++){
                  smallImg[i].onclick = function() {
                  mainImg.src = smallImg[i].src;
                }
      }
    </script>


<?php

include('layouts/footer.php');

?>