<?php require_once "./includes/db.php" ?>
<?php require_once "./includes/header.php" ?>
<?php
ob_start();
session_start();
?>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>


<?php require_once "./includes/nav_bar.php" ?>

<!-- Hero Section Begin -->
<section class="hero hero-normal">
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

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Department</h4>
                        <?php
				$sql = "SELECT * FROM categories";
				$result = mysqli_query($conn, $sql);

				while ($row = mysqli_fetch_assoc($result)) {
					$cat_id = $row['cat_id'];

					$cat_title = $row['cat_title'];
                  ?>
                        <ul>
                         
                            <li>
							  <a href='category.php?category=<?php echo$cat_id; ?>'><?php echo $cat_title ?></a>
							</li> 
                            		
					
                        </ul>
                        <?php
						}
                 ?>
                    </div>
                    <div class="sidebar__item">
                        <h4>Price</h4>
                        <div class="price-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="1100" data-max="5000">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar__item sidebar__item__color--option">
                        <h4>Colors</h4>
                        <div class="sidebar__item__color sidebar__item__color--white">
                            <label for="white">
                                White
                                <input type="radio" id="white">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--gray">
                            <label for="gray">
                                Gray
                                <input type="radio" id="gray">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--red">
                            <label for="red">
                                Red
                                <input type="radio" id="red">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--black">
                            <label for="black">
                                Black
                                <input type="radio" id="black">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--blue">
                            <label for="blue">
                                Blue
                                <input type="radio" id="blue">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--green">
                            <label for="green">
                                Green
                                <input type="radio" id="green">
                            </label>
                        </div>
                    </div>

                   
                  
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Sale Off</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
<?php
    $sql = "select * from product where prd_status = 'unarchived' and prd_best_sell ='0'";
    $data = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($data)) {
        $prd_id = $row['prd_id'];
        $prd_name = $row['prd_name'];
        $prd_price = $row['prd_price'];
        $prd_img = $row['prd_image'];
        $prd_description = $row['prd_description'];
        $discount = $prd_price * 0.2;
 ?>

                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg" data-setbg="img/product/<?php echo $prd_img ?>">
                                    <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>Dried Fruit</span>
                                        <h5><a href="#"><?php echo $prd_name ?></a></h5>
                                        <div class="product__item__price"><?php echo $discount ?> DH<span><?php echo $prd_price ?> </span></div>
                                    </div>
                                </div>
                            </div>
    <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                          
                        <div class="col-lg-4 col-md-3">

                        </div>
                    </div>
                </div>
                <div class="row">
                <!-- ----- -->
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Sale Off</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
<?php
    $sql = "select * from product where prd_status = 'unarchived' and prd_best_sell ='0'";
    $data = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($data)) {
        $prd_id = $row['prd_id'];
        $prd_name = $row['prd_name'];
        $prd_price = $row['prd_price'];
        $prd_img = $row['prd_image'];
        $prd_description = $row['prd_description'];
        $discount = $prd_price * 0.4;
 ?>

                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg" data-setbg="img/product/<?php echo $prd_img ?>">
                                    <div class="product__discount__percent">-40%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>Dried Fruit</span>
                                        <h5><a href="#"><?php echo $prd_name ?></a></h5>
                                        <div class="product__item__price"><?php echo $discount ?> DH<span><?php echo $prd_price ?></span></div>
                                    </div>
                                </div>
                            </div>
                           
    <?php } ?>
                        </div>
                    </div>
                    </div>
                    </div>
            
                                <!-- ----- -->
                                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Sale Off</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
<?php
    $sql = "select * from product where prd_status = 'unarchived' and prd_best_sell ='0'";
    $data = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($data)) {
        $prd_id = $row['prd_id'];
        $prd_name = $row['prd_name'];
        $prd_price = $row['prd_price'];
        $prd_img = $row['prd_image'];
        $prd_description = $row['prd_description'];
        $discount = $prd_price * 0.5;
 ?>

                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg" data-setbg="img/product/<?php echo $prd_img ?>">
                                    <div class="product__discount__percent">-50%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>Dried Fruit</span>
                                        <h5><a href="#"><?php echo $prd_name ?></a></h5>
                                        <div class="product__item__price"><?php echo $discount ?> DH<span><?php echo $prd_price ?></span></div>
                                    </div>
                                </div>
                            </div>
    <?php } ?>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
<?php require_once "./includes/footer.php" ?>