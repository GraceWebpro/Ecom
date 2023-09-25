<?php
if(isset($_GET['delete_product'])){
    $delete_id=$_GET['delete_product'];

    //delete query
    $delete="DELETE FROM products where product_id=$delete_id";
    $result=mysqli_query($con,$delete);
    if($result){
        echo "<script>alert('Successfully deleted')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
        
    }

}
?>