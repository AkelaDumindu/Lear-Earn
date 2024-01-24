<?php 
include('connection.php');
include('functions/common_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>

    <!--bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!--font Awesome link-->
    <!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />-->
    <!---->


</head>
<style>
    body {
      overflow-x: hidden;
      margin: 0; /* Add this to remove default margin */
      font-family: Arial, sans-serif; /* Add a default font */
    }

    .login {
      background-color: rgba(0, 0, 0, 0.1);
      /* text-align: center; */
      width: 30%;
      border-radius: 25px;
      margin: 200px auto; /* Use auto for vertical margin */
      padding: 20px; /* Add some padding */
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
      margin-top: 50px;
      margin-bottom: 50px;
    }

    .btn-p {
      width: 250px;
      font-size: 16px;
      font-weight: 400;
      color: rgba(255, 255, 255, 0.7);
      padding: 5px 20px;
      border-radius: 20px;
      background-color: rgba(0, 0, 0, 0.2);
      margin: 20px 0;
      border: none; /* Use 'none' instead of '0' */
    }
    .tt{
        text-align: center;
    }
  </style>
</head>
<body>
  <div class="login">
    <h2 class="text-center">User Login</h2>

    <form action="" method="post">
      <div class="form-outline mb-4">
        <label for="user_username" class="form-label">Username</label>
        <input type="text" id="user_username" class="form-control" placeholder="Enter Your Username" autocomplete="off" required name="user_username"/>
      </div>

      <div class="form-outline mb-4">
        <label for="user_password" class="form-label">Password</label>
        <input type="password" id="user_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required name="user_password"/>
      </div>

      <div class="mt-4 pt-2 tt">
        <input type="submit" value="Login" class="bg-info py-2 px-4 border-0 btn-p" name="user_login">
        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="user_registration.php" class="text-danger">Register</a></p>
      </div>
    </form>
  </div>
</body>
</html>

<?php
if(isset($_POST['user_login'])){
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    $select_query = "SELECT * FROM user_table WHERE username='$user_username'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();

    // checking cart
    $select_query_cart = "SELECT * FROM cart_details WHERE ip_address='$user_ip'";
    $result_cart = mysqli_query($con, $select_query_cart);
    $row_count_cart = mysqli_num_rows($result_cart);

// CHECKING that have more than rows related that user name
    if($row_count>0){
        $_SESSION['username'] = $user_username;
        if(password_verify($user_password,$row_data['user_password'])){
            // echo "<script>alert('Login successful')</script>";
            if($row_count==1 AND $row_count_cart==0){
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            }else{
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }

        }else{
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }else{
        echo "<script>alert('Invalid Credentials')</script>";
    }


}



?>

