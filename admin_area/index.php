<?php
//include connect file
include('../includes/connect.php');

//include product function file
include('../functions/common_function.php');

//start session
session_start();


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF_8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username'] ?></title>
    
    <!-- bootsrtap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- style link -->
    <link rel="stylesheet" href="style.css" />

        <style>
            .admin_img {
                width: 100px;
                object-fit: contain;
            }
        </style>
    </head>
    <body>

        <div class='container-fluid p-0'>
            <!-- first child -->
            <nav class='navbar navbar-expand-lg navbar-light bg-info'>
                <div class='container-fluid'>
                    <img src='../images/cart.png' width='7%' height='7%' alt='' class='logo' />
                    <nav class='navbar navbar-expand-lg'>
                        <ul class='navbar-nav'>
                        <?php
                    if(!isset($_SESSION['username'])){
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='#'>Welcome Guest</a>
                    </li>";
                    } else {
                        echo "<li class='nav-item'>
                        <a class='nav-link text-info text-capitalize' href='#'>Welcome</a>
                    </li>"; 
                    }
                ?>
                <?php
                    if(!isset($_SESSION['username'])){
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='./admin_login.php'>Login</a>
                    </li>";
                    } else {
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='./logout.php'>Logout</a>
                    </li>"; 
                    }
                ?>
                        </ul>
                    </nav>
                
                </div>
            </nav>

            <!-- second child-->
            <div class='bg-light'>
                <h3 class='text-center p-2'>Manage Details</h3>
            </div>

            <!-- third child -->
            <div class='row'>
                <div class='col-md-12 bg-secondary p-1 d-flex align-items-center'>
                    <div class='p-3'>
                        <a href='#'><img src='../images/pineapplejuice.jpeg' alt='' class='admin_img'></a>
                    
                        <p class='text-light text-center'><?php echo $_SESSION['username'] ?></p>
                    </div>
                    <div class='button text-center'>
                        <button class='my-3'><a href='index.php?insert_product' class='nav-link text-light bg-info my-1'>Insert Products</a></button>
                        <button class='my-3'><a href='index.php?view_products' class='nav-link text-light bg-info my-1'>View Products</a></button>
                        <button class='my-3'><a href='index.php?insert_category' class='nav-link text-light bg-info my-1'>Insert Categories</a></button>
                        <button class='my-3'><a href='index.php?view_categories' class='nav-link text-light bg-info my-1'>View Categories</a></button>
                        <button class='my-3'><a href='index.php?insert_brand' class='nav-link text-light bg-info my-1'>Insert Brands</a></button>
                        <button class='my-3'><a href='index.php?view_brands' class='nav-link text-light bg-info my-1'>View Brands</a></button>
                        <button class='my-3'><a href='index.php?all_orders' class='nav-link text-light bg-info my-1'>All orders</a></button>
                        <button class='my-3'><a href='index.php?all_payments' class='nav-link text-light bg-info my-1'>All payments</a></button>
                        <button class='my-3'><a href='index.php?all_users' class='nav-link text-light bg-info my-1'>List users</a></button>
                        <button class='my-3'><a href='./logout.php' class='nav-link text-light bg-info my-1'>Logout</a></button>

                    </div>
                </div>

            </div>

            <!-- fourth child -->
            <div class='container my-3'>
                <?php 
                    if(isset($_GET['insert_product'])){
                        include('insert_product.php');
                    }
                    if(isset($_GET['insert_category'])){
                        include('insert_categories.php');
                    }
                    if(isset($_GET['insert_brand'])){
                        include('insert_brands.php');
                    }
                    if(isset($_GET['view_products'])){
                        include('view_products.php');
                    }
                    if(isset($_GET['edit_products'])){
                        include('edit_product.php');
                    }
                    if(isset($_GET['delete_product'])){
                        include('delete_product.php');
                    }
                    if(isset($_GET['view_categories'])){
                        include('view_categories.php');
                    }
                    if(isset($_GET['edit_category'])){
                        include('edit_category.php');
                    }
                    if(isset($_GET['delete_category'])){
                        include('delete_category.php');
                    }
                    if(isset($_GET['view_brands'])){
                        include('view_brands.php');
                    }
                    if(isset($_GET['edit_brand'])){
                        include('edit_brand.php');
                    }
                    if(isset($_GET['delete_brand'])){
                        include('delete_brand.php');
                    }
                    if(isset($_GET['all_orders'])){
                        include('all_orders.php');
                    }
                    if(isset($_GET['delete_order'])){
                        include('delete_order.php');
                    }
                    if(isset($_GET['all_payments'])){
                        include('all_payments.php');
                    }
                    if(isset($_GET['delete_payment'])){
                        include('delete_payment.php');
                    }
                    if(isset($_GET['all_users'])){
                        include('all_users.php');
                    }
                    if(isset($_GET['delete_user'])){
                        include('delete_user.php');
                    }
                ?>
            </div>

            
        </div>

        <!-- last child -->
        <?php include('../includes/footer.php') ?>


        <!-- bootstrap js link -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
                    
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>