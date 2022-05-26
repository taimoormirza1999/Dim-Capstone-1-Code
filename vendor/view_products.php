<?php
// session_start();

include('../db_con.php');
include('partials/header.php');
?>
<!-- start page container -->
<div class="page-container">
	<?php
	include('partials/sidebar.php');
	$user_id=$_SESSION['vendor_user_id'];
	?>

	<!-- start page content -->
	<div class="page-content-wrapper">
		<div class="page-content">

			<div class="row">
				<div class="col-sm-12">
					<div class="card-box">
						<div class="card-head">
							<header>Product Information</header>
						</div>
						<div class="card-body ">
							<div class="row p-b-20">
								<div class="col-md-6 col-sm-6 col-6">
									<!-- <div class="btn-group">
										<button id="addRow1" class="btn btn-info">
											Add New <i class="fa fa-plus"></i>
										</button>
									</div> -->
								</div>
								<div class="col-md-6 col-sm-6 col-6">
									<div class="btn-group pull-right">
										<button class="btn deepPink-bgcolor  btn-outline dropdown-toggle" data-toggle="dropdown">Export
											<i class="fa fa-angle-down"></i>
										</button>
										<ul class="dropdown-menu pull-right">

											<li>
												<a href="javascript:;" class="save_pdf">
													<i class="fa fa-file-pdf-o"></i> Save as PDF </a>
											</li>
											<li>
												<a href="javascript:;" class="save_csv">
													<i class="fa fa-file-excel-o"></i> Export to Excel </a>
											</li>
										</ul>
									</div>
								</div>
							</div>

							<section class="pdf" id="to_pdf">
								<table class="table table-hover table-checkable order-column full-width " id="example4">
									<thead>
										<tr>
											<th class="center ">No</th>
											<th class="center">Name</th>
											<th class="center">Price</th>
											<th class="center">Product Category</th>
											<th class="center">Added On</th>
											<th class="center">Product Picture</th>
											<th class="center">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$query_user = "";
										if (isset($_GET['search']) && $_GET['search'] == 'buyer') {
											// echo"<script>alert('filter_buyer')</script>";
											$query_user = "SELECT * FROM `admin_users` where role!=1 And role=0 ";
										} else if (isset($_GET['search']) && $_GET['search'] == 'designer') {
											// echo"<script>alert('filter_buyer')</script>";
											$query_user = "SELECT * FROM `admin_users` where role!=1 And role=2 ";
										} else if (isset($_GET['search']) && $_GET['search'] == 'vendor') {
											// echo"<script>alert('filter_buyer')</script>";
											$query_user = "SELECT * FROM `admin_users` where role!=1 And role=3 ";
										} else {
											// GET User Details --------------------------------------------------------
											$query_user = "SELECT * FROM `products` WHERE user_id=".$user_id ;
										}
										$u_name = "";
										$u_email = "";
										$u_status = "";
										$u_added_on = "";
										$u_id = "";
										$u_profile_img = "";
										$query_result_user = mysqli_query($con, $query_user);
										if ((mysqli_num_rows($query_result_user) > 0)) {
											$count = 1;
											while ($result_user = mysqli_fetch_assoc($query_result_user)) {

												$u_name = $result_user['pName'];
												$dCatagory = $result_user['product_category'];
												$dPrice = $result_user['pPrice'];
												$description = $result_user['pDescription'];
												$dPic = $result_user['pPic'];
												$u_id = $result_user['id'];
												$u_added_on = $result_user['added_on'];
												
										?>
												<tr>
													<td class="center"><?php echo $count++; ?></td>
													<td class="center"><?php echo $u_name; ?></td>
													<td class="center">$<?php echo $dPrice; ?></td>
													<td class="center m_bolder text-capitalize "><?php echo $dCatagory; ?></td>
													<td class="center"><?php echo $u_added_on; ?></td>
													<td class="center">
														<div class="sidebar-userpic">
															<img class="shadow-lg"style="height:70px" src="../General_Assets/assets/img/Products/<?php echo $dPic; ?>" class="img-responsive img fluid" alt="">
														</div>
														<?php


														?>

													</td>
													<td class="center">
													<a href="edit_product.php?id=<?php echo $u_id;?>" class="btn btn-tbl-edit btn-xs">
														Edit
													</a>
													<a href="delete_product.php?id=<?php echo $u_id;?>" class="btn btn-tbl-delete btn-xs">
														Delete
													</a>
													
												</td>
												</tr>
										<?php	}
										} ?>
									</tbody>
								</table>
							</section>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end page content -->
	<!-- start chat sidebar -->

	<!-- end chat sidebar -->
</div>
<!-- end page container -->
<?php
include('partials/footer.php');
?>