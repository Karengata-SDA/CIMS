 <?php  
 $connect = mysqli_connect("localhost", "root", "", "karengata_cims");  
 $query = "SELECT * FROM userdetails ORDER BY id DESC";  
 $result = mysqli_query($connect, $query);  
 ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>CIMS | Records</title>
	<meta name="description" content="Droopy is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Droopy Admin, Droopyadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework"/>
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	
	<!-- Data table CSS -->
	<link href="../vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- Toast CSS -->
	<link href="../vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
		
	<!-- Custom CSS -->
	<link href="dist/css/style.css" rel="stylesheet" type="text/css">

		<!-- bootstrap-select CSS -->
	<link href="../vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>	
		
	<!-- switchery CSS -->
	<link href="../vendors/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" type="text/css"/>
	


			<!-- Footable CSS -->
		<link href="../vendors/bower_components/FooTable/compiled/footable.bootstrap.min.css" rel="stylesheet" type="text/css"/>

    <!-- Bootstrap -->
    <link href="../vendors3/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors3/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors3/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors3/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    		<!--alerts CSS -->
		<link href="../vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">


     
    <!--link type="text/css" rel="stylesheet" href="extra/bootstrap.min.css" /-->  
            
</head>

<body>
	<!-- Preloader -->
	<!--div class="preloader-it">
		<div class="la-anim-1"></div>
	</div-->
	<!-- /Preloader -->
    <!--div class="wrapper box-layout theme-5-active pimary-color-green"-->
           <div class="wrapper  theme-5-active pimary-color-green">
		<!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="mobile-only-brand pull-left">
				<div class="nav-header pull-left">
					<div class="logo-wrap">
						<a href="index.html">
							<img class="brand-img" src="../img/logo.png" alt="brand"/>
							<span class="brand-text">CIMS</span>
						</a>
					</div>
				</div>	
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
				<a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
				<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
				<form id="search_form" role="search" class="top-nav-search collapse pull-left">
					<div class="input-group">
						<input type="text" name="example-input1-group2" class="form-control" placeholder="Search">
						<span class="input-group-btn">
						<button type="button" class="btn  btn-default"  data-target="#search_form" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="zmdi zmdi-search"></i></button>
						</span>
					</div>
				</form>
			</div>
			<div id="mobile_only_nav" class="mobile-only-nav pull-right">
				<ul class="nav navbar-right top-nav pull-right">
					<li>
						<a id="open_right_sidebar" href="#"><i class="zmdi zmdi-settings top-nav-icon"></i></a>
					</li>
					<li class="dropdown app-drp">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-apps top-nav-icon"></i></a>
						<ul class="dropdown-menu app-dropdown" data-dropdown-in="slideInRight" data-dropdown-out="flipOutX">
							<li>
								<div class="app-nicescroll-bar">
									<ul class="app-icon-wrap pa-10">
										<li>
											<a href="weather.html" class="connection-item">
											<i class="zmdi zmdi-cloud-outline txt-info"></i>
											<span class="block">weather</span>
											</a>
										</li>
										<li>
											<a href="inbox.html" class="connection-item">
											<i class="zmdi zmdi-email-open txt-success"></i>
											<span class="block">e-mail</span>
											</a>
										</li>
										<li>
											<a href="calendar.html" class="connection-item">
											<i class="zmdi zmdi-calendar-check txt-primary"></i>
											<span class="block">calendar</span>
											</a>
										</li>
										<li>
											<a href="vector-map.html" class="connection-item">
											<i class="zmdi zmdi-map txt-danger"></i>
											<span class="block">map</span>
											</a>
										</li>
										<li>
											<a href="chats.html" class="connection-item">
											<i class="zmdi zmdi-comment-outline txt-warning"></i>
											<span class="block">chat</span>
											</a>
										</li>
										<li>
											<a href="contact-card.html" class="connection-item">
											<i class="zmdi zmdi-assignment-account"></i>
											<span class="block">contact</span>
											</a>
										</li>
									</ul>
								</div>	
							</li>
							<li>
								<div class="app-box-bottom-wrap">
									<hr class="light-grey-hr ma-0"/>
									<a class="block text-center read-all" href="javascript:void(0)"> more </a>
								</div>
							</li>
						</ul>
					</li>
					<li class="dropdown full-width-drp">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-more-vert top-nav-icon"></i></a>
						<ul class="dropdown-menu mega-menu pa-0" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
							<li class="product-nicescroll-bar row">
								<ul class="pa-20">
									<li class="col-md-3 col-xs-6 col-menu-list">
										<a href="javascript:void(0);"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
										<hr class="light-grey-hr ma-0"/>
										<ul>
											<li>
												<a href="index.html">Analytical</a>
											</li>
											<li>
												<a href="index2.html">Demographic</a>
											</li>
											<li>
												<a href="index3.html">Project</a>
											</li>
											<li>
												<a href="index4.html">Hospital</a>
											</li>
											<li>
												<a href="index5.html">HRM</a>
											</li>
											<li>
												<a href="index6.html">Real Estate</a>
											</li>
											<li>
												<a href="profile.html">profile</a>
											</li>
										</ul>
									</li>
									<li class="col-md-3 col-xs-6 col-menu-list">
										<a href="javascript:void(0);">
											<div class="pull-left">
												<i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">E-Commerce</span>
											</div>	
											<div class="pull-right"><span class="label label-success">hot</span>
											</div>
											<div class="clearfix"></div>
										</a>
										<hr class="light-grey-hr ma-0"/>
										<ul>
											<li>
												<a href="e-commerce.html">Dashboard</a>
											</li>
											<li>
												<a href="product.html">Products</a>
											</li>
											<li>
												<a href="product-detail.html">Product Detail</a>
											</li>
											<li>
												<a href="add-products.html">Add Product</a>
											</li>
											<li>
												<a href="product-orders.html">Orders</a>
											</li>
											<li>
												<a href="product-cart.html">Cart</a>
											</li>
											<li>
												<a href="product-checkout.html">Checkout</a>
											</li>
										</ul>
									</li>
									<li class="col-md-6 col-xs-12 preview-carousel">
										<a href="javascript:void(0);"><div class="pull-left"><span class="right-nav-text">latest products</span></div><div class="clearfix"></div></a>
										<hr class="light-grey-hr ma-0"/>
										<div class="product-carousel owl-carousel owl-theme text-center">
											<a href="#">
												<img src="../img/chair.jpg" alt="chair">
												<span>Circle chair</span>
											</a>
											<a href="#">
												<img src="../img/chair2.jpg" alt="chair">
												<span>square chair</span>
											</a>
											<a href="#">
												<img src="../img/chair3.jpg" alt="chair">
												<span>semi circle chair</span>
											</a>
											<a href="#">
												<img src="../img/chair4.jpg" alt="chair">
												<span>wooden chair</span>
											</a>
											<a href="#">
												<img src="../img/chair2.jpg" alt="chair">
												<span>square chair</span>
											</a>								
										</div>
									</li>
								</ul>
							</li>	
						</ul>
					</li>
					<li class="dropdown alert-drp">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-notifications top-nav-icon"></i><span class="top-nav-icon-badge">5</span></a>
						<ul  class="dropdown-menu alert-dropdown" data-dropdown-in="bounceIn" data-dropdown-out="bounceOut">
							<li>
								<div class="notification-box-head-wrap">
									<span class="notification-box-head pull-left inline-block">notifications</span>
									<a class="txt-danger pull-right clear-notifications inline-block" href="javascript:void(0)"> clear all </a>
									<div class="clearfix"></div>
									<hr class="light-grey-hr ma-0"/>
								</div>
							</li>
							<li>
								<div class="streamline message-nicescroll-bar">
									<div class="sl-item">
										<a href="javascript:void(0)">
											<div class="icon bg-green">
												<i class="zmdi zmdi-flag"></i>
											</div>
											<div class="sl-content">
												<span class="inline-block capitalize-font  pull-left truncate head-notifications">
												New subscription created</span>
												<span class="inline-block font-11  pull-right notifications-time">2pm</span>
												<div class="clearfix"></div>
												<p class="truncate">Your customer subscribed for the basic plan. The customer will pay $25 per month.</p>
											</div>
										</a>	
									</div>
									<hr class="light-grey-hr ma-0"/>
									<div class="sl-item">
										<a href="javascript:void(0)">
											<div class="icon bg-yellow">
												<i class="zmdi zmdi-trending-down"></i>
											</div>
											<div class="sl-content">
												<span class="inline-block capitalize-font  pull-left truncate head-notifications txt-warning">Server #2 not responding</span>
												<span class="inline-block font-11 pull-right notifications-time">1pm</span>
												<div class="clearfix"></div>
												<p class="truncate">Some technical error occurred needs to be resolved.</p>
											</div>
										</a>	
									</div>
									<hr class="light-grey-hr ma-0"/>
									<div class="sl-item">
										<a href="javascript:void(0)">
											<div class="icon bg-blue">
												<i class="zmdi zmdi-email"></i>
											</div>
											<div class="sl-content">
												<span class="inline-block capitalize-font  pull-left truncate head-notifications">2 new messages</span>
												<span class="inline-block font-11  pull-right notifications-time">4pm</span>
												<div class="clearfix"></div>
												<p class="truncate"> The last payment for your G Suite Basic subscription failed.</p>
											</div>
										</a>	
									</div>
									<hr class="light-grey-hr ma-0"/>
									<div class="sl-item">
										<a href="javascript:void(0)">
											<div class="sl-avatar">
												<img class="img-responsive" src="../img/avatar.jpg" alt="avatar"/>
											</div>
											<div class="sl-content">
												<span class="inline-block capitalize-font  pull-left truncate head-notifications">Sandy Doe</span>
												<span class="inline-block font-11  pull-right notifications-time">1pm</span>
												<div class="clearfix"></div>
												<p class="truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
											</div>
										</a>	
									</div>
									<hr class="light-grey-hr ma-0"/>
									<div class="sl-item">
										<a href="javascript:void(0)">
											<div class="icon bg-red">
												<i class="zmdi zmdi-storage"></i>
											</div>
											<div class="sl-content">
												<span class="inline-block capitalize-font  pull-left truncate head-notifications txt-danger">99% server space occupied.</span>
												<span class="inline-block font-11  pull-right notifications-time">1pm</span>
												<div class="clearfix"></div>
												<p class="truncate">consectetur, adipisci velit.</p>
											</div>
										</a>	
									</div>
								</div>
							</li>
							<li>
								<div class="notification-box-bottom-wrap">
									<hr class="light-grey-hr ma-0"/>
									<a class="block text-center read-all" href="javascript:void(0)"> read all </a>
									<div class="clearfix"></div>
								</div>
							</li>
						</ul>
					</li>
					<li class="dropdown auth-drp">
						<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="../img/user1.png" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
						<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
							<li>
								<a href="profile.html"><i class="zmdi zmdi-account"></i><span>Profile</span></a>
							</li>
							<li>
								<a href="#"><i class="zmdi zmdi-card"></i><span>my balance</span></a>
							</li>
							<li>
								<a href="inbox.html"><i class="zmdi zmdi-email"></i><span>Inbox</span></a>
							</li>
							<li>
								<a href="#"><i class="zmdi zmdi-settings"></i><span>Settings</span></a>
							</li>
							<li class="divider"></li>
							<li class="sub-menu show-on-hover">
								<a href="#" class="dropdown-toggle pr-0 level-2-drp"><i class="zmdi zmdi-check text-success"></i> available</a>
								<ul class="dropdown-menu open-left-side">
									<li>
										<a href="#"><i class="zmdi zmdi-check text-success"></i><span>available</span></a>
									</li>
									<li>
										<a href="#"><i class="zmdi zmdi-circle-o text-warning"></i><span>busy</span></a>
									</li>
									<li>
										<a href="#"><i class="zmdi zmdi-minus-circle-outline text-danger"></i><span>offline</span></a>
									</li>
								</ul>	
							</li>
							<li class="divider"></li>
							<li>
								<a href="#"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
							</li>
						</ul>
					</li>
				</ul>
			</div>	
		</nav>
		<!-- /Top Menu Items -->
		
		<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">
				<li class="navigation-header">
					<span>Main</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
				<li>
					<a class="active" href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="fa fa-laptop mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="pull-right"><!--i class="zmdi zmdi-caret-down"--></i></div><div class="clearfix"></div></a>
					<!--ul id="dashboard_dr" class="collapse collapse-level-1">
						<li>
							<a class="active-page" href="index.html">Analytical</a>
						</li>
						<li>
							<a href="index2.html">Demographic</a>
						</li>
						<li>
							<a href="index3.html">Project</a>
						</li>
						<li>
							<a href="index4.html">Hospital</a>
						</li>
						<li>
							<a href="index5.html">HRM</a>
						</li>
						<li>
							<a href="index6.html">Real Estate</a>
						</li>
						<li>
							<a href="profile.html">profile</a>
						</li>
					</ul-->
				</li>

				<li><hr class="light-grey-hr mb-10"/></li>
				<li class="navigation-header">
					<span>module</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#finance_dr"><div class="pull-left"><i class="fa fa-money mr-20"></i><span class="right-nav-text">Finance </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="finance_dr" class="collapse collapse-level-1">
						<li>
							<a href="chats.html">Budgets</a>
						</li>
						<li>
							<a href="calendar.html">Income</a>
						</li>
						<li>
							<a href="weather.html">Expenditure</a>
						</li>
						<!--li>
							<a href="javascript:void(0);" data-toggle="collapse" data-target="#email_dr">Email<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
							<ul id="email_dr" class="collapse collapse-level-2">
								<li>
									<a href="inbox.html">inbox</a>
								</li>
								<li>
									<a href="inbox-detail.html">detail email</a>
								</li>
							</ul>
						</li-->
						<!--li>
							<a href="javascript:void(0);" data-toggle="collapse" data-target="#contact_dr">Contacts<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
							<ul id="contact_dr" class="collapse collapse-level-2">
								<li>
									<a href="contact-list.html">list</a>
								</li>
								<li>
									<a href="contact-card.html">cards</a>
								</li>
							</ul>
						</li-->
						<li>
							<a href="file-manager.html">Requisitions</a>
						</li>
						<li>
							<a href="todo-tasklist.html">Receipts</a>
						</li>
					</ul>
				</li>


				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#messages_dr"><div class="pull-left"><i class="fa fa-comments-o mr-20"></i><span class="right-nav-text">Messages </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="messages_dr" class="collapse collapse-level-1">
						
						<li>
							<a href="javascript:void(0);" data-toggle="collapse" data-target="#inbox_dr">Inbox<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
							<ul id="inbox_dr" class="collapse collapse-level-2">
								<li>
									<a href="inbox.html">Email</a>
								</li>
								<li>
									<a href="inbox-detail.html">SMS</a>
								</li>
								<li>
									<a href="inbox-detail.html">Chats</a>
								</li>
								<li>
									<a href="inbox-detail.html">Forum</a>
								</li>

							</ul>
						</li>
						<li>
							<a href="javascript:void(0);" data-toggle="collapse" data-target="#outdoor_dr">Outbox<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
							<ul id="outdoor_dr" class="collapse collapse-level-2">
								<li>
									<a href="inbox.html">Email</a>
								</li>
								<li>
									<a href="inbox-detail.html">SMS</a>
								</li>
								<li>
									<a href="inbox-detail.html">Chats</a>
								</li>
								<li>
									<a href="inbox-detail.html">Forum</a>
								</li>

							</ul>
						</li>
						<li>
							<a href="javascript:void(0);" data-toggle="collapse" data-target="#draftbox_dr">Draftbox<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
							<ul id="draftbox_dr" class="collapse collapse-level-2">
								<li>
									<a href="inbox.html">Email</a>
								</li>
								<li>
									<a href="inbox-detail.html">SMS</a>
								</li>
								<li>
									<a href="inbox-detail.html">Chats</a>
								</li>
								<li>
									<a href="inbox-detail.html">Forum</a>
								</li>

							</ul>
						</li>
						<li>
							<a href="weather.html">Expenditure</a>
						</li>
						<!--li>
							<a href="javascript:void(0);" data-toggle="collapse" data-target="#email_dr">Email<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
							<ul id="email_dr" class="collapse collapse-level-2">
								<li>
									<a href="inbox.html">inbox</a>
								</li>
								<li>
									<a href="inbox-detail.html">detail email</a>
								</li>
							</ul>
						</li-->
						<!--li>
							<a href="javascript:void(0);" data-toggle="collapse" data-target="#contact_dr">Contacts<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
							<ul id="contact_dr" class="collapse collapse-level-2">
								<li>
									<a href="contact-list.html">list</a>
								</li>
								<li>
									<a href="contact-card.html">cards</a>
								</li>
							</ul>
						</li-->
						<li>
							<a href="file-manager.html">Requisitions</a>
						</li>
						<li>
							<a href="todo-tasklist.html">Receipts</a>
						</li>
					</ul>
				</li>


				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar_dr"><div class="pull-left"><i class="fa fa-calendar mr-20"></i><span class="right-nav-text">Calendar </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="calendar_dr" class="collapse collapse-level-1">
						<li>
							<a href="chats.html">Budgets</a>
						</li>
						<li>
							<a href="calendar.html">Income</a>
						</li>
						<li>
							<a href="weather.html">Expenditure</a>
						</li>
						<!--li>
							<a href="javascript:void(0);" data-toggle="collapse" data-target="#email_dr">Email<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
							<ul id="email_dr" class="collapse collapse-level-2">
								<li>
									<a href="inbox.html">inbox</a>
								</li>
								<li>
									<a href="inbox-detail.html">detail email</a>
								</li>
							</ul>
						</li-->
						<!--li>
							<a href="javascript:void(0);" data-toggle="collapse" data-target="#contact_dr">Contacts<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
							<ul id="contact_dr" class="collapse collapse-level-2">
								<li>
									<a href="contact-list.html">list</a>
								</li>
								<li>
									<a href="contact-card.html">cards</a>
								</li>
							</ul>
						</li-->
						<li>
							<a href="file-manager.html">Requisitions</a>
						</li>
						<li>
							<a href="todo-tasklist.html">Receipts</a>
						</li>
					</ul>
				</li>


				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#profile_dr"><div class="pull-left"><i class="fa fa-group mr-20"></i><span class="right-nav-text">Profiles </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="profile_dr" class="collapse collapse-level-1">
						<li>
							<a href="chats.html">Budgets</a>
						</li>
						<li>
							<a href="calendar.html">Income</a>
						</li>
						<li>
							<a href="weather.html">Expenditure</a>
						</li>
						<!--li>
							<a href="javascript:void(0);" data-toggle="collapse" data-target="#email_dr">Email<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
							<ul id="email_dr" class="collapse collapse-level-2">
								<li>
									<a href="inbox.html">inbox</a>
								</li>
								<li>
									<a href="inbox-detail.html">detail email</a>
								</li>
							</ul>
						</li-->
						<!--li>
							<a href="javascript:void(0);" data-toggle="collapse" data-target="#contact_dr">Contacts<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
							<ul id="contact_dr" class="collapse collapse-level-2">
								<li>
									<a href="contact-list.html">list</a>
								</li>
								<li>
									<a href="contact-card.html">cards</a>
								</li>
							</ul>
						</li-->
						<li>
							<a href="file-manager.html">Requisitions</a>
						</li>
						<li>
							<a href="todo-tasklist.html">Receipts</a>
						</li>
					</ul>
				</li>


				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#inventory_dr"><div class="pull-left"><i class="fa fa-cubes mr-20"></i><span class="right-nav-text">Inventory </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="inventory_dr" class="collapse collapse-level-1">
						<li>
							<a href="chats.html">Equipments</a>
						</li>
						<li>
							<a href="calendar.html">Furniiture</a>
						</li>
						<li>
							<a href="weather.html">Stationery</a>
						</li>
						<!--li>
							<a href="javascript:void(0);" data-toggle="collapse" data-target="#email_dr">Email<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
							<ul id="email_dr" class="collapse collapse-level-2">
								<li>
									<a href="inbox.html">inbox</a>
								</li>
								<li>
									<a href="inbox-detail.html">detail email</a>
								</li>
							</ul>
						</li-->
						<!--li>
							<a href="javascript:void(0);" data-toggle="collapse" data-target="#contact_dr">Contacts<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
							<ul id="contact_dr" class="collapse collapse-level-2">
								<li>
									<a href="contact-list.html">list</a>
								</li>
								<li>
									<a href="contact-card.html">cards</a>
								</li>
							</ul>
						</li-->
						<li>
							<a href="file-manager.html">Books</a>
						</li>
						<li>
							<a href="todo-tasklist.html">Documents</a>
						</li>
						<li>
							<a href="todo-tasklist.html">Records</a>
						</li>
					</ul>
				</li>


				<li><hr class="light-grey-hr mb-10"/></li>
				<li class="navigation-header">
					<span>system accessories</span> 
					<i class="zmdi zmdi-more"></i>
				</li>

				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#settings_dr"><div class="pull-left"><i class="fa  fa-cogs mr-20"></i><span class="right-nav-text">Settings </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="settings_dr" class="collapse collapse-level-1">
						<li>
							<a href="chats.html">Budgets</a>
						</li>
						<li>
							<a href="calendar.html">Income</a>
						</li>
						<li>
							<a href="weather.html">Expenditure</a>
						</li>
						<!--li>
							<a href="javascript:void(0);" data-toggle="collapse" data-target="#email_dr">Email<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
							<ul id="email_dr" class="collapse collapse-level-2">
								<li>
									<a href="inbox.html">inbox</a>
								</li>
								<li>
									<a href="inbox-detail.html">detail email</a>
								</li>
							</ul>
						</li-->
						<!--li>
							<a href="javascript:void(0);" data-toggle="collapse" data-target="#contact_dr">Contacts<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
							<ul id="contact_dr" class="collapse collapse-level-2">
								<li>
									<a href="contact-list.html">list</a>
								</li>
								<li>
									<a href="contact-card.html">cards</a>
								</li>
							</ul>
						</li-->
						<li>
							<a href="file-manager.html">Requisitions</a>
						</li>
						<li>
							<a href="todo-tasklist.html">Receipts</a>
						</li>
					</ul>
				</li>


				<!--li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">E-Commerce</span></div><div class="pull-right"><span class="label label-success">hot</span></div><div class="clearfix"></div></a>
					<ul id="ecom_dr" class="collapse collapse-level-1">
						<li>
							<a href="e-commerce.html">Dashboard</a>
						</li>
						<li>
							<a href="product.html">Products</a>
						</li>
						<li>
							<a href="product-detail.html">Product Detail</a>
						</li>
						<li>
							<a href="add-products.html">Add Product</a>
						</li>
						<li>
							<a href="product-orders.html">Orders</a>
						</li>
						<li>
							<a href="product-cart.html">Cart</a>
						</li>
						<li>
							<a href="product-checkout.html">Checkout</a>
						</li>
					</ul>
				</li-->
				<!--li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#app_dr"><div class="pull-left"><i class="zmdi zmdi-apps mr-20"></i><span class="right-nav-text">Apps </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="app_dr" class="collapse collapse-level-1">
						<li>
							<a href="chats.html">chats</a>
						</li>
						<li>
							<a href="calendar.html">calendar</a>
						</li>
						<li>
							<a href="weather.html">weather</a>
						</li>
						<li>
							<a href="javascript:void(0);" data-toggle="collapse" data-target="#email_dr">Email<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
							<ul id="email_dr" class="collapse collapse-level-2">
								<li>
									<a href="inbox.html">inbox</a>
								</li>
								<li>
									<a href="inbox-detail.html">detail email</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="javascript:void(0);" data-toggle="collapse" data-target="#contact_dr">Contacts<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
							<ul id="contact_dr" class="collapse collapse-level-2">
								<li>
									<a href="contact-list.html">list</a>
								</li>
								<li>
									<a href="contact-card.html">cards</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="file-manager.html">File Manager</a>
						</li>
						<li>
							<a href="todo-tasklist.html">To Do/Tasklist</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="widgets.html"><div class="pull-left"><i class="zmdi zmdi-flag mr-20"></i><span class="right-nav-text">widgets</span></div><div class="pull-right"><span class="label label-warning">8</span></div><div class="clearfix"></div></a>
				</li>
				<li><hr class="light-grey-hr mb-10"/></li>
				<li class="navigation-header">
					<span>component</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#ui_dr"><div class="pull-left"><i class="zmdi zmdi-smartphone-setup mr-20"></i><span class="right-nav-text">UI Elements</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="ui_dr" class="collapse collapse-level-1 two-col-list">
						<li>
							<a href="panels-wells.html">Panels & Wells</a>
						</li>
						<li>
							<a href="modals.html">Modals</a>
						</li>
						<li>
							<a href="sweetalert.html">Sweet Alerts</a>
						</li>
						<li>
							<a href="notifications.html">notifications</a>
						</li>
						<li>
							<a href="typography.html">Typography</a>
						</li>
						<li>
							<a href="buttons.html">Buttons</a>
						</li>
						<li>
							<a href="accordion-toggle.html">Accordion / Toggles</a>
						</li>
						<li>
							<a href="tabs.html">Tabs</a>
						</li>
						<li>
							<a href="progressbars.html">Progress bars</a>
						</li>
						<li>
							<a href="skills-counter.html">Skills & Counters</a>
						</li>
						<li>
							<a href="pricing.html">Pricing Tables</a>
						</li>
						<li>
							<a href="nestable.html">Nestables</a>
						</li>
						<li>
							<a href="dorpdown.html">Dropdowns</a>
						</li>
						<li>
							<a href="bootstrap-treeview.html">Tree View</a>
						</li>
						<li>
							<a href="carousel.html">Carousel</a>
						</li>
						<li>
							<a href="range-slider.html">Range Slider</a>
						</li>
						<li>
							<a href="grid-styles.html">Grid</a>
						</li>
						<li>
							<a href="bootstrap-ui.html">Bootstrap UI</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#form_dr"><div class="pull-left"><i class="zmdi zmdi-edit mr-20"></i><span class="right-nav-text">Forms</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="form_dr" class="collapse collapse-level-1 two-col-list">
						<li>
							<a href="form-element.html">Basic Forms</a>
						</li>
						<li>
							<a href="form-layout.html">form Layout</a>
						</li>
						<li>
							<a href="form-advanced.html">Form Advanced</a>
						</li>
						<li>
							<a href="form-mask.html">Form Mask</a>
						</li>
						<li>
							<a href="form-picker.html">Form Picker</a>
						</li>
						<li>
							<a href="form-validation.html">form Validation</a>
						</li>
						<li>
							<a href="form-wizard.html">Form Wizard</a>
						</li>
						<li>
							<a href="form-x-editable.html">X-Editable</a>
						</li>
						<li>
							<a href="cropperjs.html">Cropperjs</a>
						</li>
						<li>
							<a href="form-file-upload.html">File Upload</a>
						</li>
						<li>
							<a href="dropzone.html">Dropzone</a>
						</li>
						<li>
							<a href="bootstrap-wysihtml5.html">Bootstrap Wysihtml5</a>
						</li>
						<li>
							<a href="tinymce-wysihtml5.html">Tinymce Wysihtml5</a>
						</li>
						<li>
							<a href="summernote-wysihtml5.html">summernote</a>
						</li>
						<li>
							<a href="typeahead-js.html">typeahead</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#chart_dr"><div class="pull-left"><i class="zmdi zmdi-chart-donut mr-20"></i><span class="right-nav-text">Charts </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="chart_dr" class="collapse collapse-level-1 two-col-list">
						<li>
							<a href="flot-chart.html">Flot Chart</a>
						</li>
						<li>
							<a href="echart.html">Echart Chart</a>
						</li>
						<li>
							<a href="morris-chart.html">Morris Chart</a>
						</li>
						<li>
							<a href="chart.js.html">chartjs</a>
						</li>
						<li>
							<a href="chartist.html">chartist</a>
						</li>
						<li>
							<a href="easy-pie-chart.html">Easy Pie Chart</a>
						</li>
						<li>
							<a href="sparkline.html">Sparkline</a>
						</li>
						<li>
							<a href="peity-chart.html">Peity Chart</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#table_dr"><div class="pull-left"><i class="zmdi zmdi-format-size mr-20"></i><span class="right-nav-text">Tables</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="table_dr" class="collapse collapse-level-1 two-col-list">
						<li>
							<a href="basic-table.html">Basic Table</a>
						</li>
						<li>
							<a href="bootstrap-table.html">Bootstrap Table</a>
						</li>
						<li>
							<a href="data-table.html">Data Table</a>
						</li>
						<li>
							<a href="export-table.html">Export Table</a>
						</li>
						<li>
							<a href="responsive-data-table.html">RSPV DataTable</a>
						</li>
						<li>
							<a href="responsive-table.html">Responsive Table</a>
						</li>
						<li>
							<a href="editable-table.html">Editable Table</a>
						</li>
						<li>
							<a href="foo-table.html">Foo Table</a>
						</li>
						<li>
							<a href="jsgrid-table.html">Jsgrid Table</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#icon_dr"><div class="pull-left"><i class="zmdi zmdi-iridescent mr-20"></i><span class="right-nav-text">Icons</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="icon_dr" class="collapse collapse-level-1">
						<li>
							<a href="fontawesome.html">Fontawesome</a>
						</li>
						<li>
							<a href="themify.html">Themify</a>
						</li>
						<li>
							<a href="linea-icon.html">Linea</a>
						</li>
						<li>
							<a href="simple-line-icons.html">Simple Line</a>
						</li>
						<li>
							<a href="pe-icon-7.html">Pe-icon-7</a>
						</li>
						<li>
							<a href="glyphicons.html">Glyphicons</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#maps_dr"><div class="pull-left"><i class="zmdi zmdi-map mr-20"></i><span class="right-nav-text">maps</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="maps_dr" class="collapse collapse-level-1">
						<li>
							<a href="vector-map.html">Vector Map</a>
						</li>
						<li>
							<a href="google-map.html">Google Map</a>
						</li>
					</ul>
				</li>
				<li><hr class="light-grey-hr mb-10"/></li>
				<li class="navigation-header">
					<span>featured</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#pages_dr"><div class="pull-left"><i class="zmdi zmdi-google-pages mr-20"></i><span class="right-nav-text">Special Pages</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="pages_dr" class="collapse collapse-level-1 two-col-list">
						<li>
							<a href="blank.html">Blank Page</a>
						</li>
						<li>
							<a href="javascript:void(0);" data-toggle="collapse" data-target="#auth_dr">Authantication pages<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
							<ul id="auth_dr" class="collapse collapse-level-2">
								<li>
									<a href="login.html">Login</a>
								</li>
								<li>
									<a href="signup.html">Register</a>
								</li>
								<li>
									<a href="forgot-password.html">Recover Password</a>
								</li>
								<li>
									<a href="reset-password.html">reset Password</a>
								</li>
								<li>
									<a href="locked.html">Lock Screen</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="javascript:void(0);" data-toggle="collapse" data-target="#invoice_dr">Invoice<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
							<ul id="invoice_dr" class="collapse collapse-level-2">
								<li>
									<a href="invoice.html">Invoice</a>
								</li>
								<li>
									<a href="invoice-archive.html">Invoice Archive</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="javascript:void(0);" data-toggle="collapse" data-target="#error_dr">error pages<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
							<ul id="error_dr" class="collapse collapse-level-2">
								<li>
									<a href="404.html">Error 404</a>
								</li>
								<li>
									<a href="500.html">Error 500</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="gallery.html">Gallery</a>
						</li>
						<li>
							<a href="timeline.html">Timeline</a>
						</li>
						<li>
							<a href="faq.html">FAQ</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="documentation.html"><div class="pull-left"><i class="zmdi zmdi-book mr-20"></i><span class="right-nav-text">documentation</span></div><div class="clearfix"></div></a>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#dropdown_dr_lv1"><div class="pull-left"><i class="zmdi zmdi-filter-list mr-20"></i><span class="right-nav-text">multilevel</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="dropdown_dr_lv1" class="collapse collapse-level-1">
						<li>
							<a href="#">Item level 1</a>
						</li>
						<li>
							<a href="javascript:void(0);" data-toggle="collapse" data-target="#dropdown_dr_lv2">Dropdown level 2<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
							<ul id="dropdown_dr_lv2" class="collapse collapse-level-2">
								<li>
									<a href="#">Item level 2</a>
								</li>
								<li>
									<a href="#">Item level 2</a>
								</li>
							</ul>
						</li>
					</ul>
				</li-->
			</ul>
		</div>
		<!-- /Left Sidebar Menu -->
		
		<!-- Right Sidebar Menu -->
		<div class="fixed-sidebar-right">
			<ul class="right-sidebar">
				<li>
					<div  class="tab-struct custom-tab-1">
						<ul role="tablist" class="nav nav-tabs" id="right_sidebar_tab">
							<li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="chat_tab_btn" href="#chat_tab">chat</a></li>
							<li role="presentation" class=""><a  data-toggle="tab" id="messages_tab_btn" role="tab" href="#messages_tab" aria-expanded="false">messages</a></li>
							<li role="presentation" class=""><a  data-toggle="tab" id="todo_tab_btn" role="tab" href="#todo_tab" aria-expanded="false">todo</a></li>
						</ul>
						<div class="tab-content" id="right_sidebar_content">
							<div  id="chat_tab" class="tab-pane fade active in" role="tabpanel">
								<div class="chat-cmplt-wrap">
									<div class="chat-box-wrap">
										<div class="add-friend">
											<a href="javascript:void(0)" class="inline-block txt-grey">
												<i class="zmdi zmdi-more"></i>
											</a>	
											<span class="inline-block txt-dark">users</span>
											<a href="javascript:void(0)" class="inline-block text-right txt-grey"><i class="zmdi zmdi-plus"></i></a>
											<div class="clearfix"></div>
										</div>
										<form role="search" class="chat-search pl-15 pr-15 pb-15">
											<div class="input-group">
												<input type="text" id="example-input1-group2" name="example-input1-group2" class="form-control" placeholder="Search">
												<span class="input-group-btn">
												<button type="button" class="btn  btn-default"><i class="zmdi zmdi-search"></i></button>
												</span>
											</div>
										</form>
										<div id="chat_list_scroll">
											<div class="nicescroll-bar">
												<ul class="chat-list-wrap">
													<li class="chat-list">
														<div class="chat-body">
															<a href="javascript:void(0)">
																<div class="chat-data">
																	<img class="user-img img-circle"  src="../img/user.png" alt="user"/>
																	<div class="user-data">
																		<span class="name block capitalize-font">Clay Masse</span>
																		<span class="time block truncate txt-grey">No one saves us but ourselves.</span>
																	</div>
																	<div class="status away"></div>
																	<div class="clearfix"></div>
																</div>
															</a>
															<a href="javascript:void(0)">
																<div class="chat-data">
																	<img class="user-img img-circle"  src="../img/user1.png" alt="user"/>
																	<div class="user-data">
																		<span class="name block capitalize-font">Evie Ono</span>
																		<span class="time block truncate txt-grey">Unity is strength</span>
																	</div>
																	<div class="status offline"></div>
																	<div class="clearfix"></div>
																</div>
															</a>
															<a href="javascript:void(0)">
																<div class="chat-data">
																	<img class="user-img img-circle"  src="../img/user2.png" alt="user"/>
																	<div class="user-data">
																		<span class="name block capitalize-font">Madalyn Rascon</span>
																		<span class="time block truncate txt-grey">Respect yourself if you would have others respect you.</span>
																	</div>
																	<div class="status online"></div>
																	<div class="clearfix"></div>
																</div>
															</a>
															<a href="javascript:void(0)">
																<div class="chat-data">
																	<img class="user-img img-circle"  src="../img/user3.png" alt="user"/>
																	<div class="user-data">
																		<span class="name block capitalize-font">Mitsuko Heid</span>
																		<span class="time block truncate txt-grey">I’m thankful.</span>
																	</div>
																	<div class="status online"></div>
																	<div class="clearfix"></div>
																</div>
															</a>
															<a href="javascript:void(0)">
																<div class="chat-data">
																	<img class="user-img img-circle"  src="../img/user.png" alt="user"/>
																	<div class="user-data">
																		<span class="name block capitalize-font">Ezequiel Merideth</span>
																		<span class="time block truncate txt-grey">Patience is bitter.</span>
																	</div>
																	<div class="status offline"></div>
																	<div class="clearfix"></div>
																</div>
															</a>
															<a href="javascript:void(0)">
																<div class="chat-data">
																	<img class="user-img img-circle"  src="../img/user1.png" alt="user"/>
																	<div class="user-data">
																		<span class="name block capitalize-font">Jonnie Metoyer</span>
																		<span class="time block truncate txt-grey">Genius is eternal patience.</span>
																	</div>
																	<div class="status online"></div>
																	<div class="clearfix"></div>
																</div>
															</a>
															<a href="javascript:void(0)">
																<div class="chat-data">
																	<img class="user-img img-circle"  src="../img/user2.png" alt="user"/>
																	<div class="user-data">
																		<span class="name block capitalize-font">Angelic Lauver</span>
																		<span class="time block truncate txt-grey">Every burden is a blessing.</span>
																	</div>
																	<div class="status away"></div>
																	<div class="clearfix"></div>
																</div>
															</a>
															<a href="javascript:void(0)">
																<div class="chat-data">
																	<img class="user-img img-circle"  src="../img/user3.png" alt="user"/>
																	<div class="user-data">
																		<span class="name block capitalize-font">Priscila Shy</span>
																		<span class="time block truncate txt-grey">Wise to resolve, and patient to perform.</span>
																	</div>
																	<div class="status online"></div>
																	<div class="clearfix"></div>
																</div>
															</a>
															<a href="javascript:void(0)">
																<div class="chat-data">
																	<img class="user-img img-circle"  src="../img/user4.png" alt="user"/>
																	<div class="user-data">
																		<span class="name block capitalize-font">Linda Stack</span>
																		<span class="time block truncate txt-grey">Our patience will achieve more than our force.</span>
																	</div>
																	<div class="status away"></div>
																	<div class="clearfix"></div>
																</div>
															</a>
														</div>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="recent-chat-box-wrap">
										<div class="recent-chat-wrap">
											<div class="panel-heading ma-0">
												<div class="goto-back">
													<a  id="goto_back" href="javascript:void(0)" class="inline-block txt-grey">
														<i class="zmdi zmdi-chevron-left"></i>
													</a>	
													<span class="inline-block txt-dark">ryan</span>
													<a href="javascript:void(0)" class="inline-block text-right txt-grey"><i class="zmdi zmdi-more"></i></a>
													<div class="clearfix"></div>
												</div>
											</div>
											<div class="panel-wrapper collapse in">
												<div class="panel-body pa-0">
													<div class="chat-content">
														<ul class="nicescroll-bar pt-20">
															<li class="friend">
																<div class="friend-msg-wrap">
																	<img class="user-img img-circle block pull-left"  src="../img/user.png" alt="user"/>
																	<div class="msg pull-left">
																		<p>Hello Jason, how are you, it's been a long time since we last met?</p>
																		<div class="msg-per-detail text-right">
																			<span class="msg-time txt-grey">2:30 PM</span>
																		</div>
																	</div>
																	<div class="clearfix"></div>
																</div>	
															</li>
															<li class="self mb-10">
																<div class="self-msg-wrap">
																	<div class="msg block pull-right"> Oh, hi Sarah I'm have got a new job now and is going great.
																		<div class="msg-per-detail text-right">
																			<span class="msg-time txt-grey">2:31 pm</span>
																		</div>
																	</div>
																	<div class="clearfix"></div>
																</div>	
															</li>
															<li class="self">
																<div class="self-msg-wrap">
																	<div class="msg block pull-right">  How about you?
																		<div class="msg-per-detail text-right">
																			<span class="msg-time txt-grey">2:31 pm</span>
																		</div>
																	</div>
																	<div class="clearfix"></div>
																</div>	
															</li>
															<li class="friend">
																<div class="friend-msg-wrap">
																	<img class="user-img img-circle block pull-left"  src="../img/user.png" alt="user"/>
																	<div class="msg pull-left"> 
																		<p>Not too bad.</p>
																		<div class="msg-per-detail  text-right">
																			<span class="msg-time txt-grey">2:35 pm</span>
																		</div>
																	</div>
																	<div class="clearfix"></div>
																</div>	
															</li>
														</ul>
													</div>
													<div class="input-group">
														<input type="text" id="input_msg_send" name="send-msg" class="input-msg-send form-control" placeholder="Type something">
														<div class="input-group-btn emojis">
															<div class="dropup">
																<button type="button" class="btn  btn-default  dropdown-toggle" data-toggle="dropdown" ><i class="zmdi zmdi-mood"></i></button>
																<ul class="dropdown-menu dropdown-menu-right">
																	<li><a href="javascript:void(0)">Action</a></li>
																	<li><a href="javascript:void(0)">Another action</a></li>
																	<li class="divider"></li>
																	<li><a href="javascript:void(0)">Separated link</a></li>
																</ul>
															</div>
														</div>
														<div class="input-group-btn attachment">
															<div class="fileupload btn  btn-default"><i class="zmdi zmdi-attachment-alt"></i>
																<input type="file" class="upload">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
								
							<div id="messages_tab" class="tab-pane fade" role="tabpanel">
								<div class="message-box-wrap">
									<div class="msg-search">
										<a href="javascript:void(0)" class="inline-block txt-grey">
											<i class="zmdi zmdi-more"></i>
										</a>	
										<span class="inline-block txt-dark">messages</span>
										<a href="javascript:void(0)" class="inline-block text-right txt-grey"><i class="zmdi zmdi-search"></i></a>
										<div class="clearfix"></div>
									</div>
									<div class="set-height-wrap">
										<div class="streamline message-box nicescroll-bar">
											<a href="javascript:void(0)">
												<div class="sl-item unread-message">
													<div class="sl-avatar avatar avatar-sm avatar-circle">
														<img class="img-responsive img-circle" src="../img/user.png" alt="avatar"/>
													</div>
													<div class="sl-content">
														<span class="inline-block capitalize-font   pull-left message-per">Clay Masse</span>
														<span class="inline-block font-11  pull-right message-time">12:28 AM</span>
														<div class="clearfix"></div>
														<span class=" truncate message-subject"> message sent via your monster market profile</span>
														<p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsu messm quia dolor sit amet, consectetur, adipisci velit</p>
													</div>
												</div>
											</a>
											<a href="javascript:void(0)">
												<div class="sl-item">
													<div class="sl-avatar avatar avatar-sm avatar-circle">
														<img class="img-responsive img-circle" src="../img/user1.png" alt="avatar"/>
													</div>
													<div class="sl-content">
														<span class="inline-block capitalize-font   pull-left message-per">Evie Ono</span>
														<span class="inline-block font-11  pull-right message-time">1 Feb</span>
														<div class="clearfix"></div>
														<span class=" truncate message-subject">Pogody theme support</span>
														<p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
													</div>
												</div>
											</a>
											<a href="javascript:void(0)">
												<div class="sl-item">
													<div class="sl-avatar avatar avatar-sm avatar-circle">
														<img class="img-responsive img-circle" src="../img/user2.png" alt="avatar"/>
													</div>
													<div class="sl-content">
														<span class="inline-block capitalize-font   pull-left message-per">Madalyn Rascon</span>
														<span class="inline-block font-11  pull-right message-time">31 Jan</span>
														<div class="clearfix"></div>
														<span class=" truncate message-subject">Congratulations from design nominees</span>
														<p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
													</div>
												</div>
											</a>
											<a href="javascript:void(0)">
												<div class="sl-item unread-message">
													<div class="sl-avatar avatar avatar-sm avatar-circle">
														<img class="img-responsive img-circle" src="../img/user3.png" alt="avatar"/>
													</div>
													<div class="sl-content">
														<span class="inline-block capitalize-font   pull-left message-per">Ezequiel Merideth</span>
														<span class="inline-block font-11  pull-right message-time">29 Jan</span>
														<div class="clearfix"></div>
														<span class=" truncate message-subject"> item support message</span>
														<p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
													</div>
												</div>
											</a>
											<a href="javascript:void(0)">
												<div class="sl-item unread-message">
													<div class="sl-avatar avatar avatar-sm avatar-circle">
														<img class="img-responsive img-circle" src="../img/user4.png" alt="avatar"/>
													</div>
													<div class="sl-content">
														<span class="inline-block capitalize-font   pull-left message-per">Jonnie Metoyer</span>
														<span class="inline-block font-11  pull-right message-time">27 Jan</span>
														<div class="clearfix"></div>
														<span class=" truncate message-subject">Help with beavis contact form</span>
														<p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
													</div>
												</div>
											</a>
											<a href="javascript:void(0)">
												<div class="sl-item">
													<div class="sl-avatar avatar avatar-sm avatar-circle">
														<img class="img-responsive img-circle" src="../img/user.png" alt="avatar"/>
													</div>
													<div class="sl-content">
														<span class="inline-block capitalize-font   pull-left message-per">Priscila Shy</span>
														<span class="inline-block font-11  pull-right message-time">19 Jan</span>
														<div class="clearfix"></div>
														<span class=" truncate message-subject">Your uploaded theme is been selected</span>
														<p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
													</div>
												</div>
											</a>
											<a href="javascript:void(0)">
												<div class="sl-item">
													<div class="sl-avatar avatar avatar-sm avatar-circle">
														<img class="img-responsive img-circle" src="../img/user1.png" alt="avatar"/>
													</div>
													<div class="sl-content">
														<span class="inline-block capitalize-font   pull-left message-per">Linda Stack</span>
														<span class="inline-block font-11  pull-right message-time">13 Jan</span>
														<div class="clearfix"></div>
														<span class=" truncate message-subject"> A new rating has been received</span>
														<p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
													</div>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div  id="todo_tab" class="tab-pane fade" role="tabpanel">
								<div class="todo-box-wrap">
									<div class="add-todo">
										<a href="javascript:void(0)" class="inline-block txt-grey">
											<i class="zmdi zmdi-more"></i>
										</a>	
										<span class="inline-block txt-dark">todo list</span>
										<a href="javascript:void(0)" class="inline-block text-right txt-grey"><i class="zmdi zmdi-plus"></i></a>
										<div class="clearfix"></div>
									</div>
									<div class="set-height-wrap">
										<!-- Todo-List -->
										<ul class="todo-list nicescroll-bar">
											<li class="todo-item">
												<div class="checkbox checkbox-default">
													<input type="checkbox" id="checkbox01"/>
													<label for="checkbox01">Record The First Episode</label>
												</div>
											</li>
											<li>
												<hr class="light-grey-hr"/>
											</li>
											<li class="todo-item">
												<div class="checkbox checkbox-pink">
													<input type="checkbox" id="checkbox02"/>
													<label for="checkbox02">Prepare The Conference Schedule</label>
												</div>
											</li>
											<li>
												<hr class="light-grey-hr"/>
											</li>
											<li class="todo-item">
												<div class="checkbox checkbox-warning">
													<input type="checkbox" id="checkbox03" checked/>
													<label for="checkbox03">Decide The Live Discussion Time</label>
												</div>
											</li>
											<li>
												<hr class="light-grey-hr"/>
											</li>
											<li class="todo-item">
												<div class="checkbox checkbox-success">
													<input type="checkbox" id="checkbox04" checked/>
													<label for="checkbox04">Prepare For The Next Project</label>
												</div>
											</li>
											<li>
												<hr class="light-grey-hr"/>
											</li>
											<li class="todo-item">
												<div class="checkbox checkbox-danger">
													<input type="checkbox" id="checkbox05" checked/>
													<label for="checkbox05">Finish Up AngularJs Tutorial</label>
												</div>
											</li>
											<li>
												<hr class="light-grey-hr"/>
											</li>
											<li class="todo-item">
												<div class="checkbox checkbox-purple">
													<input type="checkbox" id="checkbox06" checked/>
													<label for="checkbox06">Finish Infinity Project</label>
												</div>
											</li>
											<li>
												<hr class="light-grey-hr"/>
											</li>
										</ul>
										<!-- /Todo-List -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<!-- /Right Sidebar Menu -->
		
		
		
		<!-- Right Sidebar Backdrop -->
		<div class="right-sidebar-backdrop"></div>
		<!-- /Right Sidebar Backdrop -->

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">

				<div class="row">
					<div class="col-lg-3 col-xs-12">
						<div class="panel panel-default card-view  pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body  pa-0">
									<div class="profile-box">
										<div class="profile-cover-pic">
											<div class="fileupload btn btn-default">
												<span class="btn-text">edit</span>
												<input class="upload" type="file">
											</div>
											<div class="profile-image-overlay"></div>
										</div>
										<div class="profile-info text-center">
											<div class="profile-img-wrap">
												<img class="inline-block mb-10" src="../img/mock1.jpg" alt="user"/>
												<div class="fileupload btn btn-default">
													<span class="btn-text">edit</span>
													<input class="upload" type="file">
												</div>
											</div>	
											<h5 class="block mt-10 mb-5 weight-500 capitalize-font txt-success">Madalyn Rascon</h5>
											<h6 class="block capitalize-font pb-20">Developer Geek</h6>
										</div>	
										<div class="social-info">
											<div class="row">
												<div class="col-xs-4 text-center">
													<span class="counts block head-font"><span class="counter-anim">345</span></span>
													<span class="counts-text block">post</span>
												</div>
												<div class="col-xs-4 text-center">
													<span class="counts block head-font"><span class="counter-anim">246</span></span>
													<span class="counts-text block">followers</span>
												</div>
												<div class="col-xs-4 text-center">
													<span class="counts block head-font"><span class="counter-anim">898</span></span>
													<span class="counts-text block">tweets</span>
												</div>
											</div>
											<!--button class="btn btn-success btn-block  btn-anim mt-30" data-toggle="modal" data-target="#myModal"><i class="fa  fa-plus"></i><span class="btn-text">Add Member</span></button-->


                          <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success btn-block  btn-anim mt-30"><i class="fa  fa-plus"></i><span class="btn-text">Add User</button>  

                          
							
								
								
									
										<button alt="alert" class="img-responsive model_img" id="sa-success">Add</button> 
									
								
							
						
                     
											
											<div id="myModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
															<h5 class="modal-title" id="myModalLabel">Edit Profile</h5>
														</div>
														<div class="modal-body">
															<!-- Row -->
															<div class="row">
																<div class="col-lg-12">
																	<div class="">
																		<div class="panel-wrapper collapse in">
																			<div class="panel-body pa-0">
																				<div class="col-sm-12 col-xs-12">
																					<div class="form-wrap">
																						<form action="#">
																							<div class="form-body overflow-hide">
																								<div class="form-group">
																									<label class="control-label mb-10" for="exampleInputuname_1">Name</label>
																									<div class="input-group">
																										<div class="input-group-addon"><i class="icon-user"></i></div>
																										<input type="text" class="form-control" id="exampleInputuname_1" placeholder="willard bryant">
																									</div>
																								</div>
																								<div class="form-group">
																									<label class="control-label mb-10" for="exampleInputEmail_1">Email address</label>
																									<div class="input-group">
																										<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
																										<input type="email" class="form-control" id="exampleInputEmail_1" placeholder="xyz@gmail.com">
																									</div>
																								</div>
																								<div class="form-group">
																									<label class="control-label mb-10" for="exampleInputContact_1">Contact number</label>
																									<div class="input-group">
																										<div class="input-group-addon"><i class="icon-phone"></i></div>
																										<input type="email" class="form-control" id="exampleInputContact_1" placeholder="+102 9388333">
																									</div>
																								</div>
																								<div class="form-group">
																									<label class="control-label mb-10" for="exampleInputpwd_1">Password</label>
																									<div class="input-group">
																										<div class="input-group-addon"><i class="icon-lock"></i></div>
																										<input type="password" class="form-control" id="exampleInputpwd_1" placeholder="Enter pwd" value="password">
																									</div>
																								</div>
																								<div class="form-group">
																									<label class="control-label mb-10">Gender</label>
																									<div>
																										<div class="radio">
																											<input type="radio" name="radio1" id="radio_1" value="option1" checked="">
																											<label for="radio_1">
																											M
																											</label>
																										</div>
																										<div class="radio">
																											<input type="radio" name="radio1" id="radio_2" value="option2">
																											<label for="radio_2">
																											F
																											</label>
																										</div>
																									</div>
																								</div>
																								<div class="form-group">
																									<label class="control-label mb-10">Country</label>
																									<select class="form-control" data-placeholder="Choose a Category" tabindex="1">
																										<option value="Category 1">USA</option>
																										<option value="Category 2">Austrailia</option>
																										<option value="Category 3">India</option>
																										<option value="Category 4">UK</option>
																									</select>
																								</div>
																							</div>
																							<div class="form-actions mt-10">			
																								<button type="submit" class="btn btn-success mr-10 mb-30">Update profile</button>
																							</div>				
																						</form>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Save</button>
															<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
														</div>
													</div>
													<!-- /.modal-content -->
												</div>
												<!-- /.modal-dialog -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-9 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div  class="panel-body pb-0">
									<div  class="tab-struct custom-tab-1">
										<ul role="tablist" class="nav nav-tabs nav-tabs-responsive" id="myTabs_8">
											<li class="active" role="presentation"><a  data-toggle="tab" id="profile_tab_8" role="tab" href="#profile_8" aria-expanded="false"><span>ALL</span></a></li>
											<li  role="presentation" class="next"><a aria-expanded="true"  data-toggle="tab" role="tab" id="follo_tab_8" href="#follo_8"><span>AMO<span class="inline-block"></span></span></a></li>
											<li role="presentation" class=""><a  data-toggle="tab" id="photos_tab_8" role="tab" href="#photos_8" aria-expanded="false"><span>AWM</span></a></li>
											<li role="presentation" class=""><a  data-toggle="tab" id="earning_tab_8" role="tab" href="#earnings_8" aria-expanded="false"><span>AYM</span></a></li>
											<li role="presentation" class=""><a  data-toggle="tab" id="settings_tab_8" role="tab" href="#settings_8" aria-expanded="false"><span>Ambassadors</span></a></li>

											<li role="presentation" class=""><a  data-toggle="tab" id="earning_tab_8" role="tab" href="#earnings_8" aria-expanded="false"><span>Pathfinder</span></a></li>
											<li role="presentation" class=""><a  data-toggle="tab" id="settings_tab_8" role="tab" href="#settings_8" aria-expanded="false"><span>Adventurers</span></a></li>


						
                          <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                            <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                          </div>


										</ul>









										<div class="tab-content" id="myTabContent_8">
											<div  id="profile_8" class="tab-pane fade active in" role="tabpanel">
												<div class="col-md-12">
													<div class="pt-20">
													
														<div class="table-wrap">

															

															<div class="table-responsive">
																<!--table id="example" data-toggle="table" data-buttons-class='default btn-sm btn-outline' data-pagination="true" data-search="true" class="table table-hover display  pb-30" >
																	<thead-->

																<!--table id="example" data-toggle="table" data-buttons-class='default btn-sm btn-outline' data-pagination="true" data-search="true"   data-url="dist/json/bootstrap-table.json" data-height="280" data-mobile-responsive="true" data-sort-order="desc" class="table"-->

																	<!--table id="example" data-toggle="table" data-buttons-class='default btn-sm btn-outline' data-pagination="true" data-search="true" class="table table-hover display  pb-30" -->


                     <div id="employee_table">  
                          <table id="example"  data-toggle="table" data-sortable="true" data-buttons-class='default btn-sm btn-outline' data-pagination="true" data-search="true" class="table table-hover table-bordered display  pb-30" data-tablesaw-mode="columntoggle"  cellspacing="0">  
                            <thead>
													<tr>
														<th>#</th>
														<th>First Name</th>
														<th>Last Name</th>
														<th >Mem#</th>
														<th>Gender</th>
														<th>Phone</th>
														<th>Entry Mode</th>
														<th>Status</th>
														<th>Action </th>
														<!--th>Action</th-->

													</tr>
												</thead>  
                               <?php  
                               while($row = mysqli_fetch_array($result))  
                               {  
                               ?>  
                               <tr> 
                                    <td><?php echo $row["id"]; ?></td> 
                                    <td><?php echo $row["firstname"]; ?></td>
                                    <td><?php echo $row["lastname"]; ?></td>
                                    <td><?php echo $row["member_no"]; ?></td>
                                    <td><?php echo $row["gender"]; ?></td>
                                    <td><?php echo $row["phone"]; ?></td> 
                                    <td><?php echo $row["entry_mode"]; ?></td>
                                    <td><?php echo $row["comments_remarks"]; ?></td> 
                                    <!--td>
                                    	<input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" />
                                    </td-->

                                    <td>
                                    	<a name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="pr-10 edit_data" data-toggle="tooltip" title="edit" >
                                    		<i class="fa fa-pencil"></i>
                                    	</a>
                                    	<a  name="view" value="view" id="<?php echo $row["id"]; ?>" class="text-inverse view_data" title="view" data-toggle="tooltip">
                                    		<i class="fa  fa-eye"></i>
                                    	</a>
                                    	&nbsp;&nbsp;
                                    	<a  name="view" value="view" id="<?php echo $row["id"]; ?>" class="text-inverse view_data" title="send SMS" data-toggle="tooltip">
                                    		<i class="fa  fa-envelope"></i>
                                    	</a>
                                    </td>
                                    <!--td>
                                    	<a href="edit-vehicle.php?id=<?php echo $result->id;?>">
                                    		<i class="fa fa-edit"></i>
                                    	</a>
                                    &nbsp;&nbsp;
										<a href="manage-vehicles.php?del=<?php echo $result->id;?>" onclick="return confirm('Do you want to delete');">
											<i class="fa fa-close"></i>
										</a>
									<a data-toggle="modal" data-target="#myModal"></a>
									</td-->  
                                    <!--td><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td-->  
                               </tr>  
                               <?php  
                               }  
                               ?>  
                          </table>  
                     </div>

											<div id="myModal2" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
															<h5 class="modal-title" id="myModalLabel">Edit Member Details</h5>
														</div>

														

														
														<div class="modal-body">
															<!-- Row -->
															<div class="row">
																<div class="col-lg-12">
																	<div class="">
																		<div class="panel-wrapper collapse in">
																			<div class="panel-body pa-0">
																				<div class="col-sm-12 col-xs-12">
																					<div class="form-wrap">
																						<form action="#">
																							<div class="form-body overflow-hide">
																								<div class="form-group">
																									<label class="control-label mb-10" for="exampleInputuname_1">Name</label>
																									<div class="input-group">
																										<div class="input-group-addon"><i class="icon-user"></i></div>
																										<input type="text" class="form-control" id="exampleInputuname_1" placeholder="willard bryant">
																									</div>
																								</div>
																								<div class="form-group">
																									<label class="control-label mb-10" for="exampleInputEmail_1">Email address</label>
																									<div class="input-group">
																										<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
																										<input type="email" class="form-control" id="exampleInputEmail_1" placeholder="xyz@gmail.com">
																									</div>
																								</div>
																								<div class="form-group">
																									<label class="control-label mb-10" for="exampleInputContact_1">Contact number</label>
																									<div class="input-group">
																										<div class="input-group-addon"><i class="icon-phone"></i></div>
																										<input type="email" class="form-control" id="exampleInputContact_1" placeholder="+102 9388333">
																									</div>
																								</div>
																								<div class="form-group">
																									<label class="control-label mb-10" for="exampleInputpwd_1">Password</label>
																									<div class="input-group">
																										<div class="input-group-addon"><i class="icon-lock"></i></div>
																										<input type="password" class="form-control" id="exampleInputpwd_1" placeholder="Enter pwd" value="password">
																									</div>
																								</div>
																								<div class="form-group">
																									<label class="control-label mb-10">Gender</label>
																									<div>
																										<div class="radio">
																											<input type="radio" name="radio1" id="radio_1" value="option1" checked="">
																											<label for="radio_1">
																											M
																											</label>
																										</div>
																										<div class="radio">
																											<input type="radio" name="radio1" id="radio_2" value="option2">
																											<label for="radio_2">
																											F
																											</label>
																										</div>
																									</div>
																								</div>
																								<div class="form-group">
																									<label class="control-label mb-10">Country</label>
																									<select class="form-control" data-placeholder="Choose a Category" tabindex="1">
																										<option value="Category 1">USA</option>
																										<option value="Category 2">Austrailia</option>
																										<option value="Category 3">India</option>
																										<option value="Category 4">UK</option>
																									</select>
																								</div>
																							</div>
																							<div class="form-actions mt-10">			
																								<button type="submit" class="btn btn-success mr-10 mb-30">Update profile</button>
																							</div>				
																						</form>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Save</button>
															<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
														</div>
													</div>
													<!-- /.modal-content -->
												</div>
												<!-- /.modal-dialog -->
											</div>


											<!--Editor-->
											<div class="modal fade" id="editor-modal" tabindex="-1" role="dialog" aria-labelledby="editor-title">
											
											<div class="modal-dialog" role="document">
												<form class="modal-content form-horizontal" id="editor">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
														<h5 class="modal-title" id="editor-title">Add Row</h5>
													</div>
													<div class="modal-body">
														<input type="number" id="id" name="id" class="hidden"/>

														<div class="form-group required">
															<label for="firstName" class="col-sm-3 control-label">First Name</label>
															<div class="col-sm-9">
																<input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required>
															</div>
														</div>

														<div class="form-group required">
															<label for="lastName" class="col-sm-3 control-label">Last Name</label>
															<div class="col-sm-9">
																<input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required>
															</div>
														</div>

														<div class="form-group">
															<label for="jobTitle" class="col-sm-3 control-label">Job Title</label>
															<div class="col-sm-9">
																<input type="text" class="form-control" id="jobTitle" name="jobTitle" placeholder="Job Title">
															</div>
														</div>
														<div class="form-group required">
															<label for="startedOn" class="col-sm-3 control-label">Started On</label>
															<div class="col-sm-9">
																<input type="text" class="form-control" id="startedOn" name="startedOn" placeholder="Started On" required>
															</div>
														</div>
														<div class="form-group">
															<label for="dob" class="col-sm-3 control-label">Date of Birth</label>
															<div class="col-sm-9">
																<input type="text" class="form-control" id="dob" name="dob" placeholder="Date of Birth">
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-primary">Save changes</button>
														<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
													</div>
												</form>
											</div>
										</div>
										<!--/Editor-->



										</div>
									</div>
								</div>
							</div>
							
					</div>




											<!--div  id="dropdown_19" class="tab-pane fade " role="tabpanel"-->
												<div  id="follo_8" class="tab-pane fade" role="tabpanel">
																	<!-- Row -->
					<!--div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view"-->
								<!--div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Editing Table</h6>
									</div>
									<div class="clearfix"></div>
								</div-->
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="table-wrap">

