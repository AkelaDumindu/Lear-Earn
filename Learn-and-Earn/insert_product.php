<?php
    include('connection.php'); //connection variable

    if(isset($_POST['insert_product'])) {
        $product_title = $_POST['product_title'];
        $product_description = $_POST['product_description'];
        $product_keyword = $_POST['product_keyword'];
        $product_category = $_POST['product_category'];
        $product_brand = $_POST['product_brand'];
        $product_price = $_POST['product_price'];
        $product_status = 'true';

        //images
        $product_image1 = $_FILES['product_image1']['name'];
        $product_image2 = $_FILES['product_image2']['name'];
        $product_image3 = $_FILES['product_image3']['name'];

        //image temp name
        $temp_image1 = $_FILES['product_image1']['tmp_name'];
        $temp_image2 = $_FILES['product_image2']['tmp_name'];
        $temp_image3 = $_FILES['product_image3']['tmp_name'];

        //checking empty condition
        if($product_title=='' or $product_description=='' or $product_keyword=='' or
        $product_category=='' or $product_brand=='' or $product_price=='' or $product_image1=='' or
        $product_image2=='' or $product_image3=='') {
            echo "<script>alert('Please fill all the fields')</script>";
            exit();
        }
        else {
            move_uploaded_file($temp_image1, "./product_images/$product_image1");
            move_uploaded_file($temp_image2, "./product_images/$product_image2");
            move_uploaded_file($temp_image3, "./product_images/$product_image3");

            //insert product
            $insert_products = "insert into products (product_title, product_description, product_keywords, 
            category_ID, brand_ID, product_image1, product_image2, product_image3, product_price, date, status) values 
            ('$product_title', '$product_description', '$product_keyword', '$product_category', '$product_brand', 
            '$product_image1', '$product_image2','$product_image3', '$product_price', NOW(), '$product_status')";

            $result_query = mysqli_query($con, $insert_products);

            if($result_query) {
                echo "<script>alert('Successfully inserted the peoducts')</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Earn&Learn | Insert Products</title>

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
    <link rel="stylesheet" href="insert_product.css">

</head>
<body>

    <!-- nav bar -->

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
                        <a class="n-link" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="n-link" href="#">Products</a>
                        </li>
                        <li class="nav-item">
                        <a class="n-link" href="#">Contact</a>
                        </li>
                        <!-- <li class="nav-item">
                        <a class="n-link register" href="#">Register</a>
                        </li> -->
                        <!-- <li class="nav-item">
                        <a class="cart" href="#"><i class="fa-solid fa-cart-shopping fa-xl" style="color: #00dd00;"></i><sup>1</sup></a>
                        </li>
                        <li class="nav-item">
                        <a class="tprice" href="#">Total Price:100/-</a>
                        </li> -->
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control0 me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- end first child -->
    </div>

    <!-- End of nav bar -->


    <!-- Insert products form -->


    <div class="container">
        <h1 class="text-center">Insert Products</h1>

        <div class="form-container">
            <!-- form -->
            <form action="" method="post" enctype="multipart/form-data">

                <!-- p title -->
                <div class="form-outline mb-4 m-auto">
                    <label for="product_title" class="form-label">
                        Product Title
                    </label>
                    <input type="text" name="product_title" id="product_title" class="form-control" 
                    placeholder="Enter product title" autocomplete="off" required="required">
                </div>

                <!-- p description -->
                <div class="form-outline mb-4 m-auto">
                    <label for="product_description" class="form-label">
                    product Description
                    </label>
                    <input type="text" name="product_description" id="product_description" class="form-control" 
                    placeholder="Enter product description" autocomplete="off" required="required">
                </div>

                <!-- p keyword -->
                <div class="form-outline mb-4 m-auto">
                    <label for="product_keyword" class="form-label">
                    product Keywords
                    </label>
                    <input type="text" name="product_keyword" id="product_keyword" class="form-control" 
                    placeholder="Enter product keyword" autocomplete="off" required="required">
                </div>

                <!-- p categories -->
                <div class="form-outline mb-4 m-auto">
                    <label for="product_category" class="form-label">
                    Select product category & brand
                    </label>
                    <select name="product_category" id="" class="form-select">
                        <option value="">Select a Category</option>

                        <?php

                            $select_query = "Select * from categories";
                            $result_query = mysqli_query($con, $select_query);

                            while($row = mysqli_fetch_assoc($result_query)) {
                                $category_title = $row['category_title'];
                                $category_id = $row['category_id'];
                                echo "<option value='$category_id'>$category_title</option>";
                            }
                        ?>
                        <!-- <option value="">Category1</option>
                        <option value="">Category2</option>
                        <option value="">Category3</option>
                        <option value="">Category4</option> -->
                    </select>
                </div>

                <!-- p brands -->
                <div class="form-outline mb-4 m-auto">
                    <select name="product_brand" id="" class="form-select">
                        <option value="">Select a Brand</option>

                        <?php

                            $select_query = "Select * from brand";
                            $result_query = mysqli_query($con, $select_query);

                            while($row = mysqli_fetch_assoc($result_query)) {
                                $brand_title = $row['brand_title'];
                                $brand_id = $row['brand_id'];
                                echo "<option value='$brand_id'>$brand_title</option>";
                            }
                        ?>

                        <!-- <option value="">Brand1</option>
                        <option value="">Brand2</option>
                        <option value="">Brand3</option>
                        <option value="">Brand4</option> -->
                    </select>
                </div>

                <!-- p image 1 -->
                <div class="form-outline mb-4 m-auto">
                    <label for="product_image1" class="form-label">
                    product Image 1
                    </label>
                    <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
                </div>

                <!-- p image 2 -->
                <div class="form-outline mb-4 m-auto">
                    <label for="product_image2" class="form-label">
                    product Image 2
                    </label>
                    <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
                </div>

                <!-- p image 3 -->
                <div class="form-outline mb-4 m-auto">
                    <label for="product_image3" class="form-label">
                    product Image 3
                    </label>
                    <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
                </div>

                <!-- p price -->
                <div class="form-outline mb-4 m-auto">
                    <label for="product_price" class="form-label">
                    product Price
                    </label>
                    <input type="text" name="product_price" id="product_price" class="form-control" 
                    placeholder="Enter product price" autocomplete="off" required="required">
                </div>

                <!-- p button -->
                <div class="form-outline mb-4 m-auto">
                    <input type="submit" name="insert_product" class="btn0 btn-p" value="Insert Procucts">
                </div>

            </form>

        </div>
    </div>

    <!-- End Insert products form -->


    <div class="footer">
        <p>All rights reserved @ - Designed by Team 6 - 2023</p>
    </div>
    
    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
    crossorigin="anonymous"></script>

</body>
</html>