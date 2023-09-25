<?php
if(isset($_GET['delete_category'])){
    $delete_id=$_GET['delete_category'];

    //delete query
    $delete="DELETE FROM categories where category_id=$delete_id";
    $result=mysqli_query($con,$delete);
    if($result){
        echo "<script>alert('Successfully deleted')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
        
    }

}
?>