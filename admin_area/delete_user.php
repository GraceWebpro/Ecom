<?php
if(isset($_GET['delete_user'])){
    $delete_id=$_GET['delete_user'];

    //delete query
    $delete="DELETE FROM user_table where user_id=$delete_id";
    $result=mysqli_query($con,$delete);
    if($result){
        echo "<script>alert('Successfully deleted')</script>";
        echo "<script>window.open('./index.php?all_users','_self')</script>";
        
    }

}
?>