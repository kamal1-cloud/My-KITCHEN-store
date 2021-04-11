<?php require_once('./includes/header.php'); ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php require_once('./includes/nav.php'); ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <small>Author</small>
                    </h1>

                   <?php 

                     if(isset($_GET['opt']))
                     {
                         $opt =$_GET['opt'];
                     }
                     else
                     {
                        $opt = '';
                     }
                    switch($opt)
                    {
                        case 'add_product':
                            require_once('includes/add_product.php');
                            break;
                            case 'modif_product':
                                require_once('includes/modif.php');
                                break;
                        case 'edit_product':
                            require_once('includes/edit_product.php');
                            break;
                            case 'archived_products':
                                require_once('includes/archived_products.php');
                                break;
                            default:
                            require_once('includes/view_all_products.php');
                        break;

                    }

                   ?>
                </div>


            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php require_once('./includes/footer.php'); ?>