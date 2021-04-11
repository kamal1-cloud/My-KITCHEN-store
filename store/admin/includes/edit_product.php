<?php require_once('./includes/header.php'); ?>
<!-- Navigation -->
<?php require_once('./includes/nav.php'); ?>


<?php
if (isset($_GET['p_id'])) {
    $Prd_ID = $_GET['p_id'];
    $sql = "select * from product where prd_id = '$Prd_ID'";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $Prd_id = $row['prd_id'];
        $Prd_Name = $row['prd_name'];
        $Prd_Cat_id = $row['prd_cat_id'];
        $Prd_Price = $row['prd_price'];
        $Prd_Qtt = $row['prd_quantity'];
        $img = $row['prd_image'];
        $Prd_description = $row['prd_description'];
        $Reg_date = $row['reg_date'];
    }
    $sql_det= "select * from details where det_prd_id = '$Prd_ID'";
    $result_det = mysqli_query($conn,$sql_det);
    while ($row = mysqli_fetch_assoc($result_det)) {
        $det_Prd_id = $row['det_prd_id'];
        $det_img_1 = $row['det_img_1'];
        $det_img_2 = $row['det_img_2'];
        $det_img_3 = $row['det_img_3'];
        $det_img_4= $row['det_img_4'];
        $det_img_5= $row['det_img_5'];
        $det_vid = $row['det_vid'];
    }

}
//Update Record
if (isset($_POST['btn_edit_product'])) {
    $Prd_Name = $_POST['prd_name'];
    $Prd_Cat_id = $_POST['cat_name'];
    $Prd_Price = $_POST['prd_price'];
    $Prd_Qtt = $_POST['prd_qnt'];
    // $Post_Status = $_POST['post_status'];

    $Prd_Image = $_FILES['image']['name']; //the type of file (img) and the name of the file
    $Prd_Temp = $_FILES['image']['tmp_name']; //temperary for the process

    $det_img_1 = $_FILES['image-1']['name']; //the type of file (img) and the name of the file
    $det_Temp_1 = $_FILES['image-1']['tmp_name']; //temperary for the process

    $det_img_2 = $_FILES['image-2']['name']; //the type of file (img) and the name of the file
    $det_Temp_2 = $_FILES['image-2']['tmp_name']; //temperary for the process

    $det_img_3 = $_FILES['image-3']['name']; //the type of file (img) and the name of the file
    $det_Temp_3 = $_FILES['image-3']['tmp_name']; //temperary for the process

    $det_img_4 = $_FILES['image-4']['name']; //the type of file (img) and the name of the file
    $det_Temp_4 = $_FILES['image-4']['tmp_name']; //temperary for the process

    $det_img_5 = $_FILES['image-5']['name']; //the type of file (img) and the name of the file
    $det_Temp_5 = $_FILES['image-5']['tmp_name']; //temperary for the process

    $det_vid = $_FILES['video']['name']; //the type of file (img) and the name of the file
    $det_Temp_vid = $_FILES['video']['tmp_name']; //temperary for the process

    if (empty($Prd_Image)) {
        $query = "select * from product where prd_id = ' $Prd_ID'";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $Prd_Image = $row['prd_image'];
        }
    }

    $Prd_description = $_POST['prd_des'];
    $Prd_status = $_POST['prd_status'];
    $sql = " update product set prd_cat_id ='$Prd_Cat_id', prd_name = '$Prd_Name', prd_price = '$Prd_Price',prd_quantity = '$Prd_Qtt', reg_date = now(), prd_image = '$Prd_Image', prd_description = '$Prd_description', prd_status=' $Prd_status' where prd_id = '$Prd_ID '";
    $sql_det = " update details set det_img_1 ='$det_img_1', det_img_2 = '$det_img_2', det_img_3 = '$det_img_3',det_img_4 = '$det_img_4', det_img_5 = '$det_img_5', det_vid = '$det_vid' where det_prd_id = '$Prd_ID '";

    $result = mysqli_query($conn, $sql);
    $result_det = mysqli_query($conn, $sql_det);

    if ($result && $result_det) {
        header("location: ./produits.php");
        move_uploaded_file($Prd_Temp, "../img/featured/$Prd_Image");
        move_uploaded_file($det_Temp_1, "../img/product/details/$det_img_1");
        move_uploaded_file($det_Temp_2, "../img/product/details/$det_img_2");
        move_uploaded_file($det_Temp_3, "../img/product/details/$det_img_3");
        move_uploaded_file($det_Temp_4, "../img/product/details/$det_img_4");
        move_uploaded_file($det_Temp_5, "../img/product/details/$det_img_5");
        move_uploaded_file($det_Temp_vid, "../img/videos/$det_vid");
    } else {
        echo "something wrong";
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
                    <input type="text" name="prd_name" placeholder=" Title" class="form-control pb-2" value="<?php echo $Prd_Name ?> ">
                </div>
                <div class="form-group">
                    <label for=""> Categories</label>
                    <select name="cat_name" id="" class="form-control">
                        <?php
                        $query = "select * from categories";
                        $data = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($data)) {
                            $cat_id = $row['prd_cat_id'];
                        ?>
                            <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_title']; ?> </option>
                        <?php

                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for=""> Prix</label>
                    <input type="text" name="prd_price" placeholder="Prix" class="form-control pb-2" value="<?php echo $Prd_Price ?>">
                </div>
                <div class="form-group">
                    <label for=""> Quantité</label>
                    <input type="text" name="prd_qnt" placeholder="Quantité" class="form-control pb-2" value="<?php echo $Prd_Qtt ?>">
                </div>
                <label for="">Status</label>
                <select name="prd_status" class="form-control">
                    <option>unarchived</option>
                    <option>archived</option>
                </select>
                <div class="form-group">
                    <label for=""> Image</label>
                    <img width="100" height="80" class="img-resposive" src="../img/featured/<?php echo $img; ?>">
                    <input type="file" name="image" placeholder="Image" class="form-control pb-2">
                </div>
                <!-- -------------- -->
                <div class="form-group">
                    <label for=""> Image 1</label>
                    <img width="100" height="80" class="img-resposive" src="../img/featured/<?php echo $det_img_1; ?>">
                    <input type="file" name="image-1" placeholder="Image" class="form-control pb-2">
                </div>
                <div class="form-group">
                    <label for=""> Image 2</label>
                    <img width="100" height="80" class="img-resposive" src="../img/featured/<?php echo $det_img_2; ?>">
                    <input type="file" name="image-2" placeholder="Image" class="form-control pb-2">
                </div>
                <div class="form-group">
                    <label for=""> Image 3</label>
                    <img width="100" height="80" class="img-resposive" src="../img/featured/<?php echo  $det_img_3; ?>">
                    <input type="file" name="image-3" placeholder="Image" class="form-control pb-2">
                </div>
                <div class="form-group">
                    <label for=""> Image 4</label>
                    <img width="100" height="80" class="img-resposive" src="../img/featured/<?php echo $det_img_4; ?>">
                    <input type="file" name="image-4" placeholder="Image" class="form-control pb-2">
                </div>
                <div class="form-group">
                    <label for=""> Image 5</label>
                    <img width="100" height="80" class="img-resposive" src="../img/featured/<?php echo $det_img_5; ?>">
                    <input type="file" name="image-5" placeholder="Image" class="form-control pb-2">
                </div>
                <div class="form-group">
                    <label for=""> Video</label>
                    <video width="100" height="80" controls>
                        <source src="../img/videos/<?php echo $det_vid; ?>" type="video/mp4">
                    </video>
                    <input type="file" name="video" placeholder="video" class="form-control pb-2">
                </div>
                <!-- ------------ -->
                <div class="form-group">
                    <label for=""> Decription</label>
                    <textarea name="prd_des" class="form-control" placeholder="Description" cols="30" rows="10"><?php echo $Prd_description  ?></textarea>
                </div>
                <div class="form-group ">
                    <button class="btn btn-success" type="submit" name="btn_edit_product"> Modifier Produit </button>
                </div>
            </form>

        </div>


    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->


<?php require_once('./includes/footer.php'); ?>