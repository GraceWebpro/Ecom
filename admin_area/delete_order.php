<?php
if(isset($_GET['delete_order'])){
    $delete_id=$_GET['delete_order'];

    //delete query
    $delete="DELETE FROM user_orders where order_id=$delete_id";
    $result=mysqli_query($con,$delete);
    if($result){
        echo "<script>alert('Successfully deleted')</script>";
        echo "<script>window.open('./index.php?all_orders','_self')</script>";
        
    }

}
?>