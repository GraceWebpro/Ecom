<h3 class='text-center text-success'>All Orders</h3>
<table class='table table-bordered mt-5'>
    <thead class='bg-info text-center'>
        <?php

        $get_orders="SELECT * FROM user_orders ";
        $select_result=mysqli_query($con, $get_orders);
        $row_count=mysqli_num_rows($select_result);
        

        if($row_count==0){
            echo "<h3 class='bg-secondary text-center text-danger mt-5'>No order yet</h3>";
        } else {
            echo "<tr>
                <th>SI No</th>
                <th>Due Amount</th>
                <th>Invoice Number</th>
                <th>Total Products</th>
                <th>Order Date</th>
                <th>Order Status</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class='text-center'>";
            $number=0;
            while($row=mysqli_fetch_assoc($select_result)){
                $order_id=$row['order_id'];
                $user_id=$row['user_id'];
                $amount_due=$row['amount_due'];
                $invoice_number=$row['invoice_number'];
                $total_products=$row['total_products'];
                $order_date=$row['order_date'];
                $order_status=$row['order_status'];
                $number++;

                echo "<tr>
                <td>$number</td>
                <td>$amount_due</td>
                <td>$invoice_number</td>
                <td>$total_products</td>
                <td>$order_date</td>
                <td>$order_status</td>
                <td><a href='index.php?delete_order=<?php echo $order_id ?>' data-toggle='modal' data-target='#exampleModal'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href='./index.php?all_orders' class='text-decoration-none text-light'>No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_order=<?php echo $order_id ?>' class='text-decoration-none text-light'>Delete</a></button>
      </div>
    </div>
  </div>
</div>