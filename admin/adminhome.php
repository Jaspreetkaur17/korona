<html>
<head>
   <?php 
     session_start(); 
     include("../class/dataclass.php");
	 include("csslink.php"); 
   ?>
   
    <?php 
		
	 $dc=new dataclass();
   ?>
   
</head>
<body>
	<form name="frm" action="#" method="post">
		<div id="wrapper" class="admin-page">
			    <?php include("header.php"); ?>
				<?php include("sidebar.php"); ?>
				
				<?php
				
				$query="select count(regid) from register where usertype='qurantinecenter'";
				$totalqcenter=$dc->getcount($query);
				
				$query="select count(regid) from register where usertype='patient'";
				$totalpatient=$dc->getcount($query);
				
				$query="select count(regid) from register where usertype='hospital'";
				$totalhospital=$dc->getcount($query);
				
				$query="select count(regid) from register where usertype='testingcenter'";
				$totaltcenter=$dc->getcount($query);
				
				?>
		</div>		
		
		
		
	</form>
    <?php include("jslink.php") ?>
	
	<div class="page-wrapper">
            <div class="content">
               
                <div class="card-box profile-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#"><img class="avatar" src="assets/img/doctor-03.jpg" alt=""></a>
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0">Divya Bhadja</h3>
                                                <small class="text-muted">Admin</small>
                                                <div class="staff-id">Registration ID : 1</div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">Phone:</span>
                                                    <span class="text"><a href="#">+91 99255 23097</a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Email:</span>
                                                    <span class="text"><a href="#">divyabhadja@gmail.com</a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Birthday:</span>
                                                    <span class="text">29th January</span>
                                                </li>
                                                <li>
                                                    <span class="title">Address:</span>
                                                    <span class="text">Block no-33,Shiv Shakti soc no.3,Shantadevi Road,Navsari</span>
                                                </li>
                                                <li>
                                                    <span class="title">Gender:</span>
                                                    <span class="text">Female</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                    </div>
                </div>
				
				  <div class="row" style="padding:20px 1px 9px 9px">
					<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
							<span class="dash-widget-bg1"><i class="fa fa-bed"></i></span>
							<div class="dash-widget-info text-right">
								<span class="widget-title1">Quarantine Center </span>
								<h3> <?php echo($totalqcenter)?></h3>

							</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                            <div class="dash-widget-info text-right">
                                <span class="widget-title2">Patient </span>
								<h3> <?php echo($totalpatient)?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-hospital-o"></i></span>
                            <div class="dash-widget-info text-right">
                                <span class="widget-title3">Hospital </span>
								<h3> <?php echo($totalhospital)?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-stethoscope"></i></span>
                            <div class="dash-widget-info text-right">
                                <span class="widget-title4">Testing Center </span>
								<h3> <?php echo($totaltcenter)?></h3>
                            </div>
                        </div>
                    </div>
					</div>
		
					
				
		   
                            <h3 class="card-title">Functionality Of Admin</h3>
                            <div class="experience-box">
                                Hospital administrators are responsible for organizing and overseeing the health services and daily activities of a hospital or healthcare facility. They manage staff and budgets, communicate between departments, and ensure adequate patient care amongst other duties.
                            </div>
                        </div>
                    </div>
               
</body>
</html>
