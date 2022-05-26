
<!-- start sidebar menu -->

<div class="sidebar-container shadow">
    <div class="sidemenu-container navbar-collapse collapse fixed-menu">
        <div id="remove-scroll">
            <ul class="sidemenu page-header-fixed p-t-20" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                </li>
                <li class="sidebar-user-panel ">
                    <div class="user-panel">
                        <div class="row">
                            <div class="sidebar-userpic">
                                <a href="profile.php">
                                    <img src="../General_Assets/assets/img/<?php echo $_SESSION['designer_profile_img']; ?>" class="img-responsive" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="profile-usertitle">
                            <div class="sidebar-userpic-name"> <?php
                                                                echo $_SESSION['designer_user_name'];
                                                                // echo $username;
                                                                ?> </div>
                            <div class="profile-usertitle-job"> Designer </div>
                        </div>
                        <div class="sidebar-userpic-btn">
                            <a class="tooltips" href="profile.php" data-placement="top" data-original-title="Profile">
                                <i class="material-icons">person_outline</i>
                            </a>
                            <a class="tooltips" href="email_inbox.php" data-placement="top" data-original-title="Feedback">
                                <i class="material-icons">mail_outline</i>
                            </a>

                            <a class="tooltips" href="logout.php" data-placement="top" data-original-title="Logout">
                                <i class="material-icons">input</i>
                            </a>
                        </div>
                    </div>
                </li>
                <!-- <li class="menu-heading">
								<span>-- Main</span>
							</li> -->
                <li class="nav-item  shadow start ">
                    <a href="index.php" class="nav-link nav-toggle">
                        <i class="fas fa-home"></i>
                        <span class="title">Dashboard</span>
                        <!-- <span class="arrow"></span> -->
                    </a>
                </li>

                <li class="nav-item  shadow">
                    <a href="profile.php" class="nav-link nav-toggle">
                    <i class="fas fa-user"></i>
                        <span class="title">Profile</span>
                        <!-- <span class="arrow"></span> -->
                    </a>
                </li>
                <li class="nav-item  shadow">
                    <a href="add_design.php" class="nav-link nav-toggle">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                        <span class="title">Add Designs</span>
                        <!-- <span class="arrow"></span> -->
                    </a>
                </li>
                <li class="nav-item  shadow">
                    <a href="view_designs.php" class="nav-link nav-toggle">
                    <i class="fas fa-project-diagram"></i>
                        <span class="title">Listed Designs</span>
                        <!-- <span class="arrow"></span> -->
                    </a>
                </li>
                <li class="nav-item  shadow">
                    <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fas fa-blog"></i>
                        <span class="title">Hire Request</span>
                        <!-- <span class="arrow"></span> -->
                    </a>
                </li>
                <li class="nav-item  shadow">
                    <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fas fa-address-book"></i>
                        <span class="title">Contact</span>
                        <!-- <span class="arrow"></span> -->
                    </a>
                </li>
                <li class="nav-item  shadow">
                    <a href="logout.php" class="nav-link nav-toggle">

                    <i class="fas fa-sign-out-alt"></i>
                        <span class="title">logout</span>
                        <!-- <span class="arrow"></span> -->
                    </a>
                </li>




            </ul>
        </div>
    </div>
</div>
<!-- end sidebar menu -->
