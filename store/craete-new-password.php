<?php require_once "./includes/db.php" ?>
<?php require_once "./includes/header.php" ?>
<?php
$selector = $_GET['selector'];
$validator = $_GET['validator'];
if(empty($selector) || empty($validator))
{
    echo "Could not validate your request!";
}else {
    if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false)
    {
     ?>
     
<!-- Default form login -->
<form class="text-center border border-light mx-auto form" action="./includes/reset-password.inc.php" method="POST">


<!-- New Password -->
<input type="hidden" name="selector" class="form-control mb-4" value="<?php echo $selector ?>">

<!-- Password -->
<input type="hidden" name="validator" class="form-control mb-4" value="<?php echo $validator ?>">

<!-- Password -->
<input type="password" name="pwd" class="form-control mb-4"  placeholder="Enter a new password.." autocomplete="on">

<!-- Password -->
<input type="password" name="pwd-repeat" class="form-control mb-4"  placeholder="Repeat password" autocomplete="on">

<div class="form-group">
     <input class="btn btn-lg btn-primary btn-block" name="reset-password-submit" value="Reset password" type="submit">
</div>


</form>
     <?php    
    }
}
?>

<?php require_once "./includes/footer.php" ?>
