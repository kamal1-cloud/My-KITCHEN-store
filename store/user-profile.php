<?php require_once "./includes/db.php" ?>
<?php
session_start();
if(!isset($_SESSION['IS_LOGIN'])){
	header("location: login.php");
	die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">



  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/pro.css" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"></div>
      <div class="sidebar-heading"></div>
      <div class="sidebar-heading"></div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-light">Edit Account</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Change Password</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Delete Account</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Log out</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>

          </ul>
        </div>
      </nav>
      <!-- ----------------- -->
<?php 
if (isset($_SESSION['id'])) {
    $db_user_id = $_SESSION['id'];
}
   $sql = "select * from users where id = '$db_user_id'";
   $data = mysqli_query($conn, $sql);

						while ($row = mysqli_fetch_assoc($data)) {
							$db_UserName = $row['username'];
							$user_email = $row['email'];
                            $user_phone = $row['phone'];
                            $user_img = $row['img'];
						

?>

      <div class="box box-info">
        
        <div class="box-body">
                 <div class="col-sm-6">
                 <div  align="center"> <img alt="User Pic" src="img/user/<?php echo $user_img ?>" id="profile-image1" class="img-circle img-responsive"> 
            
            <input id="profile-image-upload" class="hidden" type="file">
<div style="color:#999;" >click here to change profile image</div>
            <!--Upload Image Js And Css-->
       
          

            
            
                 
                 
                 </div>
          
          <br>

          <!-- /input-group -->
        </div>

        <div class="clearfix"></div>
        <hr style="margin:5px 0 5px 0;">

          
<div class="col-sm-5 col-xs-6 tital " >User Name:</div><div class="col-sm-7 col-xs-6 "><?php echo $db_UserName ?></div>
 <div class="clearfix"></div>
<div class="bot-border"></div>


<div class="col-sm-5 col-xs-6 tital " >Email</div><div class="col-sm-7"><?php echo $user_email ?></div>

<div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Phone</div><div class="col-sm-7"><?php echo $user_phone ?></div>

<div class="clearfix"></div>
<div class="bot-border"></div>




        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </div>
   
     <?php } ?>   
</div> 
</div>
</div>  
    <!-- /#page-content-wrapper -->
  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
