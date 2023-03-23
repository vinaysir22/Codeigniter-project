<!DOCTYPE html>
<html lang="en">
	<?php $session = session();?>
	<head>
		
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<title>Website Admin - Edit Banner</title>
		<link href="<?= base_url();?>/public/admin_vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
		<!-- Custom fonts for this template-->
		<link href="<?= base_url();?>/public/admin_vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">
		
		<!-- Custom styles for this template-->
		<link href="<?= base_url();?>/public/admin_css/sb-admin-2.min.css" rel="stylesheet">
		
	</head>
	
	<body id="page-top">
		
		<!-- Page Wrapper -->
		<div id="wrapper">
			
			<!-- Sidebar -->
			<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
				
				<!-- Sidebar - Brand -->
				<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url();?>/admin/profile">
					<div class="sidebar-brand-icon rotate-n-15">
						<i class="fas fa-laugh-wink"></i>
					</div>
					<div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
				</a>
				
				<!-- Divider -->
				<hr class="sidebar-divider my-0">
				
				<!-- Nav Item - Dashboard -->
				<li class="nav-item active">
					<a class="nav-link" href="<?php echo base_url();?>/admin/profile">
						<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
				</li>
				
				<!-- Divider -->
				<hr class="sidebar-divider">
				
				<!-- Nav Item - Pages Collapse Menu -->
				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
					aria-expanded="true" aria-controls="collapseTwo">
						<i class="fas fa-fw fa-cog"></i>
						<span>Pages</span>
					</a>
					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<h6 class="collapse-header">Custom Components:</h6>
							<a class="collapse-item" href="<?php echo base_url();?>/admin/banner_section/">Banner Section</a>
							<a class="collapse-item" href="<?php echo base_url();?>/admin/about_section/">About Section </a>
							<a class="collapse-item" href="<?php echo base_url();?>/admin/infobox_section/">InfoBox Section </a>
							<a class="collapse-item" href="<?php echo base_url();?>/admin/gallery_section/">Gallery Section </a>
							<a class="collapse-item" href="<?php echo base_url();?>/admin/team_section/">Team Section </a>
							<a class="collapse-item" href="<?php echo base_url();?>/admin/testimonials/">Testimonials </a>
							
						</div>
					</div>
				</li>
				
				
				<!-- Nav Item - Utilities Collapse Menu -->
				
				
				<!-- Divider -->
				<hr class="sidebar-divider">
				
				<!-- Heading -->
				<div class="sidebar-heading">
					Addons
				</div>
				
				<!-- Nav Item - Pages Collapse Menu -->
				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
					aria-expanded="true" aria-controls="collapsePages">
						<i class="fas fa-fw fa-folder"></i>
						<span>Pages</span>
					</a>
					<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<h6 class="collapse-header">Login Screens:</h6>
							<a class="collapse-item" href="login.html">Login</a>
							<a class="collapse-item" href="register.html">Register</a>
							<a class="collapse-item" href="forgot-password.html">Forgot Password</a>
							<div class="collapse-divider"></div>
							<h6 class="collapse-header">Other Pages:</h6>
							<a class="collapse-item" href="#">404 Page</a>
							<a class="collapse-item" href="#">Blank Page</a>
						</div>
					</div>
				</li>
				
				<!-- Divider -->
				<hr class="sidebar-divider d-none d-md-block">
				
				<!-- Sidebar Toggler (Sidebar) -->
				<div class="text-center d-none d-md-inline">
					<button class="rounded-circle border-0" id="sidebarToggle"></button>
				</div>
				
				
				
			</ul>
			<!-- End of Sidebar -->
			
			<!-- Content Wrapper -->
			<div id="content-wrapper" class="d-flex flex-column">
				
				<!-- Main Content -->
				<div id="content">
					
					<!-- Topbar -->
					<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
						
						<!-- Sidebar Toggle (Topbar) -->
						<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
							<i class="fa fa-bars"></i>
						</button>
						
						<!-- Topbar Search -->
						<form
						class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
							<div class="input-group">
								<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
								aria-label="Search" aria-describedby="basic-addon2">
								<div class="input-group-append">
									<button class="btn btn-primary" type="button">
										<i class="fas fa-search fa-sm"></i>
									</button>
								</div>
							</div>
						</form>
						
						<!-- Topbar Navbar -->
						<ul class="navbar-nav ml-auto">
							
							<div class="topbar-divider d-none d-sm-block"></div>
							
							<!-- Nav Item - User Information -->
							<li class="nav-item dropdown no-arrow">
								<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $session->get('firstname');?></span>
									<img class="img-profile rounded-circle"
									src="<?php echo base_url();?>/public/admin_img/undraw_profile.svg">
								</a>
								<!-- Dropdown - User Information -->
								<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
								aria-labelledby="userDropdown">
									<a class="dropdown-item" href="#">
										<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
										Profile
									</a>
									<a class="dropdown-item" href="#">
										<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
										Settings
									</a>
									<a class="dropdown-item" href="#">
										<i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
										Activity Log
									</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
										<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
										Logout
									</a>
								</div>
							</li>
							
						</ul>
						
					</nav>
					<!-- End of Topbar -->
					
					<!-- Begin Page Content -->
					<div class="container-fluid">
						
						<!-- Page Heading -->
						<div class="d-sm-flex align-items-center justify-content-between mb-4">
							<h1 class="h3 mb-0 text-gray-800">Gallery Section </h1>
							<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
							class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
						</div>
						
						<!-- Content Row -->
						<div class="row">
							
							<!-- Content Column -->
							<div class="col-xl-8 col-lg-7">
								<!-- Project Card Example -->
								
								<div class="card shadow mb-4">
									<div class="card-header py-3">
										<h6 class="m-0 font-weight-bold text-primary">Gallery Section Update Here</h6>
									</div>
									<form name="banner" action="<?= base_url('admin/gallery_upload');?>" method="post" enctype="multipart/form-data">	
										<div class="card-body">
											
											<h4 class="small font-weight-bold">Images Upload For Gallery</h4>
											<br/>
											<br/>
											<input type="file" name="images[]" multiple>
											<br/>
											<br/>
											<h4 class="small font-weight-bold">Save Data</h4>
											<input type="submit" name="submit" value="Save Information" class="btn-primary btn-sm">
											
										</div>
									</form>
								</div>
								
								<!-- Color System -->
								
							</div>
							
							<div class="col-xl-4 col-lg-5">
								
								<!-- Illustrations -->
								<div class="card shadow mb-4">
									<div class="card-header py-3">
										<h6 class="m-0 font-weight-bold text-primary">Photo Counter</h6>
									</div>
									<div class="card-body">
										<div class="text-center">
											<h2><?= count($images);?> Photos</h2>
										</div>
										
									</div>
								</div>
								
								<!-- Approach -->
							</div>
						</div>
						
						<div class="row">
							
							<div class="col-xl-12 col-lg-12">
								<!-- Project Card Example -->
								
								<div class="card shadow mb-4">
									<div class="card-header py-3">
										<h6 class="m-0 font-weight-bold text-primary">Gallery Section Update Here</h6>
									</div>
									
									<div class="card-body">
										
										<h4 class="small font-weight-bold">Images Gallery</h4>
										<?php 
											foreach($images as $item){ ?>
											<div class="img-thumbnail col-xl-3 float-left">
												<img src="<?=base_url();?>/public/uploaded_gallery/<?=$item['gallery_img'];?>" width="200" class="img-thumbnail"/>
												
												<a href="#" data-toggle="modal" data-target="#<?='delete_'.$item['id'];?>">
													<button type="button" class="close" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button></a>
													</div>
											
											<!---------------->
											
											
		
		<div class="modal fade"  id="<?= 'delete_'.$item['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Delete Records </h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">Are You Sure Want To Delete This Image</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<a class="btn btn-primary" href="<?=base_url('/admin/gallery_section/delete/');?>/<?=$item['id'];?>">Delete</a>
					</div>
				</div>
			</div>
		</div>
		
											<!---------->
											
											
										<?php }?>
									</div>
									
								</div>
								
								<!-- Color System -->
								
							</div>
							
							
						</div>
						
						
						
					</div>
					<!-- /.container-fluid -->
					
				</div>
				<!-- End of Main Content -->
				
				<!-- Footer -->
				<footer class="sticky-footer bg-white">
					<div class="container my-auto">
						<div class="copyright text-center my-auto">
							<span>Copyright &copy; Your Website 2021</span>
						</div>
					</div>
				</footer>
				<!-- End of Footer -->
				
			</div>
			<!-- End of Content Wrapper -->
			
		</div>
		<!-- End of Page Wrapper -->
		
		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
		</a>
		
		
		<!-- Logout Modal-->
		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<a class="btn btn-primary" href="<?php echo base_url();?>/admin/logout">Logout</a>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Bootstrap core JavaScript-->
		<script src="<?= base_url();?>/public/admin_vendor/jquery/jquery.min.js"></script>
		<script src="<?= base_url();?>/public/admin_vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="<?= base_url();?>/public/admin_vendor/datatables/jquery.dataTables.min.js"></script>
		<!-- Core plugin JavaScript-->
		<script src="<?= base_url();?>/public/admin_vendor/jquery-easing/jquery.easing.min.js"></script>
		<script src="<?= base_url();?>/public/admin_js/demo/datatables-demo.js"></script>
		<!-- Custom scripts for all pages-->
		<script src="j<?= base_url();?>/public/admin_s/sb-admin-2.min.js"></script>
		
		<!-- Page level plugins -->
		
	</body>
	
</html>