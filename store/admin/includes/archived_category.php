<?php require_once('./includes/header.php'); ?>



    <!-- Navigation -->
    <?php require_once('./includes/nav.php'); ?>


                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 20%;">Category ID</th>
                            <th style="width: 50%;">Category Name</th>
                            <th style="width: 50%;">Category Image</th>
                            <th style="width: 10%;">Delete</th>
                            <th style="width: 10%;">Unarchived</th>

                        </tr>
                        <tr>
                            <?php
                            $sql = "select * from categories where cat_status = 'archived'";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {


                            ?>

                                <td><?php echo $row['cat_id']; ?></td>
                                <td><?php echo $row['cat_title']; ?></td>
                                <td><img width="80" height="80" class="img-resposive" src="../img/categories/<?php echo $row['cat_img'] ;?>" ></td>
                                <td><a href="categories.php?Del=<?php echo $row['cat_id']; ?>" class="btn btn-danger"><span class="fa fa-trash"></span></a></td>
                                <td><a href="categories.php?opt=archived_category&unarchived=<?php echo $row['cat_id'] ?>" class="btn btn-success"><span class="fa fa-archive"></span></a></td>
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
                              //Delete the Category Record
                              if (isset($_GET['unarchived'])) {
                                $Una = $_GET['unarchived'];
                                $sql = "update categories set cat_status ='unarchived' where cat_id='$Una'";
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    // header("location: ./includes/archived_category.php");
                                    // die;
                                }
                            }
                    ?>
                    </table>
             
             
     
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php require_once('./includes/footer.php'); ?>