<button alt="default" data-toggle="modal" data-target="#responsive-modal" class="btn btn-success btn-anim"><i class="fa fa-plus"></i><span data-toggle="modal" data-target="#responsive-modal" class="btn-text">Add Member</span></button>

											<table id="footable_2" class="table" data-paging="true" data-filtering="true" data-sorting="true">
												
												<thead>
												<tr>
													<th data-name="id" data-breakpoints="xs" data-type="number">ID</th>
													<th data-name="firstName">First Name</th>
													<th data-name="lastName">Last Name</th>
													<th data-name="jobTitle" data-breakpoints="xs">Job Title</th>
													<th data-name="startedOn" data-breakpoints="xs sm" data-type="date" data-format-string="MMMM Do YYYY">Started On</th>
													<th data-name="dob" data-breakpoints="xs sm md" data-type="date" data-format-string="MMMM Do YYYY">Date of Birth</th>
												</tr>
												</thead>
												<tbody>
												<tr data-expanded="true">
													<td>1</td>
													<td>Dennise</td>
													<td>Fuhrman</td>
													<td>High School History Teacher</td>
													<td>November 8th 2011</td>
													<td>July 25th 1960</td>
												</tr>
												<tr>
													<td>2</td>
													<td>Elodia</td>
													<td>Weisz</td>
													<td>Wallpaperer Helper</td>
													<td>October 15th 2010</td>
													<td>March 30th 1982</td>
												</tr>
												<tr>
													<td>3</td>
													<td>Raeann</td>
													<td>Haner</td>
													<td>Internal Medicine Nurse Practitioner</td>
													<td>November 28th 2013</td>
													<td>February 26th 1966</td>
												</tr>
												<tr>
													<td>4</td>
													<td>Junie</td>
													<td>Landa</td>
													<td>Offbearer</td>
													<td>October 31st 2010</td>
													<td>March 29th 1966</td>
												</tr>
												<tr>
													<td>5</td>
													<td>Solomon</td>
													<td>Bittinger</td>
													<td>Roller Skater</td>
													<td>December 29th 2011</td>
													<td>September 22nd 1964</td>
												</tr>
												<tr>
													<td>6</td>
													<td>Bar</td>
													<td>Lewis</td>
													<td>Clown</td>
													<td>November 12th 2012</td>
													<td>August 4th 1991</td>
												</tr>
												<tr>
													<td>7</td>
													<td>Usha</td>
													<td>Leak</td>
													<td>Ships Electronic Warfare Officer</td>
													<td>August 14th 2012</td>
													<td>November 20th 1979</td>
												</tr>
												<tr>
													<td>8</td>
													<td>Lorriane</td>
													<td>Cooke</td>
													<td>Technical Services Librarian</td>
													<td>September 21st 2010</td>
													<td>April 7th 1969</td>
												</tr>
												<tr>
													<td>9</td>
													<td>Nelly</td>
													<td>Lusher</td>
													<td>Broadcast Maintenance Engineer</td>
													<td>October 21st 2013</td>
													<td>February 16th 1983</td>
												</tr>
												<tr>
													<td>10</td>
													<td>Lorriane</td>
													<td>Cooke</td>
													<td>Technical Services Librarian</td>
													<td>September 21st 2010</td>
													<td>April 7th 1969</td>
												</tr>
												<tr>
													<td>11</td>
													<td>Nelly</td>
													<td>Lusher</td>
													<td>Broadcast Maintenance Engineer</td>
													<td>October 21st 2013</td>
													<td>February 16th 1983</td>
												</tr>
												</tbody>
											</table>

											<!--Editor-->
											<div class="modal fade" id="editor-modal" tabindex="-1" role="dialog" aria-labelledby="editor-title">
											
											<div class="modal-dialog" role="document">
												<form class="modal-content form-horizontal" id="editor">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
														<h5 class="modal-title" id="editor-title">Add Row</h5>
													</div>
													<div class="modal-body">
														<input type="number" id="id" name="id" class="hidden"/>
														<div class="form-group required">
															<label for="firstName" class="col-sm-3 control-label">First Name</label>
															<div class="col-sm-9">
																<input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required>
															</div>
														</div>
														<div class="form-group required">
															<label for="lastName" class="col-sm-3 control-label">Last Name</label>
															<div class="col-sm-9">
																<input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required>
															</div>
														</div>
														<div class="form-group">
															<label for="jobTitle" class="col-sm-3 control-label">Job Title</label>
															<div class="col-sm-9">
																<input type="text" class="form-control" id="jobTitle" name="jobTitle" placeholder="Job Title">
															</div>
														</div>
														<div class="form-group required">
															<label for="startedOn" class="col-sm-3 control-label">Started On</label>
															<div class="col-sm-9">
																<input type="text" class="form-control" id="startedOn" name="startedOn" placeholder="Started On" required>
															</div>
														</div>
														<div class="form-group">
															<label for="dob" class="col-sm-3 control-label">Date of Birth</label>
															<div class="col-sm-9">
																<input type="text" class="form-control" id="dob" name="dob" placeholder="Date of Birth">
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-primary">Save changes</button>
														<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
													</div>
												</form>
											</div>
										</div>
										<!--/Editor-->
									</div>
								</div>
							</div>
							<!--/div>
						</div>
					</div-->
					<!-- /Row -->
											</div>





											<div  id="dropdown_20" class="tab-pane fade" role="tabpanel">
												<p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater.</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
			</div>
			
			<!-- Footer -->
			<!--footer class="footer container-fluid pl-30 pr-30">
				<div class="row">
					<div class="col-sm-12">
						<p>2018 &copy; Droopy. Pampered by Hencework</p>
					</div>
				</div>
			</footer-->
			<!-- /Footer -->
			
		</div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->




