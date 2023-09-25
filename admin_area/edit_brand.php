<?php
if(isset($_GET['edit_brand'])){
    $edit_id=$_GET['edit_brand'];

    $fetch="SELECT * FROM brands where brand_id=$edit_id";
    $select_result=mysqli_query($con, $fetch);
    $row=mysqli_fetch_assoc($select_result);
    $brand_title=$row['brand_title'];
    //echo $category_title;

}

if(isset($_POST['update_brand'])){
    $brand_tit=$_POST['brand_title'];

    $update_query="UPDATE brands set brand_title='$brand_tit' where brand_id=$edit_id";
    $result=mysqli_query($con, $update_query);
    if($result){
        echo "<script>alert('Successfully updated the brand')</script>";
        echo "<script>window.open('index.php?view_brands','_self')</script>";
   
    }
}
?>

<div class='container mt-3'>
    <h3 class='text-center mb-4 mt-4'>Edit Brand</h3>
    <form class='text-center' action='' method='post'>
        <div class='form-outline mb-4 w-50 m-auto'>
            <label for='brand'>Brand title</label>
            <input type='text' value='<?php echo $brand_title ?>' name='brand_title' id='brand' class='form-control' required>
        </div>
        <input type='submit' name='update_brand' class='btn btn-info px-3 mb-3' value='Update brand'>
    </form>
</div>