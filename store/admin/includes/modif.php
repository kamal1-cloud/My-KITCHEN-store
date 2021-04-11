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
        <td>Edit</td>
        <td>Archivée</td>

    </tr>
    <tr>
        <?php
        $query = "select * from product where prd_status = 'unarchived'";
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
            <td><a href="produits.php?opt=edit_product&p_id=<?php echo $row['prd_id'] ?>" class="btn btn-success"><span class="fa fa-pencil"></span></a></td>
            <td><a href="produits.php?opt=modif_product&archived=<?php echo $row['prd_id'] ?>" class="btn btn-success"><span class="fa fa-archive"></span></a></td>


    </tr>
<?php
        }

?>

</table>

<?php
if (isset($_GET['del'])) {
    $Del_ID = $_GET['del'];
    $sql = "delete from product where post_id = '$Del_ID' ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        unlink("../images/$old");
        header("location: produits.php");
    }
}
    if (isset($_GET['archived'])) {
        $up_ID = $_GET['archived'];
        $sql_prd = "update product set prd_status = 'archived' where prd_id = '$up_ID'";
        $result = mysqli_query($conn, $sql_prd);
        if ($result) {   
           echo"Record has been submit it";
            // header("location: ./includes/archived_products.php");
        }
        else{
            echo"something wrong";
        }
}
?>