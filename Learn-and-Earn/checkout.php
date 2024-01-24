<!-- database connection -->

<?php
    include('connection.php');
    // include('functions/common_function.php');
    @session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Earn&Learn | Checkout page</title>

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
    <link rel="stylesheet" href="css/product_details.css">

    <style>

        .logo{
    width: 12%;
    height: 6%;
    margin-left: 0;
    margin-bottom: 0;

}

    </style>

</head>

<body>
        
<?php 



?>


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
                            <a class="cart" href="cart.php"><i class="fa-solid fa-cart-shopping fa-xl" style="color: #00dd00;"></i><sup><?php ?></sup></a>
                            </li>
                            
                        </ul>
                       
                    </div>
                </div>
            </nav>
            <!-- end first child -->

<!--            ******calling cart function  -->

         
            <!-- second child -->
            <nav class="heading-sub mb-4" style="background-color: #00dd00;">
                <ul>
                <li><p>Welcome <?php if(isset($_SESSION['username'])){
                            echo $_SESSION['username'];
                        }else{
                            echo "guest"; 
                        } ?></p></li>

                    <?php
                if(!isset($_SESSION['username'])){
                    echo "  <li>
                        <a class='btn-login' href='user_login.php'>Login</a>
                    </li>";
                    
                }else{
                    echo " <li>
                    <a class='btn-login' href='user_logout.php'>Logout</a>
                </li>";

                }
                    
                    ?>

                    
                </ul>
            </nav>

        <!-- <div class="heading">
            <h1>Empowering the Next Generation of Entrepreneurs</h1>
            <p>Where Student Talent Shines, and Dreams Become Sales!</p>
        </div> -->
            <!-- end of second child -->
        <!-- </div> -->

        <!-- products -->
        

    </div>

        <div class="products">
            <!-- third child -->
            <h1 class="text-center" style="color: #00dd00;">My Cart</h2>
            <!-- enf of third child -->

            <div class="row px-1">
                <div class="col-md-12">
                    <!-- products -->
                    <div class="row">
                        <?php 
                        if(!isset($_SESSION['username'])){
                            include('user_login.php');
                        }else{
                            include('payment.php');
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- fourth child table -->
            
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