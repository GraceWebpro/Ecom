<?php

//include connect file
//include('./includes/connect.php');

//include product function file
include('./functions/common_function.php');

?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF_8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user registration</title>
    
    <!-- bootsrtap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- style link -->
    <link rel="stylesheet" href="style.css" />
</head>
    <body>

        <div class='container-fluid my-3'>
            <h2 class='text-center mb-8'>User Login</h2>
            <div class='row d-flex align-items-center justify-content-center'>
                <div class='col-lg-12 col-xl-6'>
                    <form action='' method='post' enctype='multipart/form-data'>
                        <!-- username field -->
                        <div class='form-outline mb-4 w-50 m-auto'>
                            <label for='username' class='form-label'>Username</label>
                            <input type='text' id='username' class='form-control' placeholder='Enter your username' autocomplete='off' name='user_username' required>
                        </div>
                        
                        
                        <!-- password field -->
                        <div class='form-outline mb-4 w-50 m-auto'>
                            <label for='password' class='form-label'>Password</label>
                            <input type='password' id='password' class='form-control' placeholder='Enter your password' autocomplete='off' name='user_password' required>
                        </div>

                        <!-- button -->
                        <div class='text-center mt-4 pt-2'>
                            <p class='small fw-bold mt-2 pt-1'><a href='user_registration.php' class='text-info'>Forgot password ?</a></p>
                            <input type='submit' name='user_login' value='Login' class='bg-info border-0 py-2 px-3'>
                            <p class='small fw-bold mt-2 pt-1'>Don't have an account ?<a href='user_registration.php' class='text-danger'> Register</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        

        <!-- bootstrap js link -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>

<!--php code-->
<?php

if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    $user_ip = getIPAddress();
    echo $user_password;

    $select_query="SELECT * FROM user_table where username='$user_username'";
    $select_result=mysqli_query($con,$select_query);
    $row_data=mysqli_fetch_assoc($select_result);

    $user_number=mysqli_num_rows($select_result);

    //cart items
    $select_cart="SELECT * FROM cart_details where ip_address='$user_ip'";
    $result=mysqli_query($con,$select_cart);
    $cart_number=mysqli_num_rows($result);


    if($user_number>0){
        if(password_verify($user_password,$row_data['user_password'])){
            //echo "<script>alert('Login successful')</script>";
            if($number==1 and $cart_number==0){
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            } else {
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
           
            }
        } else {
            echo "<script>alert('Invalid credentials')</script>";
        }

    } else {
        echo "<script>alert('Invalid credentials')</script>";
    }

    
}
?>