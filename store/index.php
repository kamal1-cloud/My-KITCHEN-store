<?php require_once "./includes/db.php" ?>
<?php require_once "./includes/header.php" ?>
<?php
ob_start();
session_start();

?>
  
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
                                <input type="text" name="search" placeholder="What do yo u need?" >
                                <button type="submit" name="btn-search" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                     
                    </div>
                    <div class="hero__item set-bg" data-setbg="img/hero/121585944.jpg">
                        <div class="hero__text">
                            <h2>Cuisine <br />100% Equipée</h2>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                <?php
				$sql = "SELECT * FROM categories";
				$result = mysqli_query($conn, $sql);

				while ($row = mysqli_fetch_assoc($result)) {
					$cat_id = $row['cat_id'];

                    $cat_title = $row['cat_title'];
                    $cat_img = $row['cat_img'];
                  ?>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg " data-setbg="img/categories/<?php echo $cat_img ?>" >
                            <h5><a href="category.php?category=<?php echo $cat_id ?>"><?php echo $cat_title ?></a></h5>
                        </div>
                    </div>
                    <?php
                }
                ?>

                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Produit en vedette</h2>
                    </div>
                  
                </div>
            </div>
            <div class="row featured__filter">
            <?php
                
            $query = "select * from product where prd_status= 'unarchived' limit 8";
              $data = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($data)) {
                $prd_id = $row['prd_id'];
                  $prd_name = $row['prd_name'];
                $prd_price = $row['prd_price'];
                $prd_img = $row['prd_image'];



 ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/featured/<?php echo $prd_img ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a  href="shoping-cart.php?item=<?php echo $prd_id ?>" ><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="details.php?detail=<?php echo $prd_id; ?>"><?php echo $prd_name ?></a></h6>
                            <h5><?php echo $prd_price ?> DH</h5>
                        </div>
                    </div>
                </div>
                <?php 
            }
        
            ?>
               
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-1.jpg" alt="">
                    </div>
                </div>

              
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-2.jpg" alt="">
                    </div>
                </div>

              
            </div>
        </div>
    </div>
    <!-- Banner End -->

    
    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php
            $query = "SELECT * FROM posts where post_status = 'published' limit 3";
            $data = mysqli_query($conn, $query);
               
            while ($row = mysqli_fetch_assoc($data)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_img = $row['post_img'];
                $post_content = $row['post_content'];
                $post_tags = $row['post_tags'];
                $post_status = $row['post_status'];


            ?>

                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/<?php echo $post_img ?>" width="500" height="300" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> <?php echo $post_date?></li>
                            </ul>
                            <h5><a href="blog-details.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a></h5>
                            <p><?php echo substr('$post_content', 100) ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <?php require_once "./includes/footer.php" ?>