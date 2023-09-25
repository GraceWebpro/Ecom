<?php

if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    //echo $edit_id;
    $edit_query="SELECT * FROM products where product_id=$edit_id";
    $user_result=mysqli_query($con,$edit_query);
    $row_fetch=mysqli_fetch_assoc($user_result);
    $product_title=$row_fetch['product_title'];
    //echo $product_title;
    $product_description=$row_fetch['product_description'];
    $product_keywords=$row_fetch['product_keywords'];
    $category_id=$row_fetch['category_id'];
    $brand_id=$row_fetch['brand_id'];
    $product_image1=$row_fetch['product_image1'];
    $product_image2=$row_fetch['product_image2'];
    $product_image3=$row_fetch['product_image3'];
    $product_price=$row_fetch['product_price'];

    //getting category
    $select_category="SELECT * FROM categories where category_id=$category_id";
    $select_result=mysqli_query($con, $select_category);
    $row=mysqli_fetch_assoc($select_result);
    $category_title=$row['category_title'];
    $category_id=$row['category_id'];
    //echo $category_title;    
    
    //getting brand
    $select_brand="SELECT * FROM brands";
    $select_result=mysqli_query($con, $select_brand);
    $row=mysqli_fetch_assoc($select_result);
    $brand_title=$row['brand_title'];
    $brand_id=$row['brand_id'];
    //echo $brand_id;                           
    
                        
}


if(isset($_POST['update_product'])){

    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_desc'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brand=$_POST['product_brand'];
    $product_price=$_POST['product_price'];
    $product_status='true';

    //accesing images
    $product_image1=basename($_FILES['product_image1']['name']);
    $product_image2=basename($_FILES['product_image2']['name']);
    $product_image3=basename($_FILES['product_image3']['name']);

    //accesing image tmp name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    //checking empty condition
    if($product_title=="" or $product_description=="" or $product_keywords=='' or $product_category=='' or $product_brand=='' or
    $product_price=='' or $product_image1=='' or $product_image2=='' or 
    $product_image3=='' ){
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    } else {
        copy($temp_image1,  "/admin_area/product_images/$product_image1");
        copy($temp_image2, "/admin_area/product_images/$product_image2");
        copy($temp_image3, "/admin_area/product_images/$product_image3");

        //insert query
        $update_product="UPDATE `products` set product_title='$product_title',product_description='$product_description',product_keywords='$product_keywords',category_id='$product_category',brand_id='$product_brand',product_image1='$product_image1',product_image2='$product_image2',product_image3='$product_image3',product_price='$product_price',date=NOW() where product_id=$edit_id";
        $result_query=mysqli_query($con, $update_product);
        if($result_query){
            echo "<script>alert('Successfully updated the product')</script>";
            echo "<script>window.open('./index.php?view_products','_self')</script>";
        }

    }

}
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF_8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit products</title>
    <style>
        .prof-img{
            width: 100px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <div class='container mt-5'>
        <h3 class='text-center'>Edit products</h3>
        <form action='' method='post' enctype='multipart/form-data'>
            <div class='form-outline w-50 m-auto mb-4'>
                <label for='product' class='form-lable'>Product Title</label>
                <input value='<?php echo $product_title ?>' type='text' id='product' name='product_title' class='form-control' required>
            </div>
            <div class='form-outline w-50 m-auto mb-4'>
                <label for='description' class='form-lable'>Product Description</label>
                <input value='<?php echo $product_description ?>' type='text' id='description' name='product_desc' class='form-control' required>
            </div>
            <div class='form-outline w-50 m-auto mb-4'>
                <label for='keywords' class='form-lable'>Product Keywords</label>
                <input value='<?php echo $product_keywords ?>' type='text' id='keywords' name='product_keywords' class='form-control' required>
            </div>
            <div class='form-outline w-50 m-auto mb-4'>
                <select name='product_category' class='form-select'>
                    <option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>

                        <?php

                        $select_category="SELECT * FROM categories";
                        $select_result=mysqli_query($con, $select_category);
                        while($row=mysqli_fetch_assoc($select_result)){
                            $category_title=$row['category_title'];
                            $category_id=$row['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";                           
                        }

                        ?>
                        

                    </select>
            </div>
            <div class='form-outline mb-4 w-50 m-auto'>
                <select name='product_brand' class='form-select'>
                    <option value="<?php echo $brand_title ?>"><?php echo $brand_title ?></option>
                        <?php

                        $select_brand="SELECT * FROM brands";
                        $select_result=mysqli_query($con, $select_brand);
                        while($row=mysqli_fetch_assoc($select_result)){
                            $brand_title=$row['brand_title'];
                            $brand_id=$row['brand_id'];
                            echo "<option value='$brand_id'>$brand_title</option>";                           
                        }

                        ?>
                        
                </select>
            </div>
             <!-- image 1-->
             <div class='form-outline mb-4 w-50 m-auto'>
                    <label for="product_image1" class='form-label'>Product image 1</label>
                    <div class='d-flex'>
                        <input type='file' name='product_image1' id='product_image1' class='form-control' required>
                        <!-- <img src='./images/<?php echo $temp_image1 ?>' alt=''> -->
                        <img src='../images/apple.png' alt='' class='prof-img'>
                    </div>
                </div>

                <!-- image 2-->
                <div class='form-outline mb-4 w-50 m-auto'>
                    <label for="product_image2" class='form-label'>Product image 2</label>
                    <div class='d-flex'>
                        <input type='file' name='product_image2' id='product_image2' class='form-control' required>
                        <img src='../images/bootie.jpg' alt='' class='prof-img'>
                    </div>
                </div>

                <!-- image 3-->
                <div class='form-outline mb-4 w-50 m-auto'>
                   
                    <label for="product_image3" class='form-label'>Product image 3</label>
                    <div class='d-flex'>
                        <input type='file' name='product_image3' id='product_image3' class='form-control' required>
                        <img src='../images/shoe3.jpg' alt='' class='prof-img'>
                    </div>
                </div>

                <!-- product price -->
                <div class='form-outline mb-4 w-50 m-auto'>
                    <label for="product_price" class='form-label'>Product price</label>
                    <input value='<?php echo $product_price ?>' type='text' name='product_price' id='product_price' class='form-control' placeholder='Enter product price' autocomplete='off' required>
                </div>

                <!-- product price -->
                <div class='form-outline mb-4 w-50 m-auto text-center'>
                    <input type='submit' name='update_product' class='btn btn-info mb-3 px-3' value='Update Product'>
                </div>
        </form>
    </div>
    </body>
    </html>