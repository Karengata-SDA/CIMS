<?php 
session_start();

error_reporting(E_ALL | E_STRICT);
require_once('conn.php');
//include('conn.php');

    include_once ('function.php');

    $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    $limit = 10;
    $startpoint = ($page * $limit) - $limit;

    //to make pagination
    $statement = "`people`"; // WHERE `comments_remarks` = 'Present'
    
    $logo = $_SESSION['logo'];
    
//    $act = $_GET['act'];
//    if($act=='success')
//    {
//          echo '<script type="text/javascript">
//          swal("", "บันทึกข้อมูลเรียบร้อยแล้ว", "success");
//          </script>';
//    }
    
    $rst = $_GET['rst'];
    
    $set = $_GET["set"];
    if($set == "")
    {
        $set = "all";
    }
    
    $ind = "real";
    //$set = "real";
    
    
?>

<?php include './header.php'; ?>

<body>
	<!--Preloader-->
	<!--div class="preloader-it">
		<div class="la-anim-1"></div>
	</div-->
	<!--/Preloader-->
    <div class="wrapper  theme-5-active pimary-color-green">
		<!-- Top Menu Items -->
		<?php include './titlebarmenu.php'; ?>
		<!-- /Top Menu Items -->
		
		<!-- Left Sidebar Menu -->
		<?php include './leftsidebarmenu.php';?>
		<!-- /Left Sidebar Menu -->
		
		<!-- Right Sidebar Menu -->
		<?php include './rightsidebarmenu.php'; ?>
		<!-- /Right Sidebar Menu -->
		
		
		
		<!-- Right Sidebar Backdrop -->
		<div class="right-sidebar-backdrop"></div>
		<!-- /Right Sidebar Backdrop -->

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
					
				<!-- Row -->
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
											<button class="btn btn-success btn-block  btn-anim mt-30" data-toggle="modal" href="#addnew"><i class="fa fa-pencil"></i><span class="btn-text">Add User </span></button>

											<!--span class="pull-left"><a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a></span-->


																						<!-- Add New -->
											    <!--div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											        <div class="modal-dialog">
											            <div class="modal-content">
											                <div class="modal-header">
											                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											                    <center><h4 class="modal-title" id="myModalLabel">Add New</h4></center>
											                </div>
											                <div class="modal-body">
															<div class="container-fluid">
															<form method="POST" id="add_user" action="addnew.php">
																<div class="row">
																	<div class="col-lg-2">
																		<label class="control-label" style="position:relative; top:7px;">Firstname:</label>
																	</div>
																	<div class="col-lg-10">
																		<input type="text" class="form-control" name="firstname">
																	</div>
																</div>
																<div style="height:10px;"></div>
																<div class="row">
																	<div class="col-lg-2">
																		<label class="control-label" style="position:relative; top:7px;">Lastname:</label>
																	</div>
																	<div class="col-lg-10">
																		<input type="text" class="form-control" name="lastname">
																	</div>
																</div>
																<div style="height:10px;"></div>
																<div class="row">
																	<div class="col-lg-2">
																		<label class="control-label" style="position:relative; top:7px;">Address:</label>
																	</div>
																	<div class="col-lg-10">
																		<input type="text" class="form-control" name="address">
																	</div>
																</div>
											                </div> 
															</div>
											                <div class="modal-footer">
											                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
											                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk" id="sa-success"></span> Save</a>
															</form>
											                </div>
															
											            </div>
											        </div>
											    </div-->


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
															<button alt="alert" class="img-responsive model_img" id="sa-success">Add</button>
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
				<!-- Row -->
				
					<div class="col-lg-9 col-xs-12">
						<div class="panel panel-default card-view panel-refresh">
							<div class="refresh-container">
								<div class="la-anim-1"></div>
							</div>
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">List of Requisitions</h6>
								</div>
								
								<div class="pull-right">
									<a href="javascript:void(0)" class="pull-left btn btn-success btn-xs mr-15">Add New</a>
									<a href="#" class="pull-left inline-block refresh mr-15">
										<i class="zmdi zmdi-replay"></i>
									</a>
									<a href="#" class="pull-left inline-block full-screen mr-15">
										<i class="zmdi zmdi-fullscreen"></i>
									</a>
									<div class="pull-left inline-block dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="zmdi zmdi-more-vert"></i></a>
										<ul class="dropdown-menu bullet dropdown-menu-right"  role="menu">
											<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-reply" aria-hidden="true"></i>option 1</a></li>
											<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-share" aria-hidden="true"></i>option 2</a></li>
											<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-trash" aria-hidden="true"></i>option 3</a></li>
										</ul>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body row pa-0">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_1" class="table  display table-hover border-none">
												<thead>
													<tr>
														<th>R. No</th>
														<th>Description</th>
														<th>Amount</th>
														
														<th>issue date</th>
														<th>due date</th>
														<th>Status</th>
														<th>View</th>
													</tr>
												</thead>

												<tbody>
													<tr>
														<td>#5012</td>
														<td>System Architect</td>
														<td>$205,500</td>
														
														<td>2011/04/25</td>
														<td>2012/12/02</td>
														<td>
															<span class="label label-danger">unpaid</span>
														</td>
														<td>
															<a href="#">
																<i class="fa fa-file-text-o" aria-hidden="true"></i>
															</a>	
														</td>
													</tr>
													<tr>
														<td>#5013</td>
														<td>Accountant</td>
														<td>$205,500</td>
														
														<td>2011/07/25</td>
														<td>2012/12/02</td>
														<td>
															<span class="label label-success">paid</span>
														</td>
														<td>
															<a href="#">
																<i class="fa fa-file-text-o" aria-hidden="true"></i>
															</a>	
														</td>
													</tr>
													<tr>
														<td>#5014</td>
														<td>Junior Technical Author</td>
														<td>$205,500</td>
														
														<td>2009/01/12</td>
														<td>2012/12/02</td>
														<td>
															<span class="label label-warning">pending</span>
														</td>
														<td>
															<a href="#">
																<i class="fa fa-file-text-o" aria-hidden="true"></i>
															</a>	
														</td>
													</tr>
													<tr>
														<td>#5015</td>
														<td>Senior Javascript Developer</td>
														<td>$205,500</td>
														
														<td>2012/03/29</td>
														<td>2012/12/02</td>
														<td>
															<span class="label label-success">paid</span>
														</td>
														<td>
															<a href="#">
																<i class="fa fa-file-text-o" aria-hidden="true"></i>
															</a>	
														</td>
													</tr>
													<tr>
														<td>#5010</td>
														<td>Integration Specialist</td>
														<td>$205,500</td>
														
														<td>2010/10/14</td>
														<td>2014/09/15</td>
														<td>
															<span class="label label-success">paid</span>
														</td>
														<td>
															<a href="#">
																<i class="fa fa-file-text-o" aria-hidden="true"></i>
															</a>	
														</td>
													</tr>
													<tr>
														<td>#5011</td>
														<td>Javascript Developer</td>
														<td>$205,500</td>
														
														<td>2009/09/15</td>
														<td>2013/09/15</td>
														<td>
															<span class="label label-success">paid</span>
														</td>
														<td>
															<a alt="default" data-toggle="modal" data-target=".bs-example-modal-lg" >
																<i class="fa fa-file-text-o" aria-hidden="true"></i>
															</a>	
														</td>
													</tr>
													
												</tbody>
											</table>
										</div>
									</div>	
								</div>	
							</div>
						</div>
					</div>

<?php include ('modal-requisition.php'); ?>


				</div>
				<!-- /Row -->
				
				<!-- Row -->
				
				<!-- /Row -->
			
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
        <?php include('add_modal.php'); ?>

    </div>
    <!-- /#wrapper -->
<?php                                                                          
include 'footer.php'; 
?>