<?php require_once "./includes/db.php" ?>
<?php require_once "./includes/header.php" ?>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"><img src="img/logo.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
        </ul>
        <div class="header__cart__price">item: <span>$150.00</span></div>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__language">
            <img src="img/language.png" alt="">
            <div>English</div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="#">Spanis</a></li>
                <li><a href="#">English</a></li>
            </ul>
        </div>
        <div class="header__top__right__auth">
            <a href="#"><i class="fa fa-user"></i> Login</a>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="./index.html">Home</a></li>
            <li><a href="./shop-grid.html">Shop</a></li>
            <li><a href="#">Pages</a>
                <ul class="header__menu__dropdown">
                    <li><a href="./shop-details.html">Shop Details</a></li>
                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                    <li><a href="./checkout.html">Check Out</a></li>
                    <li><a href="./blog-details.html">Blog Details</a></li>
                </ul>
            </li>
            <li><a href="./blog.html">Blog</a></li>
            <li><a href="./contact.html">Contact</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
            <li>Free Shipping for all Order of $99</li>
        </ul>
    </div>
</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                        <div class="header__top__right__language">
                            <img src="img/language.png" alt="">
                            <div>English</div>
                            <span class="arrow_carrot-down"></span>
                            <!-- <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul> -->
                        </div>
                        <div class="header__top__right__auth">
                            <a href="#"><i class="fa fa-user"></i> Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="./index.html"><img src="img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="./index.html">Home</a></li>
                        <li><a href="./shop-grid.html">Shop</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="./shop-details.html">Shop Details</a></li>
                                <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                <li><a href="./checkout.html">Check Out</a></li>
                                <li><a href="./blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li><a href="./blog.html">Blog</a></li>
                        <li><a href="./contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                        <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                    </ul>
                    <div class="header__cart__price">item: <span>$150.00</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->

<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <?php require_once "./includes/side_bar.php" ?>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>




<!-- Featured Section Begin -->

<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
              
</div>

<hr>
<div class="container vertical-center">
    <div class="row border border-light mx-auto">
    
            <div class="col-md-8 mx-auto">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                          <h3><i class="fa fa-lock fa-4x"></i></h3>

                          <h2 class="text-center">Forgot Password?</h2>
                          <p>You can reset your password here.</p>
                            <div class="panel-body">
                              <?php
                              if(isset($_POST["send_pass"]))
                              {
                                  $selector = bin2hex(random_bytes(8));
                                  $token = random_bytes(32);

                                 $url = "http://agencehbweb.site/kamal/Kitchen-store/forgettenpwd/craete-new-password.php?selector=" .$selector ."&validator=" . bin2hex($token);
                                 $expires = date("U") + 1800;
                                  $userEmail = $_POST['email'];
                                  $sql = "DELETE FROM pwdRest WHERE pwdResetEmail=?";
                                  $stmt = mysqli_stmt_init($conn);
                                  if(!mysqli_stmt_prepare($stmt, $sql))
                                  {
                                      echo "There was an error!";
                                      exit();
                                  }else{
                                    
                                      mysqli_stmt_bind_param($stmt, "s", $userEmail);
                                       mysqli_stmt_execute($stmt);
                                  }
                                  $sql = "insert into pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires ) values (?, ?, ?,?)";
                                  $stmt = mysqli_stmt_init($conn);
                                  if(!mysqli_stmt_prepare($stmt, $sql))
                                  {
                                      echo "There was an error!";
                                      exit();
                                  }else{
                                      $hashedToken = password_hash($token, PASSWORD_DEFAULT);
                                      mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
                                       mysqli_stmt_execute($stmt);
                                       mysqli_close($conn);
                                  }
                                  mysqli_stmt_close($stmt);
                                  
                                  $to = $userEmail;
                                  $subject = 'Reset your password for hbweb';
                                  $message = '<p>We recieved a password reset request. The link to reset your password is below. If you did not make this request, you can ignore this email</p>';
                                  $message .= '<p>Here is your password reset link: </br>';
                                  $message .= '<a href"' .$url . '">' .$url . '</a></p>';

                                  $headers= "From: Ogani <agencehbweb@aya.genious.net
                                  >\r\n";
                                  $headers .= "Reply-To: agencehbweb@aya.genious.net
                                  \r\n";
                                  $headers .= "Content-type: text/html\r\n";
                                  mail( $to, $subject, $headers);

                                  header("location: reset-password.php?reset=success");
                                  


                              }
                            else{
                                //   header("location: index.php");
                              }
                              ?>
                              <form class="form" method="POST">
                                <fieldset>
                                  <div class="form-group">
                                    <div class="input-group">
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                      
                                      <input id="emailInput" placeholder="email address" name="email" class="form-control" type="email" oninvalid="setCustomValidity('Please enter a valid email address!')" onchange="try{setCustomValidity('')}catch(e){}" required="">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <input class="btn btn-lg btn-primary btn-block" name="send_pass" value="Send My Password" type="submit">
                                  </div>
                                </fieldset>
                              </form>
                              <?php 
                              if(isset($_GET["reset"]))
                              {
                                  if($_GET["reset"] == "success")
                                  {
                                      echo '<p class="signupsuccess">Check your e-mail!</p>';
                                  }
                              }
                              ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    



</form>
<!-- Default form login -->


</section>
<!-- Featured Section End -->
</section>








<!-- Hero Section End -->


<?php require_once "./includes/footer.php" ?>



