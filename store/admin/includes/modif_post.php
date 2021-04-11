<table class="table table-stripped">
                        <tr>
                            <td>ID</td>
                            <td>Author</td>
                            <td>Title</td>
                            <td>Category</td>
                            <td>Status</td>
                            <td>Img</td>
                            <td>Content</td>
                            <td>Date</td>
                            <td>Modifier</td>
                            <td>Archiver</td>
                        </tr>
                        <tr>
                         <?php 
                              $query = "select * from posts where post_status = 'published'";
                              $result = mysqli_query($conn,$query);

                              while($row=mysqli_fetch_assoc($result))
                              {
                                  $cat_id = $row['post_cat_id'];

                                  ?>
                          


                            <td><?php echo $row['post_id'] ;?></td>
                            <td><?php echo $row['post_author'] ;?></td>
                            <td><?php echo $row['post_title'] ;?></td>

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




                           
                            <td><?php echo $row['post_status'] ;?></td>
                            <td><img width="50" height="50" class="img-resposive" src="../img/blog/<?php echo $row['post_img'] ;?>" ></td>
                            <td><?php echo $row['post_content'] ;?></td>
                            <td><?php echo $row['post_date'] ;?></td>
                            <td><a href="posts.php?opt=edit_post&edit=<?php echo $row['post_id']; ?>" class="btn btn-success"><span class="fa fa-edit"></span></a></td>
                            <td><a href="posts.php?opt=modif_post&archived=<?php echo $row['post_id'] ?>" class="btn btn-success"><span class="fa fa-archive"></span></a></td>
                        </tr>
                        <?php
                              }

                         ?>

                    </table>

                    <?php 
                    //supprimer le post
                        if(isset($_GET['del']))
                        {
                            $Del_ID = $_GET['del'];
                            $sql = "delete from posts where post_id = '$Del_ID' ";
                            $result = mysqli_query($conn, $sql);
                            if($result)
                            {
                                unlink("../img/$old");
                                header("location: posts.php");
                            }
  
                        }

                        //archiver le post
                        if(isset($_GET['archived']))
                        {
                            $Arc_ID = $_GET['archived'];
                            $sql = "update posts set post_status = 'archived' where post_id = '$Arc_ID' ";
                            $result = mysqli_query($conn, $sql);
                            if($result)
                            {
                                // unlink("../img/$old");
                                // header("location: posts.php");
                            }
  
                        }
                    ?>