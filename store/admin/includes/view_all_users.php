<table class="table table-stripped">
    <tr>
        <td>ID</td>
        <td>User Name</td>

        <td>Email</td>
        <td>phone</td>
        <td>Delete</td>
        <td>Edit</td>
    </tr>
    <tr>
        <?php
        $sql = "select * from users";
        $users = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($users)) {


        ?>

            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><a href="users.php?del=<?php echo $row['id'] ?>" class="btn btn-danger"><span class="fa fa-trash"></span></a></td>
            <td><a href="users.php?opt=edit_user&edit_user=<?php echo $row['user_id'] ?>" class="btn btn-success"><span class="fa fa-pencil"></span></a></td>
            <!-- <td><a href="users.php?admin=<?php echo $row['user_id'] ?>" class="btn btn-success"><span class="fa fa-user"></span></a></td>
            <td><a href="users.php?subscriber=<?php echo $row['user_id'] ?>" class="btn btn-primary"><span class="fa fa-users"></span></a></td> -->

    </tr>
<?php
        }

        //Delete users
        if(isset($_GET['del']))
        {
            $user_del_id = $_GET['del'];
            $sql_user_del = "delete from users where id = '$user_del_id'";
            $user_del_query = mysqli_query($conn,$sql_user_del);

            if($user_del_query)
            {
               header('location: users.php') ;
            }
        }

        //Admin role
        if(isset($_GET['admin']))
        {
            $admin_id = $_GET['admin'];
            $sql_admin = "update users set user_role = 'admin' where user_id = '$admin_id'";
            $sql_result_admin = mysqli_query($conn,$sql_admin);

            if($sql_result_admin)
            {
               header('location: users.php') ;
            }
        }
         //Subscriber role
         if(isset($_GET['subscriber']))
         {
             $sub_id = $_GET['subscriber'];
             $sql_subscriber = "update users set user_role = 'subscriber' where user_id = '$sub_id '";
             $sql_result_sub = mysqli_query($conn,$sql_subscriber);
 
             if($sql_result_sub)
             {
                header('location: users.php') ;
             }
         }
?>

</table>