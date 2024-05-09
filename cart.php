<?php

session_start();

// Kiểm tra xem có dữ liệu được gửi từ form POST hay không
if(isset($_POST['add_to_cart'])){
  
  // Kiểm tra xem session giỏ hàng đã được tạo chưa
  if(isset($_SESSION['cart'])){
    // Nếu đã có sản phẩm trong giỏ hàng, kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
    $products_array_ids = array_column($_SESSION['cart'],"product_id");
    
    // Nếu sản phẩm chưa tồn tại trong giỏ hàng
    if(!in_array($_POST['product_id'], $products_array_ids)){


      $product_id = $_POST['product_id'];

      // Tạo một mảng mới để lưu thông tin sản phẩm
      $product_array = array(
                      'product_id' => $_POST['product_id'],
                      'product_name' => $_POST['product_name'],
                      'product_price' => $_POST['product_price'],
                      'product_image' => $_POST['product_image'],
                      'product_quantity' => $_POST['product_quantity']
      );

      // Thêm sản phẩm vào giỏ hàng
      $_SESSION['cart'][$product_id] = $product_array;

    }else{
      // Nếu sản phẩm đã tồn tại trong giỏ hàng, hiển thị thông báo
      echo '<script>alert("Product was already added to cart")</script>';
    }

  }else{

    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];

    // Nếu chưa có giỏ hàng, tạo một giỏ hàng mới
    $product_array = array(
                    'product_id' => $product_id,
                    'product_name' => $product_name,
                    'product_price' => $product_price,
                    'product_image' => $product_image,
                    'product_quantity' => $product_quantity
    );

    // Thêm sản phẩm vào giỏ hàng
    $_SESSION['cart'][$product_id] = $product_array;
  }

  //Tinh tong
  calculateTotalCart();





//Xóa vật phẩm khỏi giỏ hàng
}else if(isset($_POST['remove_product'])){

  $product_id = $_POST['product_id'];
  unset($_SESSION['cart'][$product_id]);

  calculateTotalCart();



}else if(isset($_POST['edit_quantity'])){

  $product_id = $_POST['product_id'];
  $product_quantity = $_POST['product_quantity'];

  $product_array = $_SESSION['cart'][$product_id];

  $product_array['product_quantity'] = $product_quantity;

  $_SESSION['cart'][$product_id] = $product_array;

  calculateTotalCart();

}else{
  // Nếu không có dữ liệu gửi từ form POST, chuyển hướng về trang chính
  // header('location: index.php');
}



function calculateTotalCart(){

  $total_price = 0;
  $total_quantity = 0;

  foreach($_SESSION['cart'] as $key => $value){

    $product = $_SESSION['cart'][$key];

    $price = $product['product_price'];
    $quantity = $product['product_quantity'];

    $total_price = $total_price + ($price * $quantity);
    $total_quantity = $total_quantity + $quantity;

  }

  $_SESSION['total'] = $total_price;
  $_SESSION['quantity'] = $total_quantity;

}



?>




<?php

  include('layouts/header.php');

?>

    <!-- Cart -->
    <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bolder" style="color: #fb774b;"> Your Cart </h2>
            <hr class="" style="color: coral;">
        </div>

        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>


            <?php foreach($_SESSION['cart'] as $key => $value){ ?>

            <tr>
                <td>
                    <div class="product-info">
                        <img src="./assets/imgs/<?php echo $value['product_image']; ?>"/>
                        <div>
                            <p> <?php echo $value['product_name']; ?> </p>
                            <small><span>$</span><?php echo $value['product_price']; ?></small>
                            <br>

                            <form method="POST" action="cart.php">
                              <input type="hidden" name="product_id" class="remove-btn" value="<?php echo $value['product_id']; ?>"/>
                              <input type="submit" name="remove_product" class="remove-btn" value="remove" />
                            </form>
                            
                        </div>
                    </div>
                </td>

                <td>
                    
                    <form method="POST"  action="cart.php">
                      <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>"/>
                      <input type="number" name="product_quantity" value="<?php echo $value['product_quantity']; ?>"/>
                      <input type="submit" class="edit-btn" value="edit" name="edit_quantity"/>
                    </form>
                </td>

                <td>
                    <span>$</span>
                    <span class="product-price"> <?php echo $value['product_quantity'] * $value['product_price'];  ?> </span>
                </td>

            </tr>


            <?php } ?>


        </table>

        <div class="cart-total">
            <hr style="color: #fb774b;">
            <table>
                <!-- <tr>
                    <td>Subtotal</td>
                    <td>$ 99.99</td>
                </tr> -->
                <tr>
                    <td>Total</td>
                    <td>$<?php echo $_SESSION['total']; ?></td>
                </tr>
            </table>
        </div>

        <div class="checkout-container">
          <form method="POST" action="checkout.php">
            <input type="submit" class="btn checkout-btn" value="Check Out" name="checkout" />
          </form>

        </div>


    </section>





    

<?php

include('layouts/footer.php');

?>