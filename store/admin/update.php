<?php 

  require_once('./includes/header.php');

  if(isset($_POST['btn_edit_category']))
  {
      $up_id =$_POST['edit_id'];
      $up_cat =$_POST['Edit_Category'];
      $up_status =$_POST['edit_status'];
      $sql ="update categories set cat_title='$up_cat', cat_status = '$up_status' where cat_id='$up_id'";
      $result = mysqli_query($conn,$sql);

      if($result)
      {
          echo '<p class="alert alert-success">Your Category has Been Updated :) </p>';
          header("location:categories.php");
      }
      else
      {
          echo " Query Field";
      }
  }



?>