<?php
session_start();

if(isset($_SESSION['vendor_login']) && $_SESSION['vendor_login'] =='loged_in'){
	
	$username=$_SESSION['vendor_user_name'];
	$userid=$_SESSION['vendor_user_name'];
}
else{
	header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
	
	<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	<meta name="author" content="SmartUniversity" />
	<title>DIM-Admin</title>
	<!-- icons -->
	<link href="../General_Assets/assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<link href="../General_Assets/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<!--bootstrap -->
	<link href="../General_Assets/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- data tables -->
	<link href="../General_Assets/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet"
		type="text/css" />
	<!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="../General_Assets/assets/plugins/material/material.min.css">
	<link rel="stylesheet" href="../General_Assets/assets/css/material_style.css">
	<!-- animation -->
	<link href="../General_Assets/assets/css/pages/animate_page.css" rel="stylesheet">
	<!-- C:\wamp64\www\dim\General_Assets\
	General_Assets -->
	<!-- Template Styles -->
	<link href="../General_Assets/assets/css/style.css" rel="stylesheet" type="text/css" />
	<link href="../General_Assets/assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
	<link href="../General_Assets/assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="../General_Assets/assets/css/theme-color.css" rel="stylesheet" type="text/css" />
	<!-- favicon -->
	<link rel="shortcut icon" href="../favicon.ico" />

	<style>

.dark-sidebar-color .sidemenu-container,.logo-dark .page-header.navbar .page-logo,.dark-sidebar-color .page-container,.vendor_primary{
	background-color: #15142a;
}


		/* Util Color ----------------------------------------------*/
		.deep_blue_c{
			color: rgba(9, 56, 86, 0.84);
		}
		.deep_light_black{
			color: #bac3d0;
		}
		.deep_light_green{
			color: #36c6d3;
		}
		.deep_light_blue{
			color: #659be0;
		}
		.deep_orange{
			color: #f15317;
		}
		.deep_red{
			color: #ed6b75;
		}
		.deep_purple{
			color: #9675ce;
		}
		.deep_yellow{
			color: #F1C40F;
		}
		/* background Color ----------------------------------------------*/
		.deep_blue{
			background: rgba(9, 56, 86, 0.84);
		}
		.deep_green{
			background: rgba(14, 72, 77, 1);
		}
		.deep_dark{
			background-color: #3a3f51;
		}
		.medium_b_raius{
			border-radius:10px;
		}
		.input_b_raius{
			border-radius:20px;
		}
		.b_bolder{
			font-weight: 800;
		}
		.m_bolder{
			font-weight: 600;
		}
		.s_bolder{
			font-weight: 400;
		}
		.desktop_mode{
	display:block;
	}
@media(max-width:700px){
	.desktop_mode{
	display:none;
	transition:1s;
	}
}
	</style>
</head>
<!-- END HEAD -->

<body
	class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
	<div class="page-wrapper">
		<!-- start header -->
		<div class="page-header navbar navbar-fixed-top">
			<div class="page-header-inner ">
				<!-- logo start -->
				<div class="page-logo">
					<a href="../index.php">
						<img class="desktop_mode " src="logo.png" style="height:50px; width:70px">
						<!-- <span class="logo-default deep_green">DIM</span>  -->
					</a>
				</div>
				<!-- logo end -->
				<ul class="nav navbar-nav navbar-left in">
					<li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
				</ul>
				<!-- <form class="search-form-opened" action="#" method="GET">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search..." name="query">
						<span class="input-group-btn search-btn">
							<a href="javascript:;" class="btn submit">
								<i class="icon-magnifier"></i>
							</a>
						</span>
					</div>
				</form> -->
				<!-- start mobile menu -->
				<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
					data-target=".navbar-collapse">
					<span></span>
				</a>
				<!-- end mobile menu -->
				<!-- start header menu -->
				<div class="top-menu">
					
					<ul class="nav navbar-nav pull-right">
					
							<!-- <li class="list-group-item disabled" aria-disabled="true">Disabled item</li> -->
					
						<!-- start notification dropdown -->
						<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
						
							<!-- <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdowno" data-hover="dropdown"
								data-close-others="true">
								<i class="fa fa-bell-o"></i>
								<span class="badge headerBadgeColor1"> 0 </span>
							</a> -->
							<ul class="dropdown-menu animated swing">
								<li class="external">
									<h3><span class="bold">Notifications</span></h3>
									<span class="notification-label purple-bgcolor">New 6</span>
								</li>
								<li>
									<ul class="dropdown-menu-list small-slimscroll-style" data-handle-color="#637283">
										<li>
											<a href="javascript:;">
												<span class="time">just now</span>
												<span class="details">
													<span class="notification-icon circle deepPink-bgcolor"><i
															class="fa fa-check"></i></span> Congratulations!. </span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
												<span class="time">3 mins</span>
												<span class="details">
													<span class="notification-icon circle purple-bgcolor"><i
															class="fa fa-user o"></i></span>
													<b>John Micle </b>is now following you. </span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
												<span class="time">7 mins</span>
												<span class="details">
													<span class="notification-icon circle blue-bgcolor"><i
															class="fa fa-comments-o"></i></span>
													<b>Sneha Jogi </b>sent you a message. </span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
												<span class="time">12 mins</span>
												<span class="details">
													<span class="notification-icon circle pink"><i
															class="fa fa-heart"></i></span>
													<b>Ravi Patel </b>like your photo. </span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
												<span class="time">15 mins</span>
												<span class="details">
													<span class="notification-icon circle yellow"><i
															class="fa fa-warning"></i></span> Warning! </span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
												<span class="time">10 hrs</span>
												<span class="details">
													<span class="notification-icon circle red"><i
															class="fa fa-times"></i></span> Application error. </span>
											</a>
										</li>
									</ul>
									<div class="dropdown-menu-footer">
										<a href="javascript:void(0)"> All notifications </a>
									</div>
								</li>
							</ul>
						</li>
						<!-- end notification dropdown -->
						<!-- start message dropdown -->
						<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
							<!-- <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown2" data-hover="dropdown"
								data-close-others="true">
								<i class="fa fa-envelope-o"></i>
								<span class="badge headerBadgeColor2"> 0 </span>
							</a> -->
							<ul class="dropdown-menu animated slideInDown">
								<li class="external">
									<h3><span class="bold">Messages</span></h3>
									<span class="notification-label cyan-bgcolor">New 2</span>
								</li>
								<li>
									<ul class="dropdown-menu-list small-slimscroll-style" data-handle-color="#637283">
										<li>
											<a href="#">
												<span class="photo">
													<img src="../General_Assets/assets/img/user/user2.jpg" class="img-circle" alt="">
												</span>
												<span class="subject">
													<span class="from"> Sarah Smith </span>
													<span class="time">Just Now </span>
												</span>
												<span class="message"> Jatin I found you on LinkedIn... </span>
											</a>
										</li>
										<li>
											<a href="#">
												<span class="photo">
													<img src="../General_Assets/assets/img/user/user3.jpg" class="img-circle" alt="">
												</span>
												<span class="subject">
													<span class="from"> John Deo </span>
													<span class="time">16 mins </span>
												</span>
												<span class="message"> Fwd: Important Notice Regarding Your Domain
													Name... </span>
											</a>
										</li>
										<li>
											<a href="#">
												<span class="photo">
													<img src="../General_Assets/assets/img/user/user1.jpg" class="img-circle" alt="">
												</span>
												<span class="subject">
													<span class="from"> Rajesh </span>
													<span class="time">2 hrs </span>
												</span>
												<span class="message"> pls take a print of attachments. </span>
											</a>
										</li>
										<li>
											<a href="#">
												<span class="photo">
													<img src="../General_Assets/assets/img/user/user8.jpg" class="img-circle" alt="">
												</span>
												<span class="subject">
													<span class="from"> Lina Smith </span>
													<span class="time">40 mins </span>
												</span>
												<span class="message"> Apply for Ortho Surgeon </span>
											</a>
										</li>
										<li>
											<a href="#">
												<span class="photo">
													<img src="../General_Assets/assets/img/user/user5.jpg" class="img-circle" alt="">
												</span>
												<span class="subject">
													<span class="from"> Jacob Ryan </span>
													<span class="time">46 mins </span>
												</span>
												<span class="message"> Request for leave application. </span>
											</a>
										</li>
									</ul>
									<div class="dropdown-menu-footer">
										<a href="#"> All Messages </a>
									</div>
								</li>
							</ul>
						</li>
						<!-- end message dropdown -->
						<!-- start manage user dropdown -->
						<li class="dropdown dropdown-user">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
							data-close-others="true">
						
							<img alt="" class="img-circle " src="../General_Assets/assets/img/<?php echo $_SESSION['vendor_profile_img'];?>" />
								<span class="username username-hide-on-mobile m_bolder">Balance $99 </span>
								<i class="fa fa-angle-down"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-default animated jello">
								<li>
									<a href="profile.php">
										<i class="icon-user"></i> Profile </a>
								</li>
								
								<li class="divider"> </li>
								
								<li>
									<a href="logout.php">
										<i class="icon-logout"></i> Log Out </a>
								</li>
							</ul>
						</li>
						
					</ul>
				</div>
			</div>
		</div>
		<!-- end header -->