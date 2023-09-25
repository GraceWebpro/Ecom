<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF_8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My orders</title>
</head>
<body>
    <h3 class='text-danger mb-4'>Delete Account</h3>
    <form action='' method='post' class='mt-5'>
        <div class='form-outline mb-4'>
            <input type='submit' class='form-control text-center w-50 m-auto' name='delete' value='Delete Account'>
        </div>
        <div class='form-outline mb-4'>
            <input type='submit' class='form-control text-center w-50 m-auto' name='dont_delete' value="Don't Delete Account"></button>
        </div>
    </form>
</body>
</html>

<?php

$username_session=$_SESSION['username'];
if(isset($_POST['delete'])){
    $delete_query="DELETE FROM user_table where username='$username_session'";
    $user_result=mysqli_query($con,$delete_query);
    if($user_result){
        session_destroy();
        echo "<script>alert('Account deleted successfully')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }

}

if(isset($_POST['dont_delete'])){
    echo "<script>window.open('../index.php','_self')</script>";
}


?>