<!--script src="../extra/jquery.min.js"></script>  
            
    <script src="../extra/bootstrap.min.js"></script--> 
	
<!-- JavaScript -->
  
    

    


      <!-- Vector Maps JavaScript -->
    <!--script src="../vendors/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../vendors/vectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="dist/js/vectormap-data.js"></script-->
    
  <!-- Data table JavaScript -->
  <!--script src="../vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script-->

    <!-- Flot Charts JavaScript -->
  <!--script src="../vendors/bower_components/Flot/excanvas.min.js"></script>
  <script src="../vendors/bower_components/Flot/jquery.flot.js"></script>
  <script src="../vendors/bower_components/Flot/jquery.flot.pie.js"></script>
  <script src="../vendors/bower_components/Flot/jquery.flot.resize.js"></script>
  <script src="../vendors/bower_components/Flot/jquery.flot.time.js"></script>
  <script src="../vendors/bower_components/Flot/jquery.flot.stack.js"></script>
  <script src="../vendors/bower_components/Flot/jquery.flot.crosshair.js"></script>
  <script src="../vendors/bower_components/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
  <script src="dist/js/flot-data.js"></script-->

   <!-- jQuery -->
    <script src="../vendors/bower_components/jquery/dist/jquery.min.js"></script>
  
  <!-- Slimscroll JavaScript -->
  <script src="dist/js/jquery.slimscroll.js"></script>

  <!-- simpleWeather JavaScript -->
  <script src="../vendors/bower_components/moment/min/moment.min.js"></script>
  <script src="../vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>
  <script src="dist/js/simpleweather-data.js"></script>
  
  <!-- Progressbar Animation JavaScript -->
  <script src="../vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
  <script src="../vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>
  
  <!-- Fancy Dropdown JS -->
  <script src="dist/js/dropdown-bootstrap-extended.js"></script>
  
  <!-- Sparkline JavaScript -->
  <script src="../vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>
  
  <!-- Owl JavaScript -->
  <script src="../vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
  
  <!-- Switchery JavaScript -->
  <script src="../vendors/bower_components/switchery/dist/switchery.min.js"></script>
  
  <!-- EChartJS JavaScript -->
  <script src="../vendors/bower_components/echarts/dist/echarts-en.min.js"></script>
  <script src="../vendors/echarts-liquidfill.min.js"></script>
  
  <!-- Toast JavaScript -->
  <script src="../vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>

    <!-- Switchery JavaScript -->
  <script src="../vendors/bower_components/switchery/dist/switchery.min.js"></script>
  
  <!-- Bootstrap Select JavaScript -->
  <script src="../vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
  
  <!-- Init JavaScript -->
  <!--script src="dist/js/init.js"></script-->
  <!--script src="dist/js/dashboard-data.js"></script-->
  <script src="dist/js/dashboard2-data.js"></script>
  <!--script src="dist/js/dashboard5-data.js"></script-->
  <!--script src="dist/js/dashboard4-data.js"></script-->


  <!-- Data table JavaScript -->
  <script src="../vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="../vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../vendors/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="dist/js/responsive-datatable-data.js"></script>

      <!-- Data table JavaScript -->
    <script src="../vendors/bower_components/moment/min/moment.min.js"></script>
    <script src="../vendors/bower_components/FooTable/compiled/footable.min.js" type="text/javascript"></script>
    <script src="dist/js/footable-data.js"></script>

    <!-- Form Wizard Data JavaScript -->
    <script src="dist/js/form-wizard-data.js"></script>

  <!-- DATA TABLE WAS HERE-->
      <!-- Data table JavaScript -->
  <script src="../vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="../vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../vendors/bower_components/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="../vendors/bower_components/jszip/dist/jszip.min.js"></script>
  <script src="../vendors/bower_components/pdfmake/build/pdfmake.min.js"></script>
  <script src="../vendors/bower_components/pdfmake/build/vfs_fonts.js"></script>
  
  <script src="../vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="../vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="dist/js/export-table-data.js"></script>

          <!-- jQuery -->
    <!--script src="../vendors3/jquery/dist/jquery.min.js"></script-->
    <!-- Bootstrap -->
    <!--script src="../vendors3/bootstrap/dist/js/bootstrap.min.js"></script-->


