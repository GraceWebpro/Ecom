<?php
if(isset($_GET['delete_brand'])){
    $delete_id=$_GET['delete_brand'];

    //delete query
    $delete="DELETE FROM brands where brand_id=$delete_id";
    $result=mysqli_query($con,$delete);
    if($result){
        echo "<script>alert('Successfully deleted')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
        
    }

}
?>