<?php
include('../db_con.php');
include('partials/header.php');
// Blocked Users -------------------------------------------------------
$msg = "";
if (isset($_GET['id']) && isset($_GET['block'])) {
	$sus_id = $_GET['id'];
	$query_b = "UPDATE `admin_users` SET `user_status`='block' WHERE id=" . $sus_id;

	$query_result_b = mysqli_query($con, $query_b);
}
// Unblock Users -------------------------------------------------------
$msg = "";
if (isset($_GET['id']) && isset($_GET['running'])) {
	$sus_id_update = $_GET['id'];
	$query_update = "UPDATE `admin_users` SET `user_status`='Running' WHERE id=" . $sus_id_update;

	$query_result_update = mysqli_query($con, $query_update);
	if ($query_result_update) {
		$msg = "User has been Unblocked";
	}
}


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
							<header>Manage Users</header>
						</div>
						<div class="card-body ">
							<div class="row p-b-20">
								<div class="col-md-6 col-sm-6 col-6">
									<!--   -->
								</div>

							</div>

							<table class="table table-hover table-checkable order-column full-width" id="example4">
								<thead>
									<tr>
										<th class="center">#</th>
										<th class="center d-none">id</th>
										<th class="center">Name</th>
										<th class="center">Email</th>
										<th class="center">User Category</th>
										<th class="center">Status</th>
										<th class="center">Registration Date</th>
										<!-- <th class="center">Suspended Date</th> -->
										<th class="center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									// GET User Details --------------------------------------------------------

									$query_user = "SELECT * FROM `admin_users` WHERE role!=1";
									$u_name = "";
									$u_email = "";
									$u_status = "";
									$u_added_on = "";
									$u_id = "";
									$u_profile_img = "";
									$suspended_date = "";
									$query_result_user = mysqli_query($con, $query_user);
									if ((mysqli_num_rows($query_result_user) > 0)) {
										$count = 1;
										while ($result_user = mysqli_fetch_assoc($query_result_user)) {

											$u_name = $result_user['name'];
											$u_email = $result_user['email'];
											$u_status = $result_user['user_status'];
											$u_added_on = $result_user['added_on'];
											$u_added_on = substr($u_added_on, 0, 10);
											$u_id = $result_user['id'];
											$role = $result_user['role'];
											$suspended_date = $result_user['suspended_date'];



											// For updating suspension status;
											$date1 = date_create($suspended_date);
											$date2 = date_create(date("Y-m-d", strtotime("now")));
											$diff = date_diff($date2, $date1);
											$c = $diff->format("%R%a");
											// echo $c;
											$c=(int)$c;
											if ($c<=0) {
												$update_suspended_status = "UPDATE `admin_users` SET `user_status`='Running',`suspended_date`='' WHERE id =" . $u_id;
												$res_update_suspended_status = mysqli_query($con, $update_suspended_status);
											}


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

									?>
											<tr>
												<td class="center"><?php echo  $count++; ?></td>
												<td class="center  d-none stu_id"><?php echo  $u_id; ?></td>
												<td class="center"><?php echo $u_name; ?></td>
												<td class="center"><?php echo $u_email; ?></td>
												<td class="center <?php echo $role_text_color; ?>"><?php echo $role; ?></td>

												<td class="center">
													<?php
													$action_btn_1_icon = "";
													$action_btn_1_color = "";
													$action_btn_1_title = "";
													$action_btn_1_link = "";

													$action_btn_2_icon = "";
													$action_btn_2_color = "";
													$action_btn_2_title = "";
													$action_btn_2_link = "";

													$data_target_btn_1 = "";
													$data_toggle_btn_1 = "";
													$data_target_btn_2 = "";
													$data_toggle_btn_2 = "";
													$label_color_class = "";
													// $status_btn_color_class="";
													if ($u_status == 'Running') {
														$label_color_class = "label-success";
														$action_btn_1_color = 'label-warning suspend_btn';
														$action_btn_1_icon = "fa-clock-o";
														$action_btn_1_title = "Suspend";
														$action_btn_1_link = "suspend";
														$data_target_btn_1 = "#suspend_Model";
														$data_toggle_btn_1 = "modal";

														$action_btn_2_color = 'bg-danger';
														$action_btn_2_icon = "fa-ban";
														$action_btn_2_title = "Block";
														$action_btn_2_link = "block";
													} else if ($u_status == 'suspend') {
														$label_color_class = "label-warning suspend_btn";
														$action_btn_1_color = 'label-success';
														$action_btn_1_icon = "fa-check-circle-o";
														$action_btn_1_title = "Unblock";
														$action_btn_1_link = "running";

														$action_btn_2_color = 'bg-danger';
														$action_btn_2_icon = "fa-ban";
														$action_btn_2_title = "Block";
														$action_btn_2_link = "block";
													} else if ($u_status == 'block') {
														$label_color_class = "label-danger";
														$action_btn_1_color = 'label-success';
														$action_btn_1_icon = "fa-check-circle-o";
														$action_btn_1_title = "Unblock";
														$action_btn_1_link = "running";

														$action_btn_2_color = 'label-warning suspend_btn';
														$action_btn_2_icon = "fa-clock-o";
														$action_btn_2_title = "Suspend";
														$action_btn_2_link = "suspend";
														$data_target_btn_2 = "#suspend_Model";
														$data_toggle_btn_2 = "modal";
													}
													?>
													<span class="label label-sm <?php echo $label_color_class; ?>"><?php echo $u_status; ?></span>
												</td>
												<td class="center"><?php echo $u_added_on; ?></td>
												<td class="center">
													<?php if ($suspended_date) {
													?>
														<a href="javscript:; " class="tooltips deep_purple" data-placement="top" data-original-title="Suspended Date">

															<?php echo $suspended_date; ?>
														</a>
													<?php } else { ?>
														<a href="<?php echo 'manage_user.php' . '?' . $action_btn_1_link . '=true&id=' . $u_id; ?>" data-toggle="<?php echo $data_toggle_btn_1; ?>" data-target="<?php echo $data_target_btn_1; ?>" class="btn btn-tbl-delete btn-xs <?php echo $action_btn_1_color; ?> tooltips" data-placement="top" data-original-title="<?php echo $action_btn_1_title; ?>">
															<i class="fa <?php echo $action_btn_1_icon; ?> "></i>
														</a>
														<a href="<?php echo 'manage_user.php' . '?' . $action_btn_2_link . '=true&id=' . $u_id; ?>" data-toggle="<?php echo $data_toggle_btn_2; ?>" data-target="<?php echo $data_target_btn_2; ?>" class="btn btn-tbl-delete  btn-xs <?php echo $action_btn_2_color; ?> tooltips" data-placement="top" data-original-title="<?php echo $action_btn_2_title; ?>">
															<i class="fa <?php echo $action_btn_2_icon; ?> "></i>
														</a>
													<?php } ?>


												</td>
											</tr>
									<?php	}
									} ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Suspended Form -->
	<div id="suspend_Model" class="modal fade" role="dialog">

		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Suspend User Account</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
						<div class="form-group">
							<input type="hidden" class="modal_sus_u_id" name="sus_user_id">
							<label for="sus">Select Date of Suspension:</label>
							<input type="date" required class="form-control" id="suspend_date" name="sus_date">
						</div>

						<button type="submit" class="btn btn-warning" name="suspend_btn" id="suspend_form_btn">Suspend</button>
					</form>
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