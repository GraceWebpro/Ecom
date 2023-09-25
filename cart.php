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
    <title>Ecommerce Website - Cart details</title>
    
    <!-- bootsrtap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- style link -->
    <link rel="stylesheet" href="style.css" />
    <style>
            .img {
                width: 80px;
                height: 80px;
                object-fit: contain;
            }
        </style>
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
                    

                    </ul>
                    
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
        <div class='container'>
            <div class='row'>
                <form action='' method='post'>
                <table class='table table-bordered text-center'>
                    

                    <!-- php code to display dynamic data -->
                    <?php

                  
                    $ip = getIPAddress();

                    $total = 0;
                    $cart_query="SELECT * FROM cart_details where ip_address='$ip'";
                    $result_query=mysqli_query($con, $cart_query);
                    $result_count=mysqli_num_rows($result_query);

                    if($result_count>0){
                        echo "<thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th colspan='2'>Operations</th>
                        </tr>
                    </thead>
                    <tbody>";
                    while($row=mysqli_fetch_array($result_query)){
                        $product_id=$row['product_id'];
                        $select_product="SELECT * FROM products where product_id='$product_id'";
                        $result_product=mysqli_query($con, $select_product);                        
                        
                        while($product_price_row=mysqli_fetch_array($result_product)){
                            $product_price=array($product_price_row['product_price']);
                            $price_table=$product_price_row['product_price'];
                            $product_title=$product_price_row['product_title'];
                            $product_image1=$product_price_row['product_image1'];
                            $price_values=array_sum($product_price);
                            $total+=$price_values;
                        
                    ?>
                        <tr>
                            <td><?php echo $product_title?></td>
                            <td><img src='./images/apple.png' class='img' alt=''></td>
                            <td><input type='text' name='qty' id='' class='form-input w-50'></td>
                            <?php

                            $ip = getIPAddress();
                            if(isset($_POST['update_cart'])){
                                $quantity=$_POST['qty'];

                                $update_cart="UPDATE cart_details set quantity=$quantity where ip_address='$ip'";
                                $result=mysqli_query($con, $update_cart);
                                $total=$total*$quantity;
                            }


                            ?>
                            <td><?php echo $price_table?></td>
                            <td><input type='checkbox' name='removeItem[]' value='<?php echo $product_id ?>'></td>
                            <td>
                                <!--<button class='bg-info px-3 py-2 mx-3'>Update</button>
                                <button class='bg-info px-3 py-2 mx-3'>Remove</button>
                        -->
                        <input type='submit' name='update_cart' value='Update' class='bg-info px-3 py-2 mx-3'>
                        <input type='submit' name='remove_cart' value='Remove' class='bg-info px-3 py-2 mx-3'>

                            </td>
                        </tr>

                     <?php }}
                    } else {
                        echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                    }
                     ?>  
                    </tbody>
                </table>
                        
                
                <!-- subtotal -->
                <div class='d-flex mb-5'>
                <?php

                $ip = getIPAddress();

              
                $cart_query="SELECT * FROM cart_details where ip_address='$ip'";
                $result_query=mysqli_query($con, $cart_query);
                $result_count=mysqli_num_rows($result_query);

                if($result_count>0){
                    echo "
                    <h4 class='px-3'>Subtotal: <strong class='text-info'>$$total</strong></h4>
                    <input type='submit' class='bg-info px-3 py-2 mx-3' value='Continue Shopping' name='continue_shopping'>
                    <button class='bg-secondary px-3 py-2 text-light'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>

                ";
                } else {
                    echo "<input type='submit' class='bg-info px-3 py-2 mx-3' value='Continue Shopping' name='continue_shopping'>
                    ";
                }
                if(isset($_POST['continue_shopping'])){
                    echo "<script>window.open('index.php', '_self')</script>";
                }

                ?>
                </div>
                
               
                
            </div>
        </div>

        </form>

        <!-- function to remove item-->
        <?php
        function remove_item(){
            global $con;

            if(isset($_POST['remove_cart'])){
                foreach($_POST['removeItem'] as $remove_id){
                    echo $remove_id;
                    $delete_query="DELETE FROM cart_details where product_id=$remove_id";
                    $run_delete=mysqli_query($con, $delete_query);

                    if($run_delete){
                        echo "<script>window.open('cart.php', '_self')</script>";
                    }
                }
            }
        }

        echo $remove_cart_item=remove_item();

        ?>

                <!-- last child -->
        <!-- include footer -->
        <?php include('./includes/footer.php') ?>

        <!-- bootstrap js link -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>