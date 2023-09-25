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
    <link rel="stylesheet" href="../style.css" />
    <style>
        .prof-img {
            width: 90%;
            height: 100%;
            margin: auto;
            display: block;
        }
    </style>
</head>
    <body>
        <!-- navbar -->
        <div class="container-fluid p-0">
            <!-- first child -->
            <nav class="navbar navbar-expand-lg bg-info">
                <div class="container-fluid">
                    
                    <img  src="../images/basket.png" alt="" width='6%' height='6%' class="logo" />
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="../display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                        </li>
                        <?php
                        if(isset($_SESSION['username'])){
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='profile.php'>My Account</a>
                            </li>";
                        } else {
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='./user_registration.php'>Register</a>
                            </li>";
                        }
                        ?>
                        
                        <li class="nav-item">
                        <a class="nav-link" href="../cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item_num(); ?></sup>
                            </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">TotalPrice: $<?php total_cart_price(); ?></a>
                        </li>

                    </ul>
                    <form class="d-flex" role="search" action='../search_product.php' method='get'>
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name='search_data'>
                        <!--<button class="btn btn-outline-light" type="submit">Search</button>-->
                        <input type='submit' value='Search' class='btn btn-outline-light' name='search_data_product'>
                    </form>
                    </div>
                </div>
            </nav>
        </div>  

        <!--calling cart function-->
        <?php
        cart();
        ?>

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
            <div class='col-md-2'>
                <ul class='navbar-nav bg-secondary text-center' style='height:100vh'>
                    <li class='nav-item bg-info'>
                        <a class="nav-link text-light" href="#"><h4>Your profile</h4></a>
                    </li>

                    <?php

                    $username=$_SESSION['username'];
                    $user_query="SELECT * FROM user_table where username='$username'";
                    $user_result=mysqli_query($con,$user_query);
                    $row_image=mysqli_fetch_array($user_result);
                    $user_image=$row_image['user_image'];
                    echo "<li class='nav-item'>
                            <img src='../images/bootie.jpg' class='prof-img my-4' alt=''>
                        </li>";

                        //<img src='../user_images/$user_image' class='prof-img my-4' alt=''>


                    ?>
                    <li class='nav-item'>
                        <a class="nav-link text-light" href="profile.php?my_orders">My orders</a>
                    </li>
                    <li class='nav-item'>
                        <a class="nav-link text-light" href="profile.php">Pending orders</a>
                    </li>
                    <li class='nav-item'>
                        <a class="nav-link text-light" href="profile.php?edit_account">Edit account</a>
                    </li>
                    <li class='nav-item'>
                        <a class="nav-link text-light" href="profile.php?delete_account">Delete account</a>
                    </li>
                    <li class='nav-item'>
                        <a class="nav-link text-light" href="./logout.php">Logout</a>
                    </li>
                </ul>
            </div>
            <div class='col-md-10 text-center'>
                <?php
                    user_order_details();
                    //if(isset($_GET['edit_account'])){
                    //    include('./edit_account.php');
                    //}
                ?>
           
                <?php 
                    if(isset($_GET['edit_account'])){
                        include('edit_account.php');
                    }
                    if(isset($_GET['my_orders'])){
                        include('my_orders.php');
                    }
                    if(isset($_GET['delete_account'])){
                        include('delete_account.php');
                    }
                ?>
            </div>
         

        </div>



        <!-- last child -->
        <!-- include footer -->
        <?php include('../includes/footer.php') ?>

        <!-- bootstrap js link -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>