<?php require_once "./includes/db.php" ?>
<?php
session_start();
if(!isset($_SESSION['IS_LOGIN'])){
	header("location: login.php");
	die();
}
?>
<?php require_once "./includes/header.php" ?>

<?php 
    //getting the session id
    if (isset($_SESSION['id'])) {
        $client_id = $_SESSION['id'];
    }
    //getting the item id
    if (isset($_GET['item'])) {
        $Item_ID = $_GET['item'];
        //getting all items from cart table
    $cart_query = "SELECT * FROM cart WHERE item_id = '$Item_ID' AND client_id = '$client_id'";
    $cart_search_query = mysqli_query($conn,$cart_query);
    if (!$cart_search_query) {
        die("QUERY FAILED" . mysqli_error($conn));
    }
    while ($row = mysqli_fetch_array($cart_search_query)) {
        $item_id = $row['item_id'];
        $item_name = $row['item_name'];
        $item_price = $row['item_price'];
        $item_img = $row['item_img'];
        $item_quantity = $row['item_quantity'];
        $item_date = $row['item_date'];
    }
    $row_count = mysqli_num_rows($cart_search_query);

    if($row_count > 0){
        $update_query = "UPDATE cart SET item_quantity = item_quantity+1 WHERE item_id = '$Item_ID' AND client_id = '$client_id'";
        $update_item_query = mysqli_query($conn,$update_query);
        header('Location: shoping-cart.php');

    }else{
         //getting the item infos from products table
        $item_query = "SELECT * FROM product WHERE prd_id = '$Item_ID'";
        $item_search_query = mysqli_query($conn,$item_query);

        while ($row = mysqli_fetch_array($item_search_query)) {
            $item_title = $row['prd_name'];
            $item_image = $row['prd_image'];
            $item_price = $row['prd_price'];
            
            
        }

        if (!$item_search_query) {
            die("QUERY FAILED" . mysqli_error($conn));
        }

         //adding the item to cart if it doesn't already exist
        $add_query = "INSERT INTO cart (item_id,client_id,item_name,item_price,item_img,item_date) VALUES ('$Item_ID','$client_id','$item_title','$item_price','$item_image',now())";
        $add_to_cart_query = mysqli_query($conn,$add_query);

        if (!$add_to_cart_query) {
            die("QUERY FAILED" . mysqli_error($conn));
        }

        header('Location: shoping-cart.php');
    }
    } 
?>

  <?php require_once "./includes/nav_bar.php" ?>

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <!-- <th>Total</th> -->
                                    <th></th>
                                </tr>
                            </thead>
                            <?php
                
			
				$sql = "SELECT * FROM cart where client_id= '$client_id'";
				$result = mysqli_query($conn, $sql);
                $total_final= 0;
				while ($row = mysqli_fetch_assoc($result)) {
					$item_id = $row['item_id'];
                    $item_name = $row['item_name'];
                    $item_price = $row['item_price'];
                    $item_img = $row['item_img'];
                    $item_quantity = $row['item_quantity'];
                    $total = $item_price * $item_quantity;
                    $total_final=$total_final+$total;
                  
               
                  ?>
                            <tbody>


                                <tr>
                                    <td class="shoping__cart__item">
                                        <img width="90px" height="90px" src="img/product/<?php echo $item_img ?>" alt="">
                                        <h5><?php echo $item_name ?></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                    <?php echo $item_price ?>
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="<?php echo $item_quantity ?>">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                       <?php echo $total ?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <span class="icon_close"></span>
                                    </td>
                                </tr>
                            </tbody>
                            <?php
    }
    ?>
                        </table>
                    </div>
                </div>
            </div>
   
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span><?php echo $total ?></span></li>
                            <li>Total <span><?php echo $total_final ?></span></li>
                        </ul>
                        <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>

                </div>

            </div>
        </div>
    
    </section>
   
    <!-- Shoping Cart Section End -->


    <?php require_once "./includes/footer.php" ?>
