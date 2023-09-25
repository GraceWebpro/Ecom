<?php

//include connect file
include('./includes/connect.php');

//include product function file
include('./functions/common_function.php');

@session_start();

?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF_8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website using PHP and MySQL</title>
    
    <!-- bootsrtap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- style link -->
    <link rel="stylesheet" href="style.css" />
</head>
    <body>
        <!-- navbar -->
        <div class="container-fluid p-0">
            <!-- first child -->
            <nav class="navbar navbar-expand-lg bg-info">
                <div class="container-fluid">
                    
                    <img  src="./images/basket.png" alt="" width='6%' height='6%' class="logo" />
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                        </li>
                        <?php
                        if(isset($_SESSION['username'])){
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='./users_area/profile.php'>My Account</a>
                            </li>";
                        } else {
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
                            </li>";
                        }
                        ?>
                        
                        <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item_num(); ?></sup>
                            </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">TotalPrice: $<?php total_cart_price(); ?></a>
                        </li>

                    </ul>
                    <form class="d-flex" role="search" action='' method='get'>
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name='search_data'>
                        <!--<button class="btn btn-outline-light" type="submit">Search</button>-->
                        <input type='submit' value='Search' class='btn btn-outline-light' name='search_data_product'>
                    </form>
                    </div>
                </div>
            </nav>
        </div>  

        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
            <?php
                    if(!isset($_SESSION['username'])){
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='#'>Welcome Guest</a>
                    </li>";
                    } else {
                        echo "<li class='nav-item'>
                        <a class='nav-link text-info text-capitalize' href='#'>Welcome ".$_SESSION['username']."</a>
                    </li>"; 
                    }
                ?>
                <?php
                    if(!isset($_SESSION['username'])){
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='./users_area/user_login.php'>Login</a>
                    </li>";
                    } else {
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='./users_area/logout.php'>Logout</a>
                    </li>"; 
                    }
                ?>
            </ul>
        </nav>

        <!-- third child -->
        <div class="bg-light">
            <h3 class="text-center">Market Square</h3>
            <p class='text-center'>Communications is at the heart of e-commerce and community</p>
        </div>

        <!-- fourth child -->
        <div class='row'>
            <div class='col-md-10'>
                <!-- products -->
                <div class='row'>
                    <!-- fetching products -->
                    <?php

                    //calling product function
                    search_product();
                    get_unique_categories();
                    get_unique_brands();
                    cart();
/*
                    $select_product="SELECT * FROM products order by rand()";
                    $select_result=mysqli_query($con, $select_product);
                    while($data_row=mysqli_fetch_assoc($select_result)){
                        $product_title=$data_row['product_title'];
                        $product_id=$data_row['product_id'];
                        $product_description=$data_row['product_description'];
                        $product_price=$data_row['product_price'];
                        $product_image1=$data_row['product_image1'];
                        $category_id=$data_row['category_id'];
                        $brand_id=$data_row['brand_id'];

                        echo "<div class='col-md-4 mb-2'>
                                <div class='card'>
                                    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title''>
                                    <div class='card-body'>
                                        <h5 class='card-title'>$product_title</h5>
                                        <p class='card-text'>$product_description</p>
                                        <a href='#' class='btn btn-info'>Add to Cart</a>
                                        <a href='$product_id' class='btn btn-secondary'>View More</a>                        
                                    </div>
                                </div>
                            </div>";


                    }
*/
                    ?>
                    
                </div>
            </div>
            <div class='col-md-2 bg-secondary p-0'>
                <!-- sidebar -->
               
                <!-- brands to be displayed here -->
                <ul class='navbar-nav me-auto text-center'>
                    <li class='nav-item bg-info'>
                        <a href="#" class='nav-link text-light'><h4>Delivery Brands</h4></a>
                    </li>

                    <?php

                    //calling brands display function
                    getbrands();
/*
                    $select_brands="SELECT * FROM brands";
                    $select_result=mysqli_query($con, $select_brands);
                    //$data_row=mysqli_fetch_assoc($select_result);
                    //echo $data_row['brand_title'];
                    while($data_row=mysqli_fetch_assoc($select_result)){
                        $brand_title=$data_row['brand_title'];
                        $brand_id=$data_row['brand_id'];
                        echo "<li class='nav-item'>
                        <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
                    </li>";
                    }
*/
                    ?>

                </ul>

                <!-- categories to be displayed here-->
                <ul class='navbar-nav me-auto text-center'>
                    <li class='nav-item bg-info'>
                        <a href="#" class='nav-link text-light'><h4>Categories</h4></a>
                    </li>

                    <?php

                    //calling categories display function
                    getcategories();
/*
                    $select_categories="SELECT * FROM categories";
                    $select_result=mysqli_query($con, $select_categories);
                    while($data_row=mysqli_fetch_assoc($select_result)){
                        $category_title=$data_row['category_title'];
                        $category_id=$data_row['category_id'];
                        echo "<li class='nav-item'>
                        <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
                    </li>";
                    }
*/
                    ?>
                    
                </ul>
            </div>

        </div>

                <!-- last child -->
        <!-- include footer -->
        <?php include('./includes/footer.php') ?>

        <!-- bootstrap js link -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>