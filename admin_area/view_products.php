<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF_8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View products</title>
    <style>
        .prof-img{
            width: 100px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <h3 class='text-center text-success'>All products</h3>
    <table class='table table-bordered mt-5'>
        <thead class='bg-info'>
            <tr>
                <th>Product ID</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>product Price</th>
                <th>total Sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class='bg-secondary'>
            <?php
            $select_product="SELECT * FROM products";
            $select_result=mysqli_query($con, $select_product);
            $number=0;
            while($row=mysqli_fetch_assoc($select_result)){
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_image1=$row['product_image1'];
                $product_price=$row['product_price'];
                $status=$row['status'];
                $number++;
                /*
                <?php
                        $get_count="SELECT * FROM pending_orders where product_id=$product_id";
                        $select_result=mysqli_query($con, $get_count);
                        $row_count=mysqli_num_rows($select_result);
                        echo $row_count;

                        ?>
                */
                ?>
                <tr class='text-center'>
                    <td><?php echo $number ?></td>
                    <td><?php echo $product_title ?></td>
                    <td><img src='./$product_image1' alt='' class='prof-img'></td>
                    <td>$<?php echo $product_price ?></td>
                    <td>
                    0
                    </td>
                    <td><?php echo $status ?></td>
                    <td><a href='index.php?edit_products=<?php echo $product_id ?>'><i class='fa-solid fa-pen-to-square' aria-hidden='true'></i></a></td>
                    <td><a href='index.php?delete_product=<?php echo $product_id ?>'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
                </tr>
                <?php
            }
            ?>
            
        </tbody>
    </table>
</body>
</html>
    