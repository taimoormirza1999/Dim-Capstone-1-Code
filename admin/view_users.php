<?php
include('../db_con.php');
include('partials/header.php');
?>
<!-- start page container -->
<div class="page-container">
	<?php
	include('partials/sidebar.php');
	?>

	<!-- start page content -->
	<div class="page-content-wrapper">
		<div class="page-content">

			<div class="row">
				<div class="col-sm-12">
					<div class="card-box">
						<div class="card-head">
							<header>Register Users</header>
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
											<th class="center">Email</th>
											<th class="center">User Category</th>
											<th class="center">Register On</th>
											<th class="center">Status</th>
											<th class="center">Profile</th>
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
											$query_user = "SELECT * FROM `admin_users` where role!=1 ";
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

												$u_name = $result_user['name'];
												$u_email = $result_user['email'];
												$u_status = $result_user['user_status'];
												$u_profile_img = $result_user['profile_img'];
												$u_id = $result_user['id'];
												$u_added_on = $result_user['added_on'];
												$u_added_on =substr($u_added_on,0,10);
												$role = $result_user['role'];
												$role_text_color = "";
												if ($role == 2) {
													$role = "Designer";
													$role_text_color = "deep_blue_c";
												} else if ($role == 3) {
													$role = "Vendor";
													$role_text_color = "deep_light_blue";
												} else if ($role == 0) {
													$role = "Buyer";
													$role_text_color = "deep_purple";
												}
												if ($u_status == 'Running') {
													$u_status = "RUNNING";
													$u_status_text_color = "deep_light_green";
												} else if ($u_status == 'suspend') {
													$u_status = "SUSPEND";
													$u_status_text_color = "deep_yellow";
												}
												 else if ($u_status == 'block') {
													$u_status = "BLOCK";
													$u_status_text_color = "deep_red";
												}
										?>
												<tr>
													<td class="center"><?php echo $count++; ?></td>
													<td class="center"><?php echo $u_name; ?></td>
													<td class="center"><?php echo $u_email; ?></td>
													<td class="center m_bolder <?php echo $role_text_color; ?>"><?php echo $role; ?></td>
													<td class="center"><?php echo $u_added_on; ?></td>
													<td class="center m_bolder <?php echo $u_status_text_color; ?> "><?php echo $u_status; ?></td>
													<td class="center">
														<div class="sidebar-userpic">
															<img class="shadow-lg" src="../General_Assets/assets/img/<?php echo $u_profile_img; ?>" class="img-responsive" alt="">
														</div>
														<?php


														?>

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
<script>
	
	

</script>