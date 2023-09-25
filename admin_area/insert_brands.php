<?php

include('../includes/connect.php');
if(isset($_POST['insert_brand'])){
    $brand_title = $_POST['brand_title'];

    //select from database 
    $select_query="SELECT * FROM brands where brand_title='$brand_title'";
    $select_result=mysqli_query($con, $select_query);

    //check for numbers of the selected data in the database
    $number=mysqli_num_rows($select_result);
    if($number>0){
        echo "<script>alert('This brand is present inside the database')</script>";
    } else {

        $insert_query= "INSERT INTO brands (brand_title) VALUES ('$brand_title')";
        $result=mysqli_query($con, $insert_query);
        if($result) {
            echo "<script>alert('Brand has been inserted successfully')</script>";
        }
    }
};



?>
<h2 class='text-center'>Insert Brands</h2>
<form action='' method='post' class='mb-2'>
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa fa-book" aria-hidden="true"></i>
        </span>
        <input type="text" class="form-control" name='brand_title' placeholder="Insert Brands" aria-label="Brands" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2">
        <input type="submit" class="bg-info my-3 p-2 border-0" name='insert_brand' value="Insert Brands" aria-label="Username" aria-describedby="basic-addon1" class='bg-info'>
        <!--<button class="bg-info p-2 my-3 border-0">Insert Brands</button>
-->
    </div>
</form>