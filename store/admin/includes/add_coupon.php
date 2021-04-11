


<?php require_once('./includes/header.php'); ?>
<!-- Navigation -->




<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">

                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							   
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Coupon Code</label>
									<input type="text" name="coupon_code" placeholder="Enter coupon code" class="form-control" required value="<?php echo $coupon_code?>">
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Coupon Value</label>
									<input type="text" name="coupon_value" placeholder="Enter coupon value" class="form-control" required value="<?php echo $coupon_value?>">
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Coupon Type</label>
									<select class="form-control" name="coupon_type" required>
										<option value=''>Select</option>
										<?php
										if($coupon_type=='Percentage'){
											echo '<option value="Percentage" selected>Percentage</option>
												<option value="Rupee">Rupee</option>';
										}elseif($coupon_type=='Rupee'){
											echo '<option value="Percentage">Percentage</option>
												<option value="Rupee" selected>Rupee</option>';
										}else{
											echo '<option value="Percentage">Percentage</option>
												<option value="Rupee">Rupee</option>';
										}
										?>
									</select>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Cart Min Value</label>
									<input type="text" name="cart_min_value" placeholder="Enter cart min value" class="form-control" required value="<?php echo $cart_min_value?>">
								</div>
								
								
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <?php require_once('./includes/footer.php'); ?>