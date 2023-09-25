<h3 class='text-center text-success'>All Categories</h3>
<table class='table table-bordered mt-5'>
    <thead class='bg-info text-center'>
        <tr>
            <th>SI No</th>
            <th>Category title</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
    <thead>
    <tbody class='bg-secondary text-light text-center'>
        <?php
        $select_cat="SELECT * FROM categories";
        $select_result=mysqli_query($con, $select_cat);
        $number=0;
        while($row=mysqli_fetch_assoc($select_result)){
            $category_id=$row['category_id'];
            $category_title=$row['category_title'];
            $number++
       

        ?>
        <tr>
            <td><?php echo $number ?></td>
            <td><?php echo $category_title ?></td>
            <td><a href='index.php?edit_category=<?php echo $category_id ?>'><i class='fa-solid fa-pen-to-square' aria-hidden='true'></i></a></td>
            <td><a href='index.php?delete_category=<?php echo $category_id ?>' data-toggle="modal" data-target="#exampleModal"><i class='fa fa-trash' aria-hidden='true'></i></a></td>
     
        </tr>
        <?php
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href='./index.php?view_categories' class='text-decoration-none text-light'>No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_brand=<?php echo $category_id ?>' class='text-decoration-none text-light'>Delete</a></button>
      </div>
    </div>
  </div>
</div>