<?php
if(isset($_GET['delete_payment'])){
    $delete_id=$_GET['delete_payment'];

    //delete query
    $delete="DELETE FROM user_payments where payment_id=$delete_id";
    $result=mysqli_query($con,$delete);
    if($result){
        echo "<script>alert('Successfully deleted')</script>";
        echo "<script>window.open('./index.php?all_payments','_self')</script>";
        
    }

}
?>