<?php

include('../functions/common_function.php');
session_start();

?>


<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF_8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    
    <!-- bootsrtap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- style link -->
    <link rel="stylesheet" href="style.css" />
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
</head>
    <body>

        <div class='container-fluid my-3'>
            <h2 class='text-center mb-8'>Admin Login</h2>
            <div class='row d-flex align-items-center justify-content-center'>
                <div class='col-md-6 col-xl-5'>
                    <img src='../images/login.jpg' width='400' height='400' alt='admin login'>
                </div>
                <div class='col-md-6 col-xl-5'>
                    <form action='' method='post' enctype='multipart/form-data'>
                        <!-- username field -->
                        <div class='form-outline mb-4'>
                            <label for='username' class='form-label'>Username</label>
                            <input type='text' id='username' class='form-control' placeholder='Enter your username' autocomplete='off' name='username' required>
                        </div>
                        
                        
                        <!-- password field -->
                        <div class='form-outline mb-4'>
                            <label for='password' class='form-label'>Password</label>
                            <input type='password' id='password' class='form-control' placeholder='Enter your password' autocomplete='off' name='password' required>
                        </div>

                        <!-- button -->
                        <div class=' mt-4 pt-2'>
                            <p class='small fw-bold mt-2 pt-1'><a href='user_registration.php' class='text-info'>Forgot password ?</a></p>
                            <input type='submit' name='admin_login' value='Login' class='bg-info border-0 py-2 px-3'>
                            <p class='small fw-bold mt-2 pt-1'>Don't have an account ?<a href='admin_registration.php' class='text-danger'> Register</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        

        <!-- bootstrap js link -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>

<?php

if(isset($_POST['admin_login'])){
    global $con;
    //$ip=getIPAddress();
    $admin_name=$_POST['username'];
    $admin_password=$_POST['password'];
    
    $user_query="SELECT * FROM admin_table where admin_name='$admin_name'";
    $user_result=mysqli_query($con,$user_query);
    $user_data=mysqli_fetch_assoc($user_result);
    $user_row=mysqli_num_rows($user_result);


    if($user_row>0){
        $_SESSION['username']=$admin_name;

        if(password_verify($admin_password,$user_data['admin_password'])){
            $_SESSION['username']=$admin_name;

            echo "<script>alert('Admin logged in')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            echo "<script>alert('Invalid credentials')</script>";
        }
    } else {
        echo "<script>alert('Invalid credentials')</script>";
    }
}

?>