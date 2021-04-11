
<?php
   session_start();
   $_SESSION['ROLE'] = null;
   $_SESSION['IS_LOGIN'] = null;
   header("location: login.php")
?>