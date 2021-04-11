<?php require_once('./includes/header.php'); ?>
<!-- Navigation -->
<?php require_once('./includes/nav.php'); ?>
<?php

if (isset($_GET['member'])) {
    $member_ID = $_GET['member'];
    $sql_user_query = "select * from team where id='$member_ID'";
    $sql_user_update = mysqli_query($conn,$sql_user_query);
    while($row = mysqli_fetch_assoc($sql_user_update))
     {
        $user_db_id = $row['id'];
        $user_name = $row['username'];
        $email = $row['email'];
        $password = $row['password'];
        $phone = $row['phone'];
        $img = $row['image'];
        $role= $row['role'];
     }

}
?>


<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg">
            <form action="" method="POST" enctype="multipart/form-data">
               
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" placeholder="First Name" class="form-control pb-2" value="<?php echo $user_name ?>">
                </div>
                <div class="form-group">
                    <label for=""> email</label>
                    <input type="email" name="email" placeholder="Last Name" class="form-control pb-2" value="<?php echo $email ?>">
                </div>
                <div class="form-group">
                    <label for=""> Password</label>
                    <input type="password" name="password" placeholder="Last Name" class="form-control pb-2" value="<?php echo $password ?>">
                </div>
                <div class="form-group">
                    <label for=""> Phone</label>
                    <input type="phone" name="phone" placeholder="Last Name" class="form-control pb-2" value="<?php echo $phone ?>">
                </div>
                <div class="form-group">
                    <label for=""> Image</label>
                    <img width="100" height="80" class="img-resposive" src="../img/team/<?php echo $img; ?>">
                    <input type="file" name="image" placeholder="Image" class="form-control pb-2">
                </div>

                <div class="form-group "  >
                <select name="role" class="form-control">
                   <option value=""><?php echo $role ?></option>
                          <option value='admin'>admin</option>
                          <option value='manager'>manager</option>
                            
                </select>
                </div>
                <div class="form-group ">
                    <button class="btn btn-success" type="submit" name="btn_update_member"> Update Member</button>
                </div>
            </form>

        </div>


    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->
<?php 
    if(isset($_POST['btn_update_member']))
    {
        $user_name = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];

        $mem_Image = $_FILES['image']['name']; //the type of file (img) and the name of the file
        $mem_Temp = $_FILES['image']['tmp_name']; //temperary for the process

        $role = $_POST['role'];
        
        
       

        $update_query = "update team set username='$user_name', email ='$email', phone= '$phone', image= '$mem_Image', role= '$role', reg_date = now() where id = '$member_ID'";

        $update_user_query = mysqli_query($conn,$update_query);
        if($update_user_query)
        {
            move_uploaded_file($mem_Temp, "../img/team/$mem_Image");
            header("location: Team.php");
        }
        else
        {
            echo"something is wrong";
        }
    }

?>

<?php require_once('./includes/footer.php'); ?>