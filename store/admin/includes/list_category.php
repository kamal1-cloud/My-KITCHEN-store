<?php require_once('./includes/header.php'); ?>


    <!-- Navigation -->
    <?php require_once('./includes/nav.php'); ?>


                <div class="col-lg-6">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 20%;">Category ID</th>
                            <th style="width: 50%;">Category Name</th>
                            <th style="width: 50%;">Category Image</th>

                        </tr>
                        <tr>
                            <?php
                            $sql = "select * from categories";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {


                            ?>

                                <td><?php echo $row['cat_id']; ?></td>
                                <td><?php echo $row['cat_title']; ?></td>
                                <td><img width="80" height="80" class="img-resposive" src="../img/categories/<?php echo $row['cat_img'] ;?>" ></td>
                              
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
                    ?>
                    </table>
             

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php require_once('./includes/footer.php'); ?>