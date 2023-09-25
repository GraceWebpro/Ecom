<?php
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF_8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    
    <!-- bootsrtap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- style link -->
    <link rel="stylesheet" href="style.css" />
</head>
    <body>
        <div class='container-fluid m-3'>
            <h2 class='text-center mb-5'>Admin Registration</h2>
            <div class='row d-flex justify-content-center '>
                <div class='col-lg-6 col-xl-5'>
                    <img src='../images/signup.jpg' alt='Admin Registration' class='img-fluid mt-8'>
                </div>

                <div class='col-lg-6 col-xl-4'>
                    <form action='' method='post' enctype='multipart/form-data' class='w-80'>
                        <div class='form-outline mb-4'>
                            <label for='username' class='form-label'>Username</label>
                            <input name='username' class='form-control' type='text' id='username' placeholder='Enter your username' required>
                        </div>

                        <div class='form-outline mb-4'>
                            <label for='useremail' class='form-label'>Email</label>
                            <input type='text' id='useremail' class='form-control' placeholder='Enter your email' autocomplete='off' name='email' required>
                        </div>

                        <div class='form-outline mb-4'>
                            <label for='userimage' class='form-label'>User Image</label>
                            <input type='file' id='userimage' class='form-control' name='image' required>
                        </div>

                         <!-- password field -->
                         <div class='form-outline mb-4'>
                            <label for='password' class='form-label'>Password</label>
                            <input type='password' id='password' class='form-control' placeholder='Enter your password' autocomplete='off' name='password' required>
                        </div>

                        <!-- password field -->
                        <div class='form-outline mb-4'>
                            <label for='conf_password' class='form-label'>Confirm Password</label>
                            <input type='password' id='conf_password' class='form-control' placeholder='Confirm password' autocomplete='off' name='conf_password' required>
                        </div>

                        <div class='mt-4 pt-2'>
                            <input type='submit' name='admin_register' value='Register' class='bg-info border-0 py-2 px-3 text-center'>
                            <p class='small fw-bold mt-2 pt-1'>Already have an account ?<a href='admin_login.php' class='text-danger'> Login</a></p>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </body>
    </html>

    <!-- php code -->
<?php
    if(isset($_POST['admin_register'])){
        $admin_name=$_POST['username'];
        $admin_email=$_POST['email'];
        $admin_password=$_POST['password'];
        $hash_password=password_hash($admin_password, PASSWORD_DEFAULT);
        $conf_password=$_POST['conf_password'];

        $image=$_FILES['image']['name'];
        $image_tmp=$_FILES['image']['tmp_name'];

        
        // Check if a file has been uploaded successfully
        if (isset($_FILES['user_image'])) {
            $user_image= $_FILES['user_image']['name'];      // Original file name
            $user_image_tmp = $_FILES['user_image']['tmp_name'];   // Temporary file location

            // Specify the destination directory where you want to move the file
            $destination_directory = "./user_images/"; // Change this to your desired directory

            // Construct the full path to the destination file
            $destination_path = $destination_directory . $user_image;

            // Move the uploaded file to the destination directory
            if (move_uploaded_file($user_image_tmp, $destination_path)) {
                // File was successfully moved
                echo "File uploaded and moved to $destination_path";
            } else {
                // Something went wrong with the file move
                echo "File upload failed.";
            }
        } else {
            // No file was uploaded
            echo "No file uploaded.";
        }


        $user_ip=getIPAddress();
/*
        $select_query="SELECT * FROM user_table where username='$user_username' or user_email=$user_email";
        $select_result=mysqli_query($con, $select_query);
        $rows_count=mysqli_num_rows($select_result);

    

        $select_query="SELECT * FROM user_table where username='$user_username'";
        $select_result=mysqli_query($con, $select_query);
        $rows_count=mysqli_num_rows($select_result);
        if($rows_count>0){
            echo "<srcipt>alert('Username already exist')</script>";
        } else {
*/
            //select data from database
        $select_query="SELECT * FROM admin_table where admin_name='$admin_name'";
        $select_result=mysqli_query($con,$select_query);

        $number=mysqli_num_rows($select_result);
        if($number>0) {
            echo "<script>alert('Admin already exist')</script>";
        } else if($admin_password!=$conf_password){
            echo "<script>alert('Password does not match')</script>";
        }
        else{
        $insert_query="INSERT INTO `admin_table` (admin_name,admin_email,admin_password) VALUES ('$admin_name','$admin_email','$hash_password')";
        $result=mysqli_query($con, $insert_query);
        if($result){
            echo "<script>alert('Admin registered')</script>";
   
        }
    }


  //selecting cart items
  $cart_items="SELECT * FROM cart_details where ip_address='$user_ip'";
  $result=mysqli_query($con,$cart_items);
  $number=mysqli_num_rows($result);
  if($number>0){
    $_SESSION['username']=$user_username;
    echo "<script>alert('You have items in your cart')</script>";
    echo "<script>window.open('admin_login.php','_self')</script>";

  } else {
    echo "<script>window.open('./index.php','_self')</script>";

  }
        
    }
?>