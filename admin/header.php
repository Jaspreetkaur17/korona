   <?php
   
   $username=$_SESSION['username'];
	
	if(isset($_POST['btnlg']))
	{
		session_destroy();
	header("location:../main/mainhome.php");
	}
	
	?>
   <div class="header">
			<div class="header-left">
				<a href="adminhome.php" class="logo">
					<img src="assets/img/logo.png" width="35" height="35" alt=""> <span>Preclinic</span>
				</a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);" style="padding:12px!important"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars" ></i></a>
            <ul class="nav user-menu float-right">
		
		    	
					<label style='padding:10px 20px 0px 0px;font-size:15px'><i class='fa fa-user'></i><b> <?php echo($username) ?></b></label>
			
				
                <li class="nav-item dropdown d-none d-sm-block">
                    				<div class="col-md-1">
				<button class="btn btn-danger" name="btnlg" type="submit"><i class="fa fa-sign-out"></i>LOGOUT</button>
				</div>
                    <div class="dropdown-menu notifications">
                        <div class="drop-scroll">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
											<span class="avatar">
												<img alt="John Doe" src="assets/img/user.jpg" class="img-fluid">
											</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
												<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
											</div>
                                        </div>
                                    </a>
                                </li>
                               
                               
                            </ul>
                        </div>
                
                    </div>
                </li>
                
            </ul>
            </div>
        </div>
     