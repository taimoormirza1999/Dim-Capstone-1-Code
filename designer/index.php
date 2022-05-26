<?php
include('partials/header.php');
include('../db_con.php');
?>
<!-- start page container -->
<div class="page-container">
	<?php
	include('partials/sidebar.php');
	include('../functions.php');
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
										<a href="view_designs.php" class="text-light">
											<div class="overview-panel designer_primary">
												<div class="symbol">
													<i class="material-icons">groups</i>
												</div>
												<?php
												$user_id = $_SESSION['designer_user_id'];

												?>
												<div class="value white">
													<p class="sbold addr-font-h1" data-counter="counterup" data-value="<?php echo get__total_designs($con, $user_id); ?>">0</p>
													<p>Listed Designs</p>
												</div>
											</div>
										</a>
									</div>
									<div class="col-6  shadow-lg">
										<a href="javascript:;" class="text-light">
											<div class="overview-panel deep_green">
												<div class="symbol">
													<i class="fa fa-reply"></i>
												</div>
												<div class="value white">
													<p class="sbold addr-font-h1" >$99</p>
													<p>Earning Report</p>
												</div>
											</div>
										</a>
									</div>
									<div class="col-6  shadow-lg">
										<a href="javascript:;" class="text-light">
											<div class="overview-panel designer_primary">
												<div class="symbol">
													<i class="fa fa-handshake-o"></i>
												</div>
												<div class="value white">
													<p class="sbold addr-font-h1" data-counter="counterup" data-value="<?php echo "10"; ?>">0</p>
													<p>Monitor Orders</p>
												</div>
											</div>
										</a>
									</div>
									<div class="col-6  shadow-lg">
										<a href="javascript:;" class="text-light">
											<div class="overview-panel deep_green">
												<div class="symbol">
													<i class="fa fa-reply"></i>
												</div>
												<div class="value white">
													<p class="sbold addr-font-h1" data-counter="counterup" data-value="15">0</p>
													<p>Hire Request</p>
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