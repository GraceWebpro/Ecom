<?php

    include('../includes/connect.php');
    if(isset($_POST['insert_cat'])){
        $category_title=$_POST['cat_title'];

        //select data from database
        $select_query="SELECT * FROM categories where category_title='$category_title'";
        $select_result=mysqli_query($con,$select_query);

        $number=mysqli_num_rows($select_result);
        if($number>0) {
            echo "<script>alert('This category is present inside the database')</script>";
        }else{

        $insert_query="INSERT INTO categories (category_title) VALUES ('$category_title')";
        $result=mysqli_query($con,$insert_query);
        if($result){
            echo "<script>alert('Category has been inserted succesfully')</script>";
        }
    }}

?>

<h2 class='text-center'>Insert Category</h2>
<form action='' method='post' class='mb-2'>
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa fa-book" aria-hidden="true"></i>
        </span>
        <input type="text" class="form-control" name='cat_title' placeholder="Insert Categories" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2">
        <input type="submit" class="bg-info p-2 my-3 border-0" name='insert_cat' value="Insert Categories" aria-label="Username" aria-describedby="basic-addon1" class='bg-info'>
        <!--<button class="bg-info p-2 my-3 border-0">Insert Category</button>
-->
    </div>
</form>