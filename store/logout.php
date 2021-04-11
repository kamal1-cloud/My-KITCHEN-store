<?php
   session_start();
   $_SESSION['db_user_name'] = null;
   header("location: index.php")
?>