<?php
 include('connection.php');
 include('functions/common_function.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>

    <!--bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!--font Awesome link-->
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />-->
<!---->


</head>
<body>
<div class="container-fluid my-3">
    <h2 class="text-center">New User Registration</h2>

    <div class="row d-flex align-item-center justify-content-center">
        <div class="col-lg-12 col-xl-6 ">
            <form action="" method="post" enctype="multipart/form-data">

                <!--               username field-->
                <div class="form-outline mb-3">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" id="user_username" class="form-control"
                        placeholder="Enter Your Username" autocomplete="off" required name="user_username"/>
                </div>

<!--                email field-->
                <div class="form-outline mb-3">
                    <label for="user_email" class="form-label">Email</label>
                    <input type="text" id="user_email" class="form-control"
                           placeholder="Enter Your Email" autocomplete="off" required name="user_email"/>
                </div>

<!--                Image field-->
                <div class="form-outline mb-3">
                    <label for="user_image" class="form-label">User Image</label>
                    <input type="file" id="user_image" class="form-control"
                           required name="user_image"/>
                </div>

                <!--                Password field-->
                <div class="form-outline mb-3">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" class="form-control"
                           placeholder="Enter Your Password" autocomplete="off" required name="user_password"/>
                </div>

                <!--                Confirm password field-->
                <div class="form-outline mb-3">
                    <label for="conf_user_password" class="form-label">Confirm Password</label>
                    <input type="password" id="conf_user_password" class="form-control"
                           placeholder="Confirm Password" autocomplete="off" required name="conf_user_password"/>
                </div>

                <!--               user address field-->
                <div class="form-outline mb-3">
                    <label for="user_address" class="form-label">Address</label>
                    <input type="text" id="user_address" class="form-control"
                           placeholder="Enter Your Address" autocomplete="off" required name="user_address"/>
                </div>

                <!--               Contact field-->
                <div class="form-outline mb-3">
                    <label for="user_contact" class="form-label">Contact</label>
                    <input type="text" id="user_contact" class="form-control"
                           placeholder="Enter Your mobile number" autocomplete="off" required name="user_contact"/>
                </div>

                <div class="mt-3 pt-2">
                    <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ? <a href="user_login.php" class="text-danger">Login</a></p>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>


<!-- php coding -->

<?php

if(isset($_POST['user_register'])){
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_passwod = $_POST['user_password'];
    $hash_password = password_hash($user_passwod, PASSWORD_DEFAULT);
    $con_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
      // Add 2 Attribute for image variable
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();

    // select query
    $select_query = "SELECT * FROM user_table WHERE username ='$user_username' or user_email = '$user_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('User name and email already exit!')</script>";
    }elseif($user_passwod != $con_user_password){
        echo "<script>alert('Password do not match')</script>";
    }
    else{
        // insert query
    move_uploaded_file( $user_image_tmp, "user_images/$user_image");
    $insert_query = "INSERT INTO user_table(username, user_email, user_password	, user_image, user_ip, user_address, user_mobile) 
    VALUE('$user_username', ' $user_email', '$hash_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";

    $sql_execute = mysqli_query($con, $insert_query);

    }

    // selecting cart item
    $select_cart_items = "SELECT * FROM cart_details WHERE ip_address= '$user_ip'";
    $result_cart = mysqli_query($con, $select_cart_items);
    $rows_count = mysqli_num_rows($result_cart);
    if($row_count>0){
        $_SESSION['username'] = $user_username;
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }else{
        echo "<script>window.open('index.php','_self')</script>";
    }

    

    // if($sql_execute){
    //     echo "<script>alert('Data Inserted successfully')</script>";
    // }else{
    //     die(mysqli_error($con));
    // }

}



?>

