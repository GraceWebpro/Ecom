<?php
if(isset($_GET['edit_category'])){
    $edit_id=$_GET['edit_category'];

    $fetch="SELECT * FROM categories where category_id=$edit_id";
    $select_result=mysqli_query($con, $fetch);
    $row=mysqli_fetch_assoc($select_result);
    $category_title=$row['category_title'];
    //echo $category_title;

}

if(isset($_POST['update_category'])){
    $cat_title=$_POST['cat_title'];

    $update_query="UPDATE categories set category_title='$cat_title' where category_id=$edit_id";
    $result=mysqli_query($con, $update_query);
    if($result){
        echo "<script>alert('Successfully updated the category')</script>";
        echo "<script>window.open('index.php?view_categories','_self')</script>";
   
    }

}
?>

<div class='container mt-3'>
    <h3 class='text-center mb-4 mt-4'>Edit Category</h3>
    <form class='text-center' action='' method='post'>
        <div class='form-outline mb-4 w-50 m-auto'>
            <label for='categoty'>Category title</label>
            <input type='text' value='<?php echo $category_title ?>' name='cat_title' id='category' class='form-control' required>
        </div>
        <input type='submit' name='update_category' class='btn btn-info px-3 mb-3' value='Update category'>
    </form>
</div>