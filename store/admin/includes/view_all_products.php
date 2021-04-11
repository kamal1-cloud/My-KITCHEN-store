<table class="table table-stripped">
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Price</td>
                            <td>Category</td>
                            <td>Quantité</td>
                            <td>Img</td>
                            <td>Description</td>
                            <td>Date</td>
                        </tr>
                        <tr>
                         <?php 
                              $query = "select * from product";
                              $result = mysqli_query($conn,$query);

                              while($row=mysqli_fetch_assoc($result))
                              {
                                  $cat_id = $row['prd_cat_id'];

                                  ?>
                          


                            <td><?php echo $row['prd_id'] ;?></td>
                            <td><?php echo $row['prd_name'] ;?></td>
                            <td><?php echo $row['prd_price'] ;?></td>

                               <?php
                                  $query = "select * from categories where cat_id = '$cat_id'";
                                  $data= mysqli_query($conn,$query);

                                  while($value = mysqli_fetch_assoc($data))
                                  {
                                      ?>
                                          <td><?php echo $value['cat_title'] ;?></td>

                                    <?php
                                  }
                               ?>




                           
                            <td><?php echo $row['prd_quantity'] ;?></td>
                            <td><img width="50" height="50" class="img-resposive" src="../img/featured/<?php echo $row['prd_image'] ;?>" ></td>
                            <td><?php echo $row['prd_description'] ;?></td>
                            <td><?php echo $row['reg_date'] ;?></td>

                        </tr>
                        <?php
                              }

                         ?>

                    </table>
