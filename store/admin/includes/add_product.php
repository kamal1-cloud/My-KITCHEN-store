<?php require_once('./includes/header.php'); ?>
<!-- Navigation -->
<?php require_once('./includes/nav.php'); ?>
<?php
if (isset($_POST['btn_add_product'])) {
    $Prd_Name = $_POST['prd_name'];
    $Prd_Cat_id = $_POST['cat_name'];
    $Prd_Price = $_POST['prd_price'];
    $Prd_Qtt = $_POST['prd_qnt'];

    $Prd_Image = $_FILES['image']['name']; //the type of file (img) and the name of the file
    $Prd_Temp = $_FILES['image']['tmp_name']; //temperary for the process
    $Prd_status = $_POST['prd_status'];
    $Prd_description = $_POST['prd_des'];


    // $Post_Date = date('d-m-y');  //is a function date // now is a date function (current time)


    $sql = "insert into product (prd_cat_id, prd_name, prd_price, prd_quantity, prd_image, prd_description, reg_date, prd_status) values ('$Prd_Cat_id', '$Prd_Name', '$Prd_Price', '$Prd_Qtt','$Prd_Image', '$Prd_description', now(), '$Prd_status')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Record has been saved in the database";
        move_uploaded_file($Prd_Temp, "../img/featured/$Prd_Image"); // when u want to store the img
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
                <div class="form-group">
                    <label for=""> Nom de Produit</label>
                    <input type="text" name="prd_name" placeholder="Name" class="form-control pb-2">
                </div>
                <div class="mt-3 mb-3">
                    <label for=""> Categories</label>
                    <select name="cat_name" id="" class="form-control">
                        <?php

                        $sql = "select * from categories";
                        $value = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($value)) {
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];

                        ?>
                            <option value="<?php echo $cat_id; ?>"> <?php echo $cat_title; ?></option>
                        <?php
                        }

                        ?>
                    </select>

                </div>




                <div class="form-group">
                    <label for=""> Prix de produit</label>
                    <input type="text" name="prd_price" placeholder="Prix" class="form-control pb-2">
                </div>
                <div class="form-group">
                    <label for=""> Quantités</label>
                    <input type="text" name="prd_qnt" placeholder="Quantites" class="form-control pb-2">
                </div>
                <div class="form-group">
                    <label for=""> Image</label>
                    <input type="file" name="image" placeholder="Produit Image" class="form-control pb-2">
                </div>


                <label for="">Status</label>
                <select name="prd_status" class="form-control">

                    <option>unarchived</option>
                    <option>archived</option>
                </select>

                <div class="form-group">
                    <label for=""> description</label>
                    <textarea name="prd_des" class="form-control" placeholder="Description" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group ">
                    <button class="btn btn-success" type="submit" name="btn_add_product"> Ajouter Produit</button>
                </div>
            </form>

        </div>


    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->


<?php require_once('./includes/footer.php'); ?>