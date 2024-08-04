<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="qE1YKrGVlrB1BjO1K9D4YIAxR1bSldcNqfFGY1jz">
    <meta name="keywords" content="admin, dashboard" />
    <meta name="author" content="DexignZone" />
    <meta name="robots" content="index, follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Some description for the page">
    <meta property="og:title" content="tixia : tixia School Admission Admin  Bootstrap & Laravel Template" />
    <meta property="og:description" content="Tixia Laravel | Dashboard">
    <meta property="og:image" content="https://tixia.dexignzone.com/laravel/social-image.png" />
    <meta name="format-detection" content="telephone=no">
    <title>Luca | Dashboard  </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="https://tixia.dexignzone.com/laravel/demo/images/favicon.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css"/>
    
         
                    <link href="https://tixia.dexignzone.com/laravel/demo/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet" type="text/css"/>
                    <link href="https://tixia.dexignzone.com/laravel/demo/vendor/chartist/css/chartist.min.css" rel="stylesheet" type="text/css"/>
                    <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet" type="text/css"/>
            
    
     
                    <link href="https://tixia.dexignzone.com/laravel/demo/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
                    <link href="https://tixia.dexignzone.com/laravel/demo/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>
                    <link href="https://tixia.dexignzone.com/laravel/demo/css/style.css" rel="stylesheet" type="text/css"/>
             

</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
        <div id="main-wrapper" class="">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="/dashboard" class="brand-logo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Luca
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
        

	<!--**********************************
		Header start
	***********************************-->
	<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
					<div class="dashboard_bar">
                            @yield('dashboard_bar')
                	</div>
                </div>

                <ul class="navbar-nav header-right">
					<li class="nav-item dropdown notification_dropdown">
						<div class="input-group search-area">
							<input type="text" class="form-control" placeholder="Search here...">
							<span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
						</div>
					</li>

                    <li class="nav-item dropdown notification_dropdown">
                        <div class="dropdown-menu dropdown-menu-end">
                            <div id="DZ_W_Notification1" class="widget-media dz-scroll p-3" style="height:380px;">
								<ul class="timeline">
									<li>
										<div class="timeline-panel">
											<div class="media me-2">
												<img alt="image" width="50" src="https://tixia.dexignzone.com/laravel/demo/images/avatar/1.jpg">
											</div>
								
										</div>
									</li>
								</ul>
							</div>
               
                        </div>
                    </li>
                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
						<img src="{{  asset('assets/admin_pics/'.$admin->profile_pic) }}" alt="">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="/profile" class="dropdown-item ai-icon">
                                <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <span class="ms-2">Profile </span>
                            </a>
                            <a href="/messages" class="dropdown-item ai-icon">
                                <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                <span class="ms-2">Inbox </span>
                            </a>
                            <form id="logout-form" action="{{ route('admin-logout') }}" method="POST" class="dropdown-item ai-icon" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-link" style="padding: 0; border: none; background: none; color: inherit; text-align: left;">
                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                <span class="ms-2">Logout</span>
                            </button>
</form>
                        </div>
                    </li>
                    					<li class="dropdown schedule-event primary">
						
					</li>
                </ul>
			</div>
        </nav>
   	 </div>
	</div>        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
    <div class="deznav-scroll">
		<ul class="metismenu" id="menu">
            <li><a class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="false">
					<i class="flaticon-381-networking"></i>
					<span class="nav-text">Dashboard</span>
				</a>
                <ul aria-expanded="false">
					<li><a href="/dashboard">Home</a></li>
				</ul>
            </li>
			<li>
				<a class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="false">
					<i class="flaticon-381-diploma"></i>
					<span class="nav-text">Orders</span>
				</a>
                <ul aria-expanded="false">
					<li><a href="/all_orders">All Orders</a></li>
					<li><a href="/pending">Pending Orders</a></li>
					<li><a href="/completed">Completed Orders</a></li>
				</ul>
            </li>
			<li>
				<a class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="false">
					<i class="flaticon-381-id-card"></i>
					<span class="nav-text">Products</span>
				</a>
                <ul aria-expanded="false">
					<li><a href="/add_product">Add New Product</a></li>
					<li><a href="/products">Manage Products</a></li>
					
					
				</ul>
            </li>
            <li>
				<a class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="false">
				<i class="flaticon-381-television"></i>
					<span class="nav-text">Users</span>
				</a>
                <ul aria-expanded="false">
                    <li><a href="/admin-list">Admins</a></li>
					<li><a href="/users">Customers</a></li>
                </ul>
            </li>
           
            <li><a class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="false">
					<i class="flaticon-381-layer-1"></i>
					<span class="nav-text">Pages</span>
				</a>
                <ul aria-expanded="false">
                    <li><a href="/login">Login</a></li>
                    <li><a href="admin-register">Register</a></li>
                </ul>
            </li>
        </ul>
		<div class="copyright">
			<p>Luca. Admin Dashboard <br/>© 2024 All Rights Reserved</p>
			<p class="op5">Made with <span class="heart"></span> by Luca</p>
		</div>
		</div>
	</div>
	<!--**********************************
		Sidebar end
	***********************************-->
	<div class="content-body rightside-event">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-12">
					<div id="user-activity" class="card">
					
							@yield('content')
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>   
                
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
    <div class="copyright">
        <p>Copyright © Designed &amp; Developed by <a href="/dashboard" target="_blank">Luca</a> 2024</p>
    </div>
	</div>        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
                            <script src="https://tixia.dexignzone.com/laravel/demo/vendor/global/global.min.js" type="text/javascript"></script>
                        <script src="https://tixia.dexignzone.com/laravel/demo/vendor/bootstrap-select/dist/js/bootstrap-select.min.js" type="text/javascript"></script>
                        <script src="https://tixia.dexignzone.com/laravel/demo/vendor/bootstrap-datetimepicker/js/moment.js" type="text/javascript"></script>
                        <script src="https://tixia.dexignzone.com/laravel/demo/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
                                        <script src="https://tixia.dexignzone.com/laravel/demo/vendor/chart.js/chart.bundle.min.js" type="text/javascript"></script>
                        <script src="https://tixia.dexignzone.com/laravel/demo/vendor/apexchart/apexchart.js" type="text/javascript"></script>
                        <script src="https://tixia.dexignzone.com/laravel/demo/vendor/peity/jquery.peity.min.js" type="text/javascript"></script>
                        <script src="https://tixia.dexignzone.com/laravel/demo/js/dashboard/dashboard-1.js" type="text/javascript"></script>
                                        <script src="https://tixia.dexignzone.com/laravel/demo/js/custom.min.js" type="text/javascript"></script>
                        <script src="https://tixia.dexignzone.com/laravel/demo/js/deznav-init.js" type="text/javascript"></script>
                        <script src="https://tixia.dexignzone.com/laravel/demo/js/demo.js" type="text/javascript"></script>
                        <script src="https://tixia.dexignzone.com/laravel/demo/js/styleSwitcher.js" type="text/javascript"></script>
            
	</body>
</html>