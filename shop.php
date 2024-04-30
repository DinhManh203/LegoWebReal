<?php

session_start();
include('server/connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='LGCT' OR product_category='LGNJ' OR product_category='LGF' LIMIT 12 ");


$stmt->execute();

$products = $stmt->get_result();//[]

?>


<?php include('layouts/header.php') ?>
    
    <!-- featured products -->
    <section class="fea-product pt-5 mt-5 pd-5" id="feaatured">
        <div class="wrapper ">
            <div class="category-filter">
                <div class="container mt-1 py-5">
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
    

    <!-- Loc san pham -->
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

<?php include('layouts/footer.php') ?>