<!-- Bootstrap Core JavaScript -->
    <script src="../vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>


    <!-- FastClick -->
    <script src="../vendors3/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors3/nprogress/nprogress.js"></script>
    <!-- morris.js -->
    <script src="../vendors3/raphael/raphael.min.js"></script>
    <script src="../vendors3/morris.js/morris.min.js"></script>
    <!-- bootstrap-progressbar -->
    <!--script src="../vendors3/bootstrap-progressbar/bootstrap-progressbar.min.js"></script-->
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors3/moment/min/moment.min.js"></script>
    <script src="../vendors3/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>


    

		<!-- Sweet-Alert  -->
		<script src="../vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>
		
		<script src="dist/js/sweetalert-data.js"></script>



</body>

</html>


 <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Employee Details</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>

						<!--div id="successModal" class="col-lg-3 col-md-6 col-xs-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">success message</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div  class="panel-wrapper collapse in">
									<div  class="panel-body">
										<img src="../img/sweetalert/alert3.png" alt="alert" class="img-responsive model_img" id="sa-success"> 
									</div>
								</div>
							</div>
						</div-->

<!--div id="successModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">success message</h6>
									</div>
									<div class="clearfix"></div>
								</div>  
                <div class="modal-body" alt="alert" class="img-responsive model_img" id="sa-success">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div-->

 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Add User</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          
                          <label>First Name</label>  
                          <input type="text" name="firstname" id="firstname" class="form-control" />  
                           
                          
                          <label>Last Name</label>  
                          <input name="lastname" id="lastname" class="form-control"/>  
                          <br />  
                          <label>Select Gender</label>  
                          <select name="gender" id="gender" class="form-control">  
                               <option value="Male">Male</option>  
                               <option value="Female">Female</option>  
                          </select>  
                          <br />  
                          <label>Phone</label>  
                          <input type="text" name="phone" id="phone" class="form-control" />  
                          <br />  
                          <label>Member Number</label>  
                          <input type="text" name="member_no" id="member_no" class="form-control" />  
                          <br />


                          <!--label>Entry Mode</label>  
                          <input type="text" name="entry_mode" id="entry_mode" class="form-control" /--> 

                          <label>Entry Mode</label>  
                          <select name="entry_mode" id="entry_mode" class="form-control" placeholder="Select status">  
                               <option value="Baptism">Baptism</option>  
                               <option value="Transfer">Transfer</option>
                               <option value="Profession of Faith">Profession of Faith</option>     
                          </select>  
                          <br />



                          <!--br />
                          <label>Status</label>  
                          <input type="text" name="comments_remarks" id="comments_remarks" class="form-control" />  
                          <br /-->
                           <label>Select Status</label>  
                          <select name="comments_remarks" id="comments_remarks" class="form-control" placeholder="Select status">  
                               <option value="Present">Present</option>  
                               <option value="Missing">Missing</option>
                               <option value="Deceased">Deceased</option>  
                               <option value="Visitor">Visitor</option>
                               <option value="Disfellowshiped">Disfellowshiped</option>  
                               <option value="Out Transfer">Out Transfer</option>
                               <option value="Drop out">Drop out</option>   
                          </select>  
                          <br />  
                          <input type="hidden" name="userdetail_id" id="userdetail_id" />  
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success"   />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal"  >Close</button>
                        
                </div>  
           </div>  
      </div>  
 </div>  
 <script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var userdetail_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{userdetail_id:userdetail_id},  
                dataType:"json",  
                success:function(data){  
                     $('#firstname').val(data.firstname);  
                     $('#lastname').val(data.lastname);  
                     $('#gender').val(data.gender);  
                     $('#phone').val(data.phone);  
                     $('#member_no').val(data.member_no);
                     $('#entry_mode').val(data.entry_mode);  
                     $('#comments_remarks').val(data.comments_remarks);   
                     $('#userdetail_id').val(data.id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#firstname').val() == "")  
           {  
                alert("First Name is required");  
           }  
           else if($('#lastname').val() == '')  
           {  
                alert("Last Name is required");  
           }  
           else if($('#entry_mode').val() == '')  
           {  
                alert("Entry Mode is required");  
           }  
           else if($('#member_no').val() == '')  
           {  
                alert("Member Number is required");  
           }  
           else  
           {  
                $.ajax({  
                     url:"insert.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#employee_table').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', '.view_data', function(){  
           var userdetail_id = $(this).attr("id");  
           if(userdetail_id != '')  
           {  
                $.ajax({  
                     url:"select.php",  
                     method:"POST",  
                     data:{userdetail_id:userdetail_id},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
 });  
 </script>



 
  <?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "karengata_cims");  
 if(isset($_POST["userdetail_id"]))  
 {  
      $query = "SELECT * FROM userdetails WHERE id = '".$_POST["userdetail_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>

<?php  ?>