<?php require_once('./includes/header.php'); ?>



<!-- Navigation -->
<?php require_once('./includes/nav.php'); ?>

<!-- Edit Category -->
<?php
if (isset($_GET['edit'])) {
    $Edit_Id = $_GET['edit'];
    $sql = "select * from categories where cat_id = '$Edit_Id'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
?>
    <form action="update.php" method="POST">
        <div class="form-group">
            <label> Edit Category</label>
            <input type="text" name="Edit_Category" value="<?php echo $data['cat_title']; ?>" placeholder="Category" class="form-control pb-2">
            <input type="hidden" name="edit_id" value="<?php echo $data['cat_id']; ?>">

        </div>
        <div class="form-group">
        <select name="edit_status" class="form-control">
            <option>unarchived</option>
            <option>archived</option>
        </select>
        </div>
        <div class="form-group ">
            <button class="btn btn-success" type="submit" name="btn_edit_category"> Edit Category</button>
        </div>
    </form>

<?php
}
?>
</div>

<div class="col-lg-6">
    <table class="table table-bordered">
        <tr>
            <th style="width: 20%;">Category ID</th>
            <th style="width: 50%;">Category Name</th>
            <th style="width: 30%;">Category Image</th>
            <th style="width: 30%;" colspan="2">Operations</th>
        </tr>
        <tr>
            <?php
            $sql = "select * from categories where cat_status = 'unarchived'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {


            ?>

                <td><?php echo $row['cat_id']; ?></td>
                <td><?php echo $row['cat_title']; ?></td>
                <td><img width="80" height="80" class="img-resposive" src="../img/categories/<?php echo $row['cat_img'] ;?>" ></td>
                <td><a href="categories.php?opt=edit_category&edit=<?php echo $row['cat_id']; ?>" class="btn btn-success"><span class="fa fa-edit"></span></a></td>
                <td><a href="categories.php?opt=edit_category&archived=<?php echo $row['cat_id'] ?>" class="btn btn-success"><span class="fa fa-archive"></span></a></td>
        </tr>
    <?php
            }

            //Delete the Category Record
            if (isset($_GET['Del'])) {
                $Del = $_GET['Del'];
                $sql = "delete from categories where cat_id='$Del'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    header("location: categories.php");
                }
            }
            //Archived Category 
            if (isset($_GET['archived'])) {
                $archived = $_GET['archived'];
                $sql = "update categories set cat_status = 'archived' where cat_id='$archived'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    // echo("<meta http-equiv='refresh' content='1'>");
                }
            }
    ?>
    </table>


</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
<?php require_once('./includes/footer.php'); ?>