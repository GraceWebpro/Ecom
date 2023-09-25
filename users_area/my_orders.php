
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF_8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My orders</title>
        <!-- bootsrtap css link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        
        <!-- font awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>
    <body>
        <?php
        $username=$_SESSION['username'];
        $get_user="SELECT * FROM user_table where username='$username'";
        $result=mysqli_query($con, $get_user);
        $row_fetch=mysqli_fetch_assoc($result);
        $user_id=$row_fetch['user_id'];
        ?>
        <h3 class='text-success'>All my orders</h3>
        <table class='table table-bordered mt-5'>
            <thead class='bg-info'>
                <tr>
                    <th>SI No</th>
                    <th>Amount due</th>
                    <th>Total products</th>
                    <th>Invoice number</th>
                    <th>Date</th>
                    <th>Complete/Incomplete</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody class="bg-secondary text-light">
                <?php
                $get_orders="SELECT * FROM user_orders where user_id=$user_id";
                $orders=mysqli_query($con, $get_orders);
                while($row_orders=mysqli_fetch_assoc($orders)){
                    $order_id=$row_orders['order_id'];
                    $amount_due=$row_orders['amount_due'];
                    $invoice_number=$row_orders['invoice_number'];
                    $total_products=$row_orders['total_products'];
                    $order_date=$row_orders['order_date'];
                    $order_status=$row_orders['order_status'];
                    if($order_status=='pending'){
                        $order_status='Incomplete';
                    } else {
                        $order_status='Incomplete';
                    }
                    $number=1;
                    echo "<tr>
                        <td>$number</td>
                        <td>$amount_due</td>
                        <td>$total_products</td>
                        <td>$invoice_number</td>
                        <td>$order_date</td>
                        <td>$order_status</td>";
                        ?>
                        <?php
                        if($order_status=='Complete'){
                            echo "<td>Paid</td>";
                        } else {
                          echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-dark'>Confirm</a></td>
                            </tr>";
                        }
                        
                    
                    $number++;
                }
                ?>
                        
            </tbody>
        </table>
    </body>
</html>