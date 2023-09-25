<?php

//including connect file
include('../includes/connect.php');

//getting products
function getproducts(){
    global $con;

    //condition to check isset or not 
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
    $select_product="SELECT * FROM products order by rand() LIMIT 0,9";
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
                        <p class='card-text'>Price: #$product_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>                        
                    </div>
                </div>
            </div>";


    }
}}
}

//getting all products
function get_all_products(){
    global $con;

    //condition to check isset or not 
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
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
                        <p class='card-text'>Price: $$product_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>                        
                    </div>
                </div>
            </div>";


    }
}}
}


//getting unique categories
function get_unique_categories(){
    global $con;

    //condition to check isset or not 
    if(isset($_GET['category'])){
        $category_id=$_GET['category'];
        
    $select_product="SELECT * FROM products where category_id=$category_id";
    $select_result=mysqli_query($con, $select_product);

    //count number of rows present inside database
    $num_rows=mysqli_num_rows($select_result);
    if($num_rows == 0){
        echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
    }

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
                        <p class='card-text'>Price: $$product_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>                        
                    </div>
                </div>
            </div>";


    }
}
}

//getting unique brands
function get_unique_brands(){
    global $con;

    //condition to check isset or not 
    if(isset($_GET['brand'])){
        $brand_id=$_GET['brand'];
        
    $select_product="SELECT * FROM products where brand_id=$brand_id";
    $select_result=mysqli_query($con, $select_product);

    //count number of rows present inside database
    $num_rows=mysqli_num_rows($select_result);
    if($num_rows == 0){
        echo "<h2 class='text-center text-danger'>This Brand is not available for service</h2>";
    }

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
                        <p class='card-text'>Price: $$product_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>                        
                    </div>
                </div>
            </div>";


    }
}
}

//displaying brands inside sidebar
function getbrands(){
    global $con;
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
}

//displaying categories inside sidebar
function getcategories(){
    global $con;
    $select_categories="SELECT * FROM categories";
                    $select_result=mysqli_query($con, $select_categories);
                    while($data_row=mysqli_fetch_assoc($select_result)){
                        $category_title=$data_row['category_title'];
                        $category_id=$data_row['category_id'];
                        echo "<li class='nav-item'>
                        <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
                    </li>";
                    }
}

//searching products
function search_product(){
    global $con;

    if(isset($_GET['search_data_product'])){
        $search_data_value=$_GET['search_data'];
    
    $search_query="SELECT * FROM products where product_keywords like '%$search_data_value%'";
    $select_result=mysqli_query($con, $search_query);

    $num_rows=mysqli_num_rows($select_result);
    if($num_rows == 0){
        echo "<h2 class='text-center'>No match is found</h2>";
    }

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
                        <p class='card-text'>Price: $$product_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>                        
                    </div>
                </div>
            </div>";


    }}
}

//view details function
function view_details(){
    global $con;

    //condition to check isset or not 
    if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
            $product_id=$_GET['product_id'];

    $select_product="SELECT * FROM products where product_id=$product_id";
    $select_result=mysqli_query($con, $select_product);

    while($data_row=mysqli_fetch_assoc($select_result)){
        $product_title=$data_row['product_title'];
        $product_id=$data_row['product_id'];
        $product_description=$data_row['product_description'];
        $product_price=$data_row['product_price'];

        $product_image1=$data_row['product_image1'];
        $product_image2=$data_row['product_image2'];
        $product_image3=$data_row['product_image3'];

        $category_id=$data_row['category_id'];
        $brand_id=$data_row['brand_id'];

        echo "<div class='col-md-4 mb-2'>
                <div class='card'>
                    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title''>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <p class='card-text'>Price: $$product_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                        <a href='index.php' class='btn btn-secondary'>Go home</a>                        
                    </div>
                </div>
            </div>

            <div class='col-md-8'>
                    <!-- related images -->
                    <div class='row'>
                        <div class='col-md-12'>
                            <h4 class='text-center text-info mb-5'>Related products</h4>
                        </div>

                        <div class='col-md-6'>
                            <img src='./admin_area/product_images/apple.png' class='card-img-top' alt='$product_title''>
                        </div>

                        <div class='col-md-6'>
                            <img src='./admin_area/product_images/banana.png' class='card-img-top' alt='$product_title''>
                        </div>
                    </div>
                    
                </div>
        ";


    }
}}}
}

//getting user ip address function
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;  

//cart functions
function cart(){
    if(isset($_GET['add_to_cart'])){
    global $con;
    $ip = getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
    $select_query="SELECT * FROM `cart_details` where ip_address='$ip' and product_id=$get_product_id";
    $query_result= mysqli_query($con, $select_query);

    //count number of rows present inside database
    $num_rows=mysqli_num_rows($query_result);
    if($num_rows>0){
        echo "<script>alert('This item is already present inside cart')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
    } else {
        $insert_cart="INSERT INTO cart_details (product_id,ip_address,quantity) VALUES ($get_product_id, '$ip',0)";
        $insert_result=mysqli_query($con, $insert_cart);

        if($insert_result){
            echo "<script>alert('added to cart successfully!')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        }
    }

}}

//cart itemn number function
function cart_item_num(){
    if(isset($_GET['add_to_cart'])){
    global $con;
    $ip = getIPAddress();
    
    $select_query="SELECT * FROM `cart_details` where ip_address='$ip'";
    $query_result= mysqli_query($con, $select_query);

    //count number of items in the cart
    $count_cart_items=mysqli_num_rows($query_result);
    
    } else {
        global $con;
        $ip = getIPAddress();
        
        $select_query="SELECT * FROM `cart_details` where ip_address='$ip'";
        $query_result= mysqli_query($con, $select_query);
    
        //count number of items in the cart
        $count_cart_items=mysqli_num_rows($query_result);
    }
    echo $count_cart_items;

}

//total price function
function total_cart_price(){
    global $con;
    $ip = getIPAddress();

    $total = 0;
    $cart_query="SELECT * FROM cart_details where ip_address='$ip'";
    $result_query=mysqli_query($con, $cart_query);
    while($row=mysqli_fetch_array($result_query)){
        $product_id=$row['product_id'];
        $select_product="SELECT * FROM products where product_id='$product_id'";
        $result_product=mysqli_query($con, $select_product);
        while($product_price_row=mysqli_fetch_array($result_product)){
            $product_price=array($product_price_row['product_price']);
            $price_values=array_sum($product_price);
            $total+=$price_values;
        }
    }
    echo $total;
}


//get user order details
function user_order_details(){
    global $con;
    $username=$_SESSION['username'];
    $get_details="SELECT * FROM user_table where username='$username'";
    $result_query=mysqli_query($con, $get_details);
    while($row_query=mysqli_fetch_array($result_query)){
        $user_id=$row_query['user_id'];
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['my_orders'])){
                if(!isset($_GET['delete_account'])){
                    $get_orders="SELECT * FROM user_orders where user_id=$user_id and order_status='pending'";
                    $order_result_query=mysqli_query($con, $get_orders);
                    $row_count=mysqli_num_rows($order_result_query);
                    if($row_count>0){
                        echo "<h3 class='text-center text-success mt-5 mb-3'>You have <span class='text-danger'>$row_count </span>pending orders</h3>
                               <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
                    } else {
                        echo "<h3 class='text-center text-success mt-5 mb-3'>You have zero pending orders</h3>
                               <p class='text-center'><a href='../index.php' class='text-dark'>Explore Products</a></p>";
                  
                    }

                }
            }
        }
    }

}

function edit_account(){
    if(isset($_GET['edit_account'])){
        include('./edit_acccount.php');
    }
}
?>