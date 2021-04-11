<?php require_once('./includes/header.php');?>
<?php
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=mysqli_query($conn,$_GET['type']);
	if($type=='status'){
		$operation=mysqli_query($con,$_GET['operation']);
		$id=mysqli_query($conn,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update coupon set status='$status' where id='$id'";
		mysqli_query($conn,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=mysqli_query($con,$_GET['id']);
		$delete_sql="delete from coupon where id='$id'";
		mysqli_query($conn,$delete_sql);
	}
}



?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">

				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th width="2%">ID</th>
							   <th width="20%">Coupon Code</th>
							   <th width="20%">Coupon Value</th>
							   <th width="20%">Coupon Type</th>
							   <th width="10%">Min Value</th>
							   <th width="26%"></th>
							</tr>
						 </thead>
						 <tbody>
                            <?php 
                            $sql="select * from coupon order by id desc";
                            $res=mysqli_query($conn,$sql);
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td class="serial"><?php echo $i?></td>
							   <td><?php echo $row['id']?></td>
							   <td><?php echo $row['coupon_code']?></td>
							   <td><?php echo $row['coupon_value']?></td>
							   <td><?php echo $row['coupon_type']?></td>
							   <td><?php echo $row['cart_min_value']?></td>
							  
							   <td>
								<?php
								if($row['status']==1){
									echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
								}
								echo "<span class='badge badge-edit'><a href='manage_coupon_master.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
								
								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
								
								?>
							   </td>
							</tr>
							<?php } ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>

      <?php require_once('./includes/footer.php'); ?>