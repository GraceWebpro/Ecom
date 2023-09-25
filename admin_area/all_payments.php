<h3 class='text-center text-success'>All Payments</h3>
<table class='table table-bordered mt-5'>
    <thead class='bg-info text-center'>
        <?php

        $get_payments="SELECT * FROM user_payments ";
        $select_result=mysqli_query($con, $get_payments);
        $row_count=mysqli_num_rows($select_result);
        

        if($row_count==0){
            echo "<h3 class='text-danger text-center mt-5'>No payment yet</h3>";
        } else {
            echo "<tr>
                <th>SI No</th>
                <th>Order ID</th>
                <th>Invoice Number</th>
                <th>Amount</th>
                <th>Payment Mode</th>
                <th>Payment Date</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class='text-center'>";
            $number=0;
            while($row=mysqli_fetch_assoc($select_result)){
                $payment_id=$row['payment_id'];
                $order_id=$row['order_id'];
                $amount=$row['amount'];
                $invoice_number=$row['invoice_number'];
                $payment_mode=$row['payment_mode'];
                $date=$row['date'];
                $number++;

                echo "<tr>
                <td>$number</td>
                <td>$order_id</td>
                <td>$invoice_number</td>
                <td>$amount</td>
                <td>$payment_mode</td>
                <td>$date</td>
                <td><a href='index.php?delete_order=<?php echo $payment_id ?>' data-toggle='modal' data-target='#exampleModal'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
                </tr>";

            }
        }

        ?>
        
    </tbody>
</table>

<!-- Button trigger modal -->
<!--
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>
    -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <h4>Are you sure you want delete this?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href='./index.php?all_payments' class='text-decoration-none text-light'>No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_payment=<?php echo $payment_id ?>' class='text-decoration-none text-light'>Delete</a></button>
      </div>
    </div>
  </div>
</div>