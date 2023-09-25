<?php

include('../includes/connect.php');
$uploads_dir='/admin_area/product_images/';
    if(isset($_POST['insert_product'])){

        $product_title=$_POST['product_title'];
        $product_description=$_POST['product_description'];
        $product_keywords=$_POST['product_keywords'];
        $product_category=$_POST['product_category'];
        $product_brand=$_POST['product_brand'];
        $product_price=$_POST['product_price'];
        $product_status='true';

        //accesing images
        $product_image1=basename($_FILES['product_image1']['name']);
       
        //accesing image tmp name
        $temp_image1=$_FILES['product_image1']['tmp_name'];
        
        //checking empty condition
        if($product_title=="" or $product_description=="" or $product_keywords=='' or $product_category=='' or $product_brand=='' or
        $product_price=='' or $product_image1==''
        ){
            echo "<script>alert('Please fill all the available fields')</script>";
            exit();
        } else {
            move_uploaded_file($temp_image1,  "/admin_area/product_images/$product_image1");
            
            //insert query
            $insert_product="INSERT INTO `products` (product_title,product_description,product_keywords,category_id,brand_id,product_image1,product_price,date,status)
             VALUES ('$product_title','$product_description','$product_keywords','$product_category','$product_brand','$product_image1','$product_price',NOW(),'$product_status')";
            $result_query=mysqli_query($con, $insert_product);
            if($result_query){
                echo "<script>alert('Successfully insert the product')</script>";
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
        
        <!-- bootsrtap css link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        
        <!-- font awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- style link -->
        <link rel="stylesheet" href="style.css" />
        
        <title>Insert Products - Admin Dashboard</title>
    </head>
    <body class='bg-light'>

        <div class='container mt-3'>
            <h1 class='text-center'>Insert Products</h1>
            <!-- form -->
            <form action="" method="post" enctype="multipart/form-data">
                
                <!-- product title -->
                <div class='form-outline mb-4 w-50 m-auto'>
                    <label for="product_title" class='form-label'>Product title</label>
                    <input type='text' name='product_title' id='product_title' class='form-control' placeholder='Enter product title' autocomplete='off' required>
                </div>

                <!--description-->
                <div class='form-outline mb-4 w-50 m-auto'>
                    <label for="product_description" class='form-label'>Product description</label>
                    <input type='text' name='product_description' id='product_description' class='form-control' placeholder='Enter product description' autocomplete='off' required>
                </div>

                <!--product keywords-->
                <div class='form-outline mb-4 w-50 m-auto'>
                    <label for="product_keywords" class='form-label'>Product keywords</label>
                    <input type='text' name='product_keywords' id='product_keywords' class='form-control' placeholder='Enter product keywords' autocomplete='off' required>
                </div>

                <!-- categories -->
                <div class='form-outline mb-4 w-50 m-auto'>
                    <select name='product_category' class='form-select'>
                        <option value="">Select a category</option>

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

                <!-- brands -->
                <div class='form-outline mb-4 w-50 m-auto'>
                    <select name='product_brand' class='form-select'>
                        <option value="">Select a brand</option>
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
                    <input type='file' name='product_image1' id='product_image1' class='form-control' required>
                </div>

                <!-- product price -->
                <div class='form-outline mb-4 w-50 m-auto'>
                    <label for="product_price" class='form-label'>Product price</label>
                    <input type='text' name='product_price' id='product_price' class='form-control' placeholder='Enter product price' autocomplete='off' required>
                </div>

                <!-- product price -->
                <div class='form-outline mb-4 w-50 m-auto'>
                    <input type='submit' name='insert_product' class='btn btn-info mb-3 px-3' value='Insert Product'>
                </div>
            </form>
        </div>


    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>