<div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <?php
				$sql = "SELECT * FROM categories where cat_status= 'unarchived'";
				$result = mysqli_query($conn, $sql);

				while ($row = mysqli_fetch_assoc($result)) {
					$cat_id = $row['cat_id'];

					$cat_title = $row['cat_title'];
                  ?>
                        <ul>
                         
                            <li>
							  <a href='category.php?category=<?php echo$cat_id; ?>'><?php echo $cat_title ?></a>
							</li> 
                            		
					
                        </ul>
                        <?php
						}
                 ?>
						
                    </div>
                </div>


                
			

			
			       
						
					 
							  