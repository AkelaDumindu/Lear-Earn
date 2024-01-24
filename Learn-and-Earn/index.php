<!-- database connection -->

<?php
    include('connection.php');
    include('functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Earn&Learn | Home Page</title>

    <link rel="icon" href="Image/logo.png" />

    <!-- Bootstrap link path-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;500;700&display=swap" rel="stylesheet">

    <!-- CSS link -->
    <link rel="stylesheet" href="index.css">

</head>
<body>
        
    <div class="container1">
        <div class="container-fluid p-0">

            <!-- first child -->
            <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">
                    <img src="Image/big_logo.png" alt="" class="logo">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                            <a class="n-link" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                            <a class="n-link" href="all_products.php">Products</a>
                            </li>
                            <li class="nav-item">
                            <a class="n-link" href="#">Contact</a>
                            </li>
                            <li class="nav-item">
                            <a class="n-link register" href="#">Register</a>
                            </li>
                            <li class="nav-item">
                            <a class="cart" href="#"><i class="fa-solid fa-cart-shopping fa-xl" style="color: #00dd00;"></i><sup>1</sup></a>
                            </li>
                            <li class="nav-item">
                            <a class="tprice" href="#">Total Price:100/-</a>
                            </li>
                        </ul>
                        <form class="d-flex" role="search" action="search_product.php" mehtod="get">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                            <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->

                            <input type="submit" value="Search" class="btn" name="search_data_product">

                        </form>
                    </div>
                </div>
            </nav>
            <!-- end first child -->

            <!-- second child -->
            <div class="heading">
                <h1>Student-Made Marketplace: Empowering<br>the Next Generation of Entrepreneurs</h1>
                <p>Where Student Talent Shines, and Dreams Become Sales!</p>

                <div class="heading-sub">
                    <ul>
                    <li><p>Welcome <?php if(isset($_SESSION['username'])){
                            echo $_SESSION['username'];
                        }else{
                            echo"guest"; 
                        } ?></p></li>
                        <li>
                            <a class="btn-login" href="#">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end of second child -->
        </div>

        <!-- products -->
        

    </div>

        <div class="products">
            <!-- third child -->
            <h2>Let's Shopping</h2>
            <!-- enf of third child -->

            <!-- fourth child -->
            <div class="row">
                <div class="col-md-10">
                    <!-- products -->
                    <div class="row">

                    <?php

                    getproducts();
                    get_setect_category();
                    get_setect_brand();
                    
                    // $select_query = "Select * from products order by rand()"; //limit 0,5
                    // $result_query = mysqli_query($con, $select_query);
                    // // $row = mysqli_fetch_assoc($result_query);
                    // // echo $row['product_title'];

                    // while($row = mysqli_fetch_assoc($result_query)) {
                    //     $product_ID = $row['product_ID'];
                    //     $product_title = $row['product_title'];
                    //     $product_description = $row['product_description'];
                    //     $product_image1 = $row['product_image1'];
                    //     $product_price = $row['product_price'];
                    //     $category_ID = $row['category_ID'];
                    //     $brand_ID = $row['brand_ID'];

                    //     echo
                    //     "<div class='col-md-4 mb-2'>
                    //         <div class='card' >
                    //             <img src='./product_images/$product_image1' class='card-img-top' alt='$product_title'>
                    //             <div class='card-body'>
                    //                 <h5 class='card-title'>$product_title</h5>
                    //                 <p class='card-text'>$product_description</p>
                    //                 <a href='#' class='btn btn-p'>Add to cart</a>
                    //                 <a href='#' class='btn-v '>View more</a>
                    //             </div>
                    //         </div>
                    //     </div>";
                    // }
                    
                    ?>
                        
                    </div>

                </div>

                <!-- side nav -->
                <div class="col-md-2 side-nav p-0">
                    <!-- Delivery brands list -->
                    <ul class="navbar-nav me-auto text-center">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-light dbrands-h"><h4>Delivery Brands</h4></a>
                        </li>

                        <!-- php for getting data from database -->

                        <?php

                            getbrands();

                        ?>

                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link b">Brands 1</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link b">Brands 2</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link b">Brands 3</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link b">Brands 4</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link b">Brands 5</a>
                        </li> -->
                    </ul>

                    <!-- Category list -->
                    <ul class="navbar-nav me-auto text-center">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-light dbrands-h"><h4>Categories</h4></a>
                        </li>

                        <!-- php for getting data from database -->

                        <?php

                            getcategory(); 

                        ?>

                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link b">Categories 1</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link b">Categories 2</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link b">Categories 3</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link b">Categories 4</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link b">Categories 5</a>
                        </li> -->
                    </ul>

                </div>

            </div>
            <!-- end of fourth child -->
        </div>

    <div class="footer">
        <p>All right s reserved @ - Designed by Team 6 - 2023</p>
    </div>

    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
    crossorigin="anonymous"></script>

</body>
</html>