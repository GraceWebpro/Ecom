<?php
include('../includes/connect.php');
include('../functions/common_function.php');


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
                width: 90%;
                height: 300px;
                /*object-fit: contain;*/
                margin: auto;
                display: block;
            }
        </style>
</head>
    <body>
            <?php

            $user_ip=getIPAddress();
            $user_query="SELECT * FROM user_table where user_ip='$user_ip'";
            $user_result=mysqli_query($con,$user_query);
            $run_query=mysqli_fetch_array($user_result);
            $user_id=$run_query['user_id'];


            ?>

        <div class='container'>
            <h2 class='text-center text-info'>Payment options</h2>
            <div class='row d-flex justify-content-center align-items-center my-5'>
                <div class='col-md-6'>
                    <a href='https://www.paypal.com' target='_blank'><img class='img' src='../images/payment.png' alt='payment image'></a>
                </div>
   
                <div class='col-md-6'>
                    <a href='order.php?user_id=<?php echo $user_id ?>' target='_blank'><h2 class='text-center'>Pay offline</h2></a>
                </div>
            </div>
        </div>
        </body>

    </html>