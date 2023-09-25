<?php

//include connect file
include('../includes/connect.php');

//start session
session_start();

if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    //echo $order_id;

    $select_data="SELECT * FROM user_orders where order_id=$order_id";
    $result=mysqli_query($con, $select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount_due=$row_fetch['amount_due'];


}

if(isset($_POST['confirm_payment'])){
    $invoice_number=$_POST['invoive_number'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];

    $insert_query="INSERT INTO `user_payments` (order_id,invoice_number,amount,payment_mode,date) VALUES ($order_id,$invoice_number,$amount,'$payment_mode')";
    $result_query=mysqli_query($con, $insert_cart);
    if($result_query){
        echo "<script>alert('Payment confirmed')</script>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    } else {
        echo "<script>alert('error')</script>";

    }

    $update_data="UPDATE user_orders set order_status='Complete' where order_id=$order_id";
    $update_result=mysqli_query($con,$update_data);




}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF_8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Payment page</title>
        <!-- bootsrtap css link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        
        <!-- font awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>
    <body class='bg-secondary'>
        <div class='container my-5'>
            <h1 class='text-light text-center'>Confirm payment</h1>
            <form action='' method='post'>
                <div class='form-outline text-center my-4 w-50 m-auto'>
                    <input type='text' class='form-control w-50 m-auto' name='invoice_number' value='<?php echo $invoice_number ?>'>
                </div>

                <div class='form-outline text-center my-4 w-50 m-auto'>
                    <label for='amount' class='text-light'>Amount</label>
                    <input id='amount' type='text' class='form-control w-50 m-auto' name='amount' value='#<?php echo $amount_due ?>'>
                </div>

                <div class='form-outline text-center my-4 w-50 m-auto'>
                    <select name='payment_mode' class='form-select w-50 m-auto'>
                        <option>Select Payment Mode</option>
                        <option>UPI</option>
                        <option>Netbanking</option>
                        <option>PayPal</option>
                        <option>Cash on Delivery</option>
                        <option>Pay offline</option>
                    </select>
                </div>

                <div class='form-outline text-center my-4 w-50 m-auto'>
                    <input type='submit' class='bg-info py-2 px-3 border-0' name='confirm_payment' value='Confirm'>
                </div>
            </form>
        </div>
    </body>
</html>