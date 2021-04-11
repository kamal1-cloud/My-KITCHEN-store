<?php require_once "./includes/db.php" ?>
<?php
ob_start();
session_start();
?>
<?php require_once "./includes/header.php" ?>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<?php require_once "./includes/nav_bar.php" ?>

<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <?php require_once "./includes/side_bar.php" ?>

            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="search.php" method="POST">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" name="search" placeholder="What do yo u need?">
                            <button type="submit" name="btn-search" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/1_cDMcXSxutJQz3TPnAgVeoQ.jpeg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2 class="text-danger">Cuisine Equipements</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html" class="text-danger">Maisons</a>
                        <a href="./index.html" class="text-danger">Restaurents</a>
                        <span class="text-danger">Cuisine Equipement</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">


                
                <?php

                if (isset($_GET['detail'])) {
                    $Prd_ID = $_GET['detail'];
                }

                $query = "select * from product where prd_id ='$Prd_ID'";
                $data = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($data)) {
                    $prd_id = $row['prd_id'];
                    $prd_name = $row['prd_name'];
                    $prd_price = $row['prd_price'];
                    $prd_img = $row['prd_image'];
                    $prd_description = $row['prd_description'];



                ?>

                    <?php
                    if (isset($_GET['detail'])) {
                        $Prd_det = $_GET['detail'];
                    }

                    $query = "select * from details where det_prd_id ='$Prd_det'";
                    $data = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($data)) {
                        $det_id = $row['det_id'];
                        $det_img_1 = $row['det_img_1'];
                        $det_img_2 = $row['det_img_2'];
                        $det_img_3 = $row['det_img_3'];
                        $det_img_4 = $row['det_img_4'];
                        $det_img_5 = $row['det_img_5'];
                        $det_vid = $row['det_vid'];
                    }
                    ?>
                    <?php
                    if (isset($_POST['add_to_card'])) {
                        $item_id = $_POST['$Prd_ID'];
                        $item_name = $_POST['$prd_name'];
                        $item_price = $_POST['item_price'];
                        $item_img = $_POST['item_img'];
                        $item_quantity = $_POST['item_quantity'];
                        $item_date = $_POST['item_date'];
                    }

                    ?>

                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img width="100" height="500" class="product__details__pic__item--large" src="img/product/details/<?php echo $prd_img ?>" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <img width="200" height="100" data-imgbigurl="img/product/details/<?php echo $det_img_1 ?>" src="img/product/details/<?php echo $det_img_1 ?>" alt="">
                            <img width="200" height="100" data-imgbigurl="img/product/details/<?php echo $det_img_2 ?>" src="img/product/details/<?php echo $det_img_2 ?>" alt="">
                            <img width="200" height="100" data-imgbigurl="img/product/details/<?php echo $det_img_3 ?>" src="img/product/details/<?php echo $det_img_3 ?>" alt="">
                            <img width="200" height="100" data-imgbigurl="img/product/details/<?php echo $det_img_4 ?>" src="img/product/details/<?php echo $det_img_4 ?>" alt="">
                            <img width="200" height="100" data-imgbigurl="img/product/details/<?php echo $det_img_5 ?>" src="img/product/details/<?php echo $det_img_5 ?>" alt="">
                            <video width="90" height="90" controls>
                                <source src="img/videos/<?php echo $det_vid ?>">
                            </video>
                        </div>
                    </div>
            </div>

            <div class="col-lg-6 col-md-6">

                <div class="product__details__text">
                    <h3><?php echo $prd_name ?></h3>
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(18 reviews)</span>
                    </div>
                    <div class="product__details__price"><?php echo $prd_price ?>DH</div>

                    <div class="product__details__quantity">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="text" value="1">
                            </div>
                        </div>
                    </div>




                    <a href="shoping-cart.php?item=<?php echo $prd_id; ?>" name="add_to_card" class="primary-btn">ADD TO CARD</a>
                    <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                    <ul>
                        <li><b>Availability</b> <span>In Stock</span></li>
                        <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                        <li><b>Share on</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- <div class=" order-2">
                <div class="blog__sidebar"> -->
                <?php

if (isset($_GET['detail'])) {
    $Prd_ID = $_GET['detail'];
}

$query = "select * from other_product where prd_id ='$Prd_ID'";
$data = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($data)) {
    $sec_id = $row['sec_id'];
    $prd_tags= $row['prd_tags'];



?>
                   
                    <div class="blog__sidebar__item">
                        <h4>Autre Indices</h4>
                        <div class="blog__sidebar__item__tags">
                            <a href="details.php?detail=<?php echo $sec_id; ?>"><?php echo $prd_tags ?></a>
                        </div>
                    </div>
<?php } ?>
                <!-- </div>
                </div> -->

            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">Description</a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p><?php echo $prd_description ?></p>
                            </div>
                            <!-- ------- -->
                            <?php

                            require "vendor/autoload.php";

                            if (isset($item_name,$item_price)) {
                                echo"something wrong";
                                die();
                            }

                            $Bar = new Picqer\Barcode\BarcodeGeneratorHTML();
                            $code = $Bar->getBarcode(isset($item_name,$item_price), $Bar::TYPE_CODE_128);
                            ?>
                            <!--  -->
                            <hr>
                            <div class="container" id="qrbox">
                            <div class="mb-3">
                            <h3>Code bar de produit</h3>
                            </div>
                                <?php echo $code ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?php
                }

        ?>
        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Produit Connexe</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php

            $query = "select * from product ORDER BY RAND() LIMIT 4";
            $data = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($data)) {
                $prd_id = $row['prd_id'];
                $prd_name = $row['prd_name'];
                $prd_price = $row['prd_price'];
                $prd_img = $row['prd_image'];



            ?>




                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/<?php echo $prd_img ?>">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="details.php?detail=<?php echo $prd_id; ?>"><?php echo $prd_name ?></a></h6>
                            <h5><?php echo $prd_price ?></h5>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
    </div>
</section>
<!-- Related Product Section End -->


<?php require_once "./includes/footer.php" ?>