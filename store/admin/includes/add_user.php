<?php require_once('./includes/header.php'); ?>
<!-- Navigation -->
<?php require_once('./includes/nav.php'); ?>
<?php
if (isset($_POST['btn_add_user'])) {
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_phone = $_POST['user_phone'];

    $sql = "insert into users (username, email, password, phone) values ('$user_name', '$user_email', '$user_password', '$user_phone')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Record has been saved in the database";
        // move_uploaded_file($Post_Temp, "../img/$Post_Image"); // when u want to store the img
    } else {
        echo "Query Failed";
    }
}
?>


<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg">
            <form action="" method="POST" enctype="multipart/form-data">
               
                <!-- <div class="form-group"  >
                <select name="user_role" class="form-control">
                   <option name="subscriber">Select User</option>
                   <option name="admin">Admin</option>
                   <option name="subscriber">Subscriber</option>
                </select>
                </div> -->
                <div class="form-group">
                    <label for=""> User Name</label>
                    <input type="text" name="user_name" placeholder="User Name" class="form-control pb-2">
                </div>
                <div class="form-group">
                    <label for=""> User Email</label>
                    <input type="email" name="user_email" placeholder="User Email" class="form-control pb-2">
                </div>
                <div class="form-group">
                    <label for=""> User Password</label>
                    <input type="password" name="user_password" placeholder="User Password" class="form-control pb-2">
                </div>
                <div class="form-group">
                    <label for="phone"> User Phone</label>
                    <input type="tel" name="user_phone" placeholder="User Phone" class="form-control pb-2">
                </div>
                <div class="form-group ">
                    <button class="btn btn-success" type="submit" name="btn_add_user"> Add User</button>
                </div>
            </form>

        </div>


    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->


<?php require_once('./includes/footer.php'); ?>