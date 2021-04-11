<?php require_once('./includes/header.php'); ?>
<!-- Navigation -->
<?php require_once('./includes/nav.php'); ?>
<?php

if (isset($_GET['edit_user'])) {
    $user_ID = $_GET['edit_user'];
    $sql_user_query = "select * from users where user_id='$user_ID'";
    $sql_user_update = mysqli_query($conn,$sql_user_query);
    while($row = mysqli_fetch_assoc($sql_user_update))
     {
        $user_db_id = $row['user_id'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $user_role = $row['user_role'];
        $user_name = $row['user_name'];
        $user_email = $row['user_email'];
        $user_password = $row['user_password'];
     }

}
?>


<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg">
            <form action="" method="POST" enctype="multipart/form-data">
               
                <div class="form-group">
                    <label for="">First Name</label>
                    <input type="text" name="first_name" placeholder="First Name" class="form-control pb-2" value="<?php echo $first_name ?>">
                </div>
                <div class="form-group">
                    <label for=""> Last Name</label>
                    <input type="text" name="last_name" placeholder="Last Name" class="form-control pb-2" value="<?php echo $last_name ?>">
                </div>
                <div class="form-group"  >
                <select name="user_role" class="form-control">
                   <option value="subscriber"><?php echo $user_role ?></option>
                   <?php 
                         if($user_role == 'admin')
                         {
                             echo"<option value='subscriber'>subscriber</option>";
                         }
                         else
                         {
                            echo"<option value='admin'>admin</option>";
                         }
                   ?>

                </select>
                </div>
                <div class="form-group">
                    <label for=""> User Name</label>
                    <input type="text" name="user_name" placeholder="User Name" class="form-control pb-2" value="<?php echo $user_name ?>">
                </div>
                <div class="form-group">
                    <label for=""> User Email</label>
                    <input type="email" name="user_email" placeholder="User Email" class="form-control pb-2" value="<?php echo $user_email ?>">
                </div>
                <div class="form-group">
                    <label for=""> User Password</label>
                    <input type="password" name="user_password" placeholder="User Password" class="form-control pb-2" value="<?php echo $user_password ?>">
                </div>
                <div class="form-group ">
                    <button class="btn btn-success" type="submit" name="btn_update_user"> Update User</button>
                </div>
            </form>

        </div>


    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->
<?php 
    if(isset($_POST['btn_update_user']))
    {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $user_role = $_POST['user_role'];
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

        $update_query = "update users set first_name='$first_name', last_name ='$last_name', user_role= '$user_role', user_name= '$user_name', user_email= '$user_email', user_password ='$user_password' where user_id = '$user_ID'";

        $update_user_query = mysqli_query($conn,$update_query);
        if($update_user_query)
        {
            header("location: users.php");
        }
        else
        {
            echo"something is wrong";
        }
    }

?>

<?php require_once('./includes/footer.php'); ?>