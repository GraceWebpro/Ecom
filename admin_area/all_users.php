<h3 class='text-center text-success'>All Users</h3>
<table class='table table-bordered mt-5'>
    <thead class='bg-info text-center'>
        <?php

        $get_users="SELECT * FROM user_table";
        $select_result=mysqli_query($con, $get_users);
        $row_count=mysqli_num_rows($select_result);
        

        if($row_count==0){
            echo "<h3 class='text-danger text-center mt-5'>No user yet</h3>";
        } else {
            echo "<tr>
                <th>SI No</th>
                <th>Username</th>
                <th>User Email</th>
                <th>User Image</th>
                <th>User Address</th>
                <th>User Mobile</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class='text-center'>";
            $number=0;
            while($row=mysqli_fetch_assoc($select_result)){
                $user_id=$row['user_id'];
                $username=$row['username'];
                $user_email=$row['user_email'];
                $user_image=$row['user_image'];
                $user_address=$row['user_address'];
                $user_mobile=$row['user_mobile'];
                $number++;

                echo "<tr>
                <td>$number</td>
                <td>$username</td>
                <td>$user_email</td>
                <td>$user_image</td>
                <td>$user_address</td>
                <td>$user_mobile</td>
                <td><a href='index.php?delete_order=<?php echo $user_id ?>' data-toggle='modal' data-target='#exampleModal'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href='./index.php?all_users' class='text-decoration-none text-light'>No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_user=<?php echo $user_id ?>' class='text-decoration-none text-light'>Delete</a></button>
      </div>
    </div>
  </div>
</div>