<?php

session_start();
include('server/connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='LGCT' OR product_category='LGNJ' OR product_category='LGF' OR product_category='LGJW'  LIMIT 24 ");

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
                        <div class="row mx-auto container-fluid" id="productsContainer">
                        <div class="filter-btns pb-5 pt-3" name="filter-product" id="filter-product">

                        <button class="filter-btn all" name="category" onclick="filterProducts('all')"> ALL </button>
                        <button class="filter-btn" value="LGCT" name="category" onclick="filterProducts('LGCT')"> Lego City </button>
                        <button class="filter-btn" value="LGNJ" name="category" onclick="filterProducts('LGNJ')"> Lego Ninja </button>
                        <button class="filter-btn" value="LGF" name="category" onclick="filterProducts('LGF')"> Lego Friends </button>
                        <button class="filter-btn" value="LGJW" name="category" onclick="filterProducts('LGJW')"> Lego Jurassic Word </button>


                        </div>

                        <div class="filter-btns pb-5 pt-3 searchBar" >
                            <i class="fas fa-search"></i>
                            <input type="text" name="search-item" id="search-item" placeholder="Search products" onkeyup="search()">
                            <hr style="color: coral;">
                        </div>


                    <?php  include('server/get_lgct.php'); ?>
                    <?php  include('server/get_lgnj.php'); ?>
                    <?php  include('server/get_lgf.php'); ?>
                    <?php  include('server/get_lgjw.php'); ?>

                    <?php while($row = $products->fetch_assoc()){ ?>
                        
                        <div class="product text-center col-lg-3 col-md-4 col-sm-12 filter-item all <?php echo $row['product_category']; ?>" id="product-list">
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

        <div class="pagination-buttons">
            <button type="button" class="page-btn prev-page">prev</button>
            <button type="button" class="page-btn start-page">start</button>
            <button type="button" class="page-btn active">1</button>
            <button type="button" class="page-btn">2</button>
            <button type="button" class="page-btn">3</button>
            <button type="button" class="page-btn">4</button>
            <button type="button" class="page-btn">5</button>
            <button type="button" class="page-btn">6</button>
            <button type="button" class="page-btn">7</button>
            <button type="button" class="page-btn">8</button>
            <button type="button" class="page-btn">9</button>
            <button type="button" class="page-btn end-page">end</button>
            <button type="button" class="page-btn next-page">next</button>
            
        </div>

    

  
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const pageButtons = document.querySelectorAll(".page-btn");
            const activePage = document.querySelector(".page-btn.active");
            let currentPage = parseInt(activePage.textContent);

            pageButtons.forEach(button => {
                button.addEventListener("click", function() {
                    if (this.classList.contains("prev-page")) {
                        if (currentPage > 1) {
                            currentPage--;
                            setActivePage(currentPage);
                        }
                    } else if (this.classList.contains("next-page")) {
                        const totalPages = document.querySelectorAll(".page-btn").length - 3;
                        if (currentPage < totalPages) {
                            currentPage++;
                            setActivePage(currentPage);
                        }
                    } else if (this.classList.contains("start-page")) {
                        currentPage = 1;
                        setActivePage(currentPage);
                    } else if (this.classList.contains("end-page")) {
                        const totalPages = document.querySelectorAll(".page-btn").length - 3;
                        currentPage = totalPages;
                        setActivePage(currentPage);
                    } else {
                        currentPage = parseInt(this.textContent);
                        setActivePage(currentPage);
                    }
                });
            });

            function setActivePage(pageNumber) {
                const pageButtons = document.querySelectorAll(".page-btn");
                pageButtons.forEach(button => {
                    button.classList.remove("active");
                    if (parseInt(button.textContent) === pageNumber) {
                        button.classList.add("active");
                    }
                });
            }
        });
    </script>

    <script>
        const search = () => {
            const searchbox = document.getElementById("search-item").value.toUpperCase();
            const storeitems = document.getElementById("product-list");
            const product = document.querySelectorAll(".product");
            const pname = document.getElementsByTagName("h5");

            for(var i=0; i < pname.length; i++){
                let match = product[i].getElementsByTagName('h5')[0];

                if(match){
                    let textvalue = match.textContent || match.innerHTML

                    if(textvalue.toUpperCase().indexOf(searchbox) > -1){
                        product[i].style.display = "";
                    }else{
                        product[i].style.display = "none";
                    }
                }

            }
        }
    </script>

<?php include('layouts/footer.php') ?>