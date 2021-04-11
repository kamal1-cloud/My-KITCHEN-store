<table class="table table-stripped">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Price</td>
        <td>Category</td>
        <td>Quantité</td>
        <td>Img</td>
        <td>Description</td>
        <td>Date</td>
        <td>Delete</td>
        <td>Désarchivé</td>


    </tr>
    <tr>
        <?php
        $query = "select * from product where prd_status = 'archived'";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $cat_id = $row['prd_cat_id'];

        ?>



            <td><?php echo $row['prd_id']; ?></td>
            <td><?php echo $row['prd_name']; ?></td>
            <td><?php echo $row['prd_price']; ?></td>

            <?php
            $query = "select * from categories where cat_id = '$cat_id'";
            $data = mysqli_query($conn, $query);

            while ($value = mysqli_fetch_assoc($data)) {
            ?>
                <td><?php echo $value['cat_title']; ?></td>

            <?php
            }
            ?>





            <td><?php echo $row['prd_quantity']; ?></td>
            <td><img width="50" height="50" class="img-resposive" src="../img/featured/<?php echo $row['prd_image']; ?>"></td>
            <td><?php echo $row['prd_description']; ?></td>
            <td><?php echo $row['reg_date']; ?></td>
            <td><a href="produits.php?del=<?php echo $row['prd_id'] ?>" class="btn btn-danger"><span class="fa fa-trash"></span></a></td>
            <td><a href="produits.php?opt=archived_products&unarchived=<?php echo $row['prd_id'] ?>" class="btn btn-success"><span class="fa fa-inbox-out" ></span></a></td>

    </tr>
<?php
        }

?>

</table>

<?php
if (isset($_GET['del'])) {
    $Del_ID = $_GET['del'];
    $sql = "delete from product where prd_id = '$Del_ID' ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        unlink("../images/$old");
        header("location: produits.php");
    }

}

        //Unapprove
        if(isset($_GET['unarchived']))
        {
            $ct_id = $_GET['unarchived'];
            $sql_comment = "update product set prd_status = 'unarchived' where prd_id = '$ct_id'";
            $sql_result = mysqli_query($conn,$sql_comment);

            // if($sql_result)
            // {
            //     header( "refresh:0");
            // }
        }
?>