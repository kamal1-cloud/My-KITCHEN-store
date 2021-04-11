<?php require_once "./includes/db.php" ?>
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
                <div class="section-title">
                    <h2>Sign in & Sign up</h2>
                </div>
        
</div>
<?php
					if (isset($_POST['login'])) {
						session_start();
						$UserName = $_POST['uname'];
						$Password = $_POST['password'];

						$UserName = mysqli_real_escape_string($conn, $UserName);
						$Password = mysqli_real_escape_string($conn, $Password);

						$query = "select * from users where username= '$UserName'";

						$data = mysqli_query($conn, $query);

						while ($row = mysqli_fetch_assoc($data)) {
							$db_user_id = $row['id'];
							$db_UserName = $row['username'];
							$db_Password = $row['password'];
							$user_email = $row['email'];
                            $user_phone = $row['phone'];
                            $user_img = $row['img'];
						}
						if ($UserName === $db_UserName && $Password === $db_Password) {
                            $_SESSION['IS_LOGIN']='yes';
                            $_SESSION['id'] = $db_user_id;
                            $_SESSION['db_user_name'] = $db_UserName;
                            $_SESSION['db_user_IMG'] = $user_img ;
							header("location: index.php");
						} else {
							echo "Something wrong";
						}
					}
					?>

<!-- Default form login -->
<form class="text-center border border-light mx-auto form" method="POST" enctype="multipart/form-data">

    <p class="h4 mb-4">Sign in</p>

    <!-- Email -->
    <input type="text" id="defaultLoginFormEmail" name="uname" class="form-control mb-4" placeholder="Username">

    <!-- Password -->
    <input type="password" id="defaultLoginFormPassword" name="password" class="form-control mb-4" placeholder="Password" autocomplete="on">

    <div class="d-flex justify-content-around">
        <div>
            <!-- Remember me -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
            </div>
        </div>
        <div>
            <!-- Forgot password -->
            <a href="reset-password.php">Forgot password?</a>
        </div>
    </div>

    <!-- Sign in button -->
    <button class="btn btn-info btn-block my-4" name="login" type="submit">Sign in</button>

    <!-- ------------- -->
<?php 
if (isset($_GET['newpwd'])) {
    if ($_GET['newpwd'] == "passwordupdated") {
        echo '<p class="signupsuccess">Your password has been reset! </p>';
    }
}

?>

    <!-- -------------- -->
    <!-- Register -->
    <p>Not a member?
        <a href="registring.php">Register</a>
    </p>

    <!-- Social login -->
    <p>or sign in with:</p>

    <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-twitter light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-github light-blue-text"></i></a>

</form>
<!-- Default form login -->


</section>
<!-- Featured Section End -->
</section>








<!-- Hero Section End -->


<?php require_once "./includes/footer.php" ?>