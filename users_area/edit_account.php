<?php

//include connect file
//include('../includes/connect.php');

//include product function file
//include('../functions/common_function.php');

if(isset($_GET['edit_account'])){
    $user_username=$_SESSION['username'];
    $user_query="SELECT * FROM user_table where username='$user_username'";
    $user_result=mysqli_query($con,$user_query);
    $row_fetch=mysqli_fetch_assoc($user_result);
    $user_id=$row_fetch['user_id'];
    $username=$row_fetch['username'];
    $user_email=$row_fetch['user_email'];
    $user_address=$row_fetch['user_address'];
    $user_mobile=$row_fetch['user_mobile'];




}

if(isset($_POST['user_update'])){
    $update_id=$user_id;
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_address=$_POST['user_address'];
    $user_mobile=$_POST['user_mobile'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    move_uploaded_file($user_image_tmp, "./user_images/" . $user_image);

  
    // Check if a file has been uploaded successfully
    if (isset($_FILES['user_image'])) {
        $user_image = $_FILES['user_image']['name'];      // Original file name
        $user_image_tmp = $_FILES['user_image']['tmp_name'];   // Temporary file location

        // Specify the destination directory where you want to move the file
        $destination_directory = "./user_images/"; // Change this to your desired directory

        // Construct the full path to the destination file
        $destination_path = $destination_directory . $file_name;

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($file_tmp, $destination_path)) {
            // File was successfully moved
            echo "<script>alert('File uploaded and moved to $destination_path')</script>";
        } else {
            // Something went wrong with the file move
            echo "File upload failed.";
        }
    } else {
        // No file was uploaded
        echo "No file uploaded.";
    }


    
    $update_data="UPDATE user_table set username='$user_username',user_email='$user_email',user_image='$user_image',user_address='$user_address',user_mobile='$user_mobile' where user_id=$update_id";
    $update_result=mysqli_query($con,$update_data);
    if($update_result){
        echo "<script>alert('Data updated succesfully')</script>";
        echo "<script>window.open('logout.php','_self')</script>";

    }


}

?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF_8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit account</title>
    
    <!-- bootsrtap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- style link -->
    <link rel="stylesheet" href="../style.css" />
    <style>
        .prof-img {
            width: 100px;
            height: 100px;
            margin: auto;
            display: block;
            object-fit: contain;
        }
    </style>
</head>
    <body>
        <h3 class='text-center text-success'>Edit Account</h3>
        <form action='' method='post' enctype='multipart/form-data' class='text-center'>
            <div class='form-outline mb-4'>
                <input value='<?php echo $username ?>' type='text' class='form-control w-50 m-auto' name='user_username'>
            </div>
            <div class='form-outline mb-4'>
                <input type='email' class='form-control w-50 m-auto' value="<?php echo $user_email ?>" name='user_email'>
            </div>
            <div class='form-outline mb-4 d-flex  w-50 m-auto'>
                <input type='file' class='form-control m-auto' name='user_image'>
                <img src='../images/bootie.jpg' class='prof-img' alt=''>
            </div>
            <div class='form-outline mb-4'>
                <input type='text' class='form-control w-50 m-auto' value="<?php echo $user_address ?>" name='user_address'>
            </div>
            <div class='form-outline mb-4'>
                <input type='text' class='form-control w-50 m-auto' value="<?php echo $user_mobile ?>" name='user_mobile'>
            </div>

            <input type='submit' value='Update' name='user_update' class='bg-info py-3 px-2 border-0'>

        </form>
    </body>

</html>