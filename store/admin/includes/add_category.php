<?php require_once('./includes/header.php'); ?>



<!-- Navigation -->
<?php require_once('./includes/nav.php'); ?>


<!-- Add New Category -->

<div class="col-lg-6">
    <?php
    if (isset($_POST['btn_category'])) {
        if ($_POST['category'] == "") {
            echo '<p class="alert alert-danger">Please Enter Category </p>';
        } else {
            $Add_Cat = $_POST['category'];
            $cat_status = $_POST['cat_status'];
            $cat_Image = $_FILES['image']['name']; //the type of file (img) and the name of the file
            $cat_Temp = $_FILES['image']['tmp_name']; //temperary for the process
            $query = "insert into categories (cat_title,cat_img,cat_status ) value ('$Add_Cat','$cat_Image','$cat_status') ";
            $result= mysqli_query($conn, $query);
            if ($result) {
                echo "Record has been saved in the database";
                move_uploaded_file($cat_Temp, "../img/categories/$cat_Image"); // when u want to store the img
            } else {
                echo "Query Failed";
            }
        }
    }
    ?>
    <!-- Add new category -->
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for=""> Add New Category</label>
            <input type="text" name="category" placeholder="Category" class="form-control pb-2">
        </div>
        <div class="form-group">
                    <label for=""> Image</label>
                    <input type="file" name="image" placeholder="Category Image" class="form-control pb-2">
                </div>
        <div class="form-group">
        <label for="">Status</label>
        <select name="cat_status" class="form-control">
            <option>unarchived</option>
            <option>archived</option>
        </select>
        </div>
       
        <div class="form-group ">
            <button class="btn btn-success" type="submit" name="btn_category"> Add Category</button>
        </div>
    </form>

</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
<?php require_once('./includes/footer.php'); ?>