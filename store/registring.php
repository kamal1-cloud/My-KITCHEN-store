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
						if (isset($_POST['btn_submit'])) {
							session_start();
							$Username = $_POST['username'];
							$Email = $_POST['email'];
							$Password = $_POST['password'];
							$Password2 = $_POST['se_password'];
                            $Phone = $_POST['phone'];
                            $User_Image = $_FILES['image']['name']; //the type of file (img) and the name of the file
                            $User_Temp = $_FILES['image']['tmp_name']; //temperary for the process

							if ($Password == $Password2) {
								$sql = "insert into users ( username, email, password, phone, img) values(' $Username','$Email', '$Password',  '$Phone', '$User_Image')";
                                $data = mysqli_query($conn, $sql);
                                if ($data) {
                                   
                                    move_uploaded_file($User_Temp, "../img/user/$User_Image"); // when u want to store the img
                                    $_SESSION['message'] = "You are now logged in";
                                } else {
                                    echo "The two passwords do not match";
                                }
								
							} 
						}

						?>

<!-- Default form register -->
<form class="text-center border border-light  mx-auto form " action="#" method="POST" enctype="multipart/form-data">

    <p class="h4 mb-4">Sign up</p>
  
  <!-- E-mail -->
  <input type="text"  name="username" class="form-control mb-4" placeholder="Username">

    <!-- E-mail -->
    <input type="email"  name="email" class="form-control mb-4" placeholder="E-mail">

     <!-- password -->
     <input type="password"  name="password" class="form-control mb-4" placeholder="Password" autocomplete="on">

      <!-- password -->
      <input type="password"  name="se_password" class="form-control mb-4" placeholder="Password" autocomplete="on">

       <!-- Phone number-->
     <input type="text"  name="phone" class="form-control mb-4" placeholder="Phone number">

      <!-- Profile Image-->
      <input type="file"  name="image" class="form-control mb-4" placeholder="Phone number">

    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" name="btn_submit" type="submit">Sign in</button>


    <!-- Terms of service -->
    <p>Have already an account ?
        <a href="login.php" >Login here</a>

</form>
<!-- Default form register -->


</section>
<!-- Featured Section End -->
</section>








<!-- Hero Section End -->


<?php require_once "./includes/footer.php" ?>