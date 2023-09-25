<?php
include('../includes/connect.php');
include('../functions/common_function.php');

if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
echo $user_id;
}

//total price and number of items
$ip=getIPAddress();
$total_price=0;
$cart_query="SELECT * FROM cart_details where ip_address='$ip'";
$result_query=mysqli_query($con, $cart_query);
$invoice_number=mt_rand();
//echo $invoice_number;
$status='pending';
$result_count=mysqli_num_rows($result_query);
while($product_row=mysqli_fetch_array($result_query)){
    $product_id=$product_row['product_id'];
    $select_product="SELECT * FROM products where product_id=$product_id";
    $result=mysqli_query($con, $select_product);
    while($price_row=mysqli_fetch_array($result)){
        $product_price=array($price_row['product_price']);
        $product_price_sum=array_sum($product_price);
        $total_price+=$product_price_sum;
    }

}

echo $user_id;
// getting quantity from cart
$get_cart="SELECT * FROM cart_details";
$result=mysqli_query($con, $get_cart);
$cart_item_qty=mysqli_fetch_array($result);
$quantity=$cart_item_qty['quantity'];
if($quantity==0){
    $quantity=1;
    $subtotal=$total_price;
} else {
    $quantity=$quantity;
    $subtotal=$total_price * $quantity;
}

$insert_orders="INSERT INTO user_orders (user_id,amount_due,invoice_number,total_products,order_date,order_status) VALUES ($user_id,$subtotal,$invoice_number,$result_count,NOW(),'$status')";
$result=mysqli_query($con, $insert_orders);
if($result){
    echo "<script>alert('Orders are submitted successfully')</script>";
    echo "<script>window.open('profile.php','_self')</script>";

}

//orders pending
$insert_pending_orders="INSERT INTO pending_orders (user_id,invoice_number,product_id,quantity,order_status) VALUES ($user_id,$invoice_number,$product_id,$quantity,'$status')";
$result_pending=mysqli_query($con, $insert_pending_orders);


//delete items from cart
$empty_cart="DELETE FROM cart_details where ip_address='$ip'";
$result_empty=mysqli_query($con, $empty_cart);

?>