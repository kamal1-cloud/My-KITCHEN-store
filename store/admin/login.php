
<?php require_once('./includes/header.php');
?> 

<?php

session_start();
if (isset($_POST['submit'])) {
   $username = $_POST['username'];
   $password = $_POST['password'];

   $username = mysqli_real_escape_string($conn, $username);
   $password = mysqli_real_escape_string($conn, $password);

   $sql="select * from team where username='$username' and password='$password'";
	$res=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($res);
	if($count>0){
		$row=mysqli_fetch_assoc($res);
      $_SESSION['ROLE']=$row['role'];
      $_SESSION['user_name']=$row['username'];
		$_SESSION['IS_LOGIN']='yes';
		header("location: index.php");
    } else {
      $error = 'Please enter correct login details';
   }
}
?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-90 p-b-30">
				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title p-b-40">
						Login
					</span>
					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter email: ex@abc.xyz">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-20" data-validate = "Please enter password">
						<span class="btn-show-pass">
							<i class="fa fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit">
							Login
						</button>
					</div>
				
					
				</form>
			</div>
		</div>
	</div>
	
   <!-- Bootstrap core JavaScript-->
   <script src="vendor/jquery/jquery.min.js"></script>
   <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- Core plugin JavaScript-->
   <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>