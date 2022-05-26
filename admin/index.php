<?php
include('partials/header.php');
include('../db_con.php');
include('../functions.php');

?>

<!-- start page container -->
<div class="page-container">
<?php
include('partials/sidebar.php');
?>

	<!-- start page content -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- <div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Support</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#">Apps</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Support</li>
							</ol>
						</div>
					</div> -->
			<div class="row">
				<div class="col-sm-12">
					<div class="card-box">
						<div class="card-head">
							<header>Dashboard</header>
							<!-- ------------------------------------>
							<!-- <button type="button"
														class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-primary"
														data-type="prompt">CLICK ME</button> -->
							<!-- ------------------------------------>
						</div>
						<div class="card-body ">
							<div class="state-overview">
								<div class="row">
									<div class="col-6  shadow-lg">
										<a href="view_users.php" class="text-light">
											<div class="overview-panel admin_primary">
												<div class="symbol">
												<i class="fa md-24 material-icons mx-auto">group</i>
												</div>
												<?php
												// GET User Details --------------------------------------------------------

												$query_user = "SELECT count(*) FROM `users` ";
												$query_result_user = mysqli_query($con, $query_user);
												$count_user = mysqli_num_rows($query_result_user);
												$row = mysqli_fetch_assoc($query_result_user);
												$count_user = $row["count(*)"];
												// echo "<script>alert(".$count_user.")</script>"
												?>
												<div class="value white">
													<p class="sbold addr-font-h1" data-counter="counterup" data-value="<?php $total_user=get__total_register_users($con);
													$total_user=$total_user-1;
													echo $total_user; ?>">0</p>
													<p>View Register Users</p>
												</div>
											</div>
										</a>
									</div>
									<div class="col-6  shadow-lg">
										<a href="view_users.php" class="text-light">
											<div class="overview-panel deep_green">
												<div class="symbol">
												<i class="fa md-24 material-icons">receipt</i>
												</div>
												<div class="value white">
													<p class="sbold addr-font-h1" >$500</p>
													<p>View Revenue Report</p>
												</div>
											</div>
										</a>
									</div>
									<div class="col-6  shadow-lg">
										<a href="manage_user.php" class="text-light">
											<div class="overview-panel admin_primary">
												<div class="symbol">
												<i class="fa md-24 material-icons"> track_changes</i>
												</div>
												<div class="value white">
													<p class="sbold addr-font-h1" data-counter="counterup" data-value="<?php  
													$total_user=get__total_register_users($con);
													$total_user=$total_user-1;
													echo $total_user;
													 ?>">0</p>
													<p>Manage Users</p>
												</div>
											</div>
										</a>
									</div>
									<div class="col-6  shadow-lg">
										<a href="order_disputes.php" class="text-light">
											<div class="overview-panel deep_green">
												<div class="symbol">
												<i class="md-24 material-icons fa">aspect_ratio</i>
												</div>
												<div class="value white">
													<p class="sbold addr-font-h1" data-counter="counterup" data-value="9">0</p>
													<p>Manage Order Dispute</p>
												</div>
											</div>
										</a>
									</div>
									<div class="col-6  shadow-lg">
										<a href="monitor_orders.php" class="text-light">
											<div class="overview-panel admin_primary">
												<div class="symbol">
												<i class="md-24 material-icons  fa">card_giftcard</i>
												</div>
												<div class="value white">
													<p class="sbold addr-font-h1" data-counter="counterup" data-value="8">0</p>
													<p>Monitor Orders</p>
												</div>
											</div>
										</a>
									</div>
									<div class="col-6  shadow-lg">
										<a href="payments.php" class="text-light">
											<div class="overview-panel deep_green">
												<div class="symbol">
													<i class="fa fa fa-money"></i>
												</div>
												<div class="value white">
													<p class="sbold addr-font-h1" data-counter="counterup" data-value="34">0</p>
													<p>Manage Payments</p>
												</div>
											</div>
										</a>
									</div>
								</div>
							</div>


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end page content -->

	<!-- end chat sidebar -->
</div>
<!-- end page container -->
<?php
include('partials/footer.php');
?>