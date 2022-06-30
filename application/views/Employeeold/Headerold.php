<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Audit Quality</title>

	<!-- Template CSS -->
	<link rel="stylesheet" href="<?php echo base_url() . "/includes/ext/"; ?>assets/css/style-starter.css">

	<!-- google fonts -->
	<link href="//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">


</head>

<body class="sidebar-menu-collapsed">
	<div class="se-pre-con"></div>
	<section>
		<!-- sidebar menu start -->
		<div class="sidebar-menu sticky-sidebar-menu">

			<!-- logo start -->
			<div class="logo">
				<h1><a href="index.html">Collective</a></h1>
			</div>

			<!-- if logo is image enable this -->
			<!-- image logo --
												<div class="logo">
												<a href="index.html">
													<img src="image-path" alt="Your logo" title="Your logo" class="img-fluid" style="height:35px;" />
												</a>
												</div>
												<!-- //image logo -->

			<div class="logo-icon text-center">
				<a href="<?php echo base_url() ?>/" title="logo"><img src="<?php echo base_url() . "/includes/ext/"; ?>assets/images/logo.png" alt="logo-icon"> </a>
			</div>
			<!-- //logo end -->

			<div class="sidebar-menu-inner">

				<!-- sidebar nav start -->
				<ul class="nav nav-pills nav-stacked custom-nav">
					<li class="active"><a href="<?php echo site_url('Employee/Chapters') ?>"><i class='fas fa-book' style='font-size:24px'></i><span> Chapters</span></a>
					</li>
					<!--li class="menu-list">
						<a href="#"><i class="fa fa-cogs"></i>
							<span>Questions <i class="lnr lnr-chevron-right"></i></span></a>
						<ul class="sub-menu-list">
            <li><a href="carousels.html">Carousels</a> </li>
            <li><a href="cards.html">Default cards</a> </li>
            <li><a href="people.html">People cards</a></li>
          </ul>
					</li-->
					<li class="active"><a href="<?php echo site_url('Employee/Subjects') ?>"><i style='font-size:24px' class='far'>&#xf02e;</i><span> Subjects</span></a>
					</li>
					<li><a href="<?php echo site_url('Employee/Questions') ?>"><i style='font-size:24px' class='fas'>&#xf059;</i> <span>Questions</span></a></li>
					<li><a href="<?php echo site_url('Employee/Responses') ?>"><i style='font-size:24px' class='far'>&#xf4ad;</i><span>Responses</span></a></li>
					<li><a href="<?php echo site_url('Employee/Department') ?>"><i style='font-size:24px' class='far'>&#xf1ad;</i><span>Departments</span></a></li>
					<li><a href="<?php echo site_url('Employee/Year') ?>"><i style='font-size:24px' class='far'>&#xf073;</i> <span>Audit Year</span></a></li>

					<!--li><a href="blocks.html"><i class="fa fa-th"></i> <span>Content blocks</span></a></li>
        			<li><a href="forms.html"><i class="fa fa-file-text"></i> <span>Forms</span></a></li-->
				</ul>
				<!-- //sidebar nav end -->
				<!-- toggle button start -->
				<a class="toggle-btn">
					<i class="fa fa-angle-double-left menu-collapsed__left"><span>Collapse Sidebar</span></i>
					<i class="fa fa-angle-double-right menu-collapsed__right"></i>
				</a>
				<!-- //toggle button end -->
			</div>
		</div>
		<!-- //sidebar menu end -->
		<!-- header-starts -->
		<div class="header sticky-header">

			<!-- notification menu start -->
			<div class="menu-right">
				<div class="navbar user-panel-top">
					<div class="search-box">
						<a href="<?php echo site_url('LoginAccount/Logout') ?>">
							<button type="submit" class="btn btn-primary btn-style">Logout</button>
						</a>
					</div>
					<div class="user-dropdown-details d-flex">
						<div class="profile_details_left">
							<ul class="nofitications-dropdown">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell-o"></i><span class="badge blue">3</span></a>
									<ul class="dropdown-menu">
										<li>
											<div class="notification_header">
												<h3>You have 3 new notifications</h3>
											</div>
										</li>
										<li><a href="#" class="grid">
												<div class="user_img"><img src="<?php echo base_url() . "/includes/ext/"; ?>assets/images/avatar1.jpg" alt=""></div>
												<div class="notification_desc">
													<p>Johnson purchased template</p>
													<span>Just Now</span>
												</div>
											</a></li>
										<li class="odd"><a href="#" class="grid">
												<div class="user_img"><img src="<?php echo base_url() . "/includes/ext/"; ?>assets/images/avatar2.jpg" alt=""></div>
												<div class="notification_desc">
													<p>New customer registered </p>
													<span>1 hour ago</span>
												</div>
											</a></li>
										<li><a href="#" class="grid">
												<div class="user_img"><img src="<?php echo base_url() . "/includes/ext/"; ?>assets/images/avatar3.jpg" alt=""></div>
												<div class="notification_desc">
													<p>Lorem ipsum dolor sit amet </p>
													<span>2 hours ago</span>
												</div>
											</a></li>
										<li>
											<div class="notification_bottom">
												<a href="#all" class="bg-primary">See all notifications</a>
											</div>
										</li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-comment-o"></i><span class="badge blue">4</span></a>
									<ul class="dropdown-menu">
										<li>
											<div class="notification_header">
												<h3>You have 4 new messages</h3>
											</div>
										</li>
										<li><a href="#" class="grid">
												<div class="user_img"><img src="<?php echo base_url() . "/includes/ext/"; ?>assets/images/avatar1.jpg" alt=""></div>
												<div class="notification_desc">
													<p>Johnson purchased template</p>
													<span>Just Now</span>
												</div>
											</a></li>
										<li class="odd"><a href="#" class="grid">
												<div class="user_img"><img src="<?php echo base_url() . "/includes/ext/"; ?>assets/images/avatar2.jpg" alt=""></div>
												<div class="notification_desc">
													<p>New customer registered </p>
													<span>1 hour ago</span>
												</div>
											</a></li>
										<li><a href="#" class="grid">
												<div class="user_img"><img src="<?php echo base_url() . "/includes/ext/"; ?>assets/images/avatar3.jpg" alt=""></div>
												<div class="notification_desc">
													<p>Lorem ipsum dolor sit amet </p>
													<span>2 hours ago</span>
												</div>
											</a></li>
										<li><a href="#" class="grid">
												<div class="user_img"><img src="<?php echo base_url() . "/includes/ext/"; ?>assets/images/avatar1.jpg" alt=""></div>
												<div class="notification_desc">
													<p>Johnson purchased template</p>
													<span>Just Now</span>
												</div>
											</a></li>
										<li>
											<div class="notification_bottom">
												<a href="#all" class="bg-primary">See all messages</a>
											</div>
										</li>
									</ul>
								</li>
							</ul>
						</div>
						<div class="profile_details">
							<ul>
								<li class="dropdown profile_details_drop">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" id="dropdownMenu3" aria-haspopup="true" aria-expanded="false">
										<div class="profile_img">
											<img src="<?php echo base_url() . "/includes/ext/"; ?>assets/images/profileimg.jpg" class="rounded-circle" alt="" />
											<div class="user-active">
												<span></span>
											</div>
										</div>
									</a>
									<ul class="dropdown-menu drp-mnu" aria-labelledby="dropdownMenu3">
										<li class="user-info">
											<h5 class="user-name">John Deo</h5>
											<span class="status ml-2">Available</span>
										</li>
										<li> <a href="#"><i class="lnr lnr-user"></i>My Profile</a> </li>
										<li> <a href="#"><i class="lnr lnr-users"></i>1k Followers</a> </li>
										<li> <a href="#"><i class="lnr lnr-cog"></i>Setting</a> </li>
										<li> <a href="#"><i class="lnr lnr-heart"></i>100 Likes</a> </li>
										<li class="logout"> <a href="#sign-up.html"><i class="fa fa-power-off"></i> Logout</a> </li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!--notification menu end -->
		</div>