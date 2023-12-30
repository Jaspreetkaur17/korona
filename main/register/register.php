

<!DOCTYPE html>
<html>
<head>
 <?php
    session_start();	
	include('../../class/dataclass.php');
	?>
	
	<?php
	  $regid="";
	  $regdate="";
	  $username="";
	  $password="";
	  $usertype="";
	  $contactno="";
	  $emailid="";
	  $msg="";
	  $dc=new dataclass();
	?>
	
	<?php
	
	  if(isset($_POST['btnregister']))
	  {
	     $regid=$dc->primary("select max(regid) from register");  
		 $regdate=date('y-m-d');
		 $username=$_POST['txtusername'];
		 $password=$_POST['txtpassword'];
		 $usertype=$_POST['lstusertype'];
		 $emailid=$_POST['txtemailid'];
		 $contactno=$_POST['txtcontact'];
		 $query="insert into register values('$regid','$regdate','$username','$password','$usertype','$contactno','$emailid')";
		 $result=$dc->saveRecord($query);
		 echo($query);
		 if($result)
		 {
		   $_SESSION['regid']=$regid;	
		   $_SESSION['username']=$username;
           header('location:../login/login.php');   		   
		  }
		 else
		 {
		   $msg="User Not Registered";
		 }
	  }
	  
	  if(isset($_POST['btncancel']))
	  {
		$_SESSION['regid']="";  
		header('location:../main/home.php');   
	  }
	    
	
	
	?>
	
	
<title> Register Form </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Awesome Register Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font --> 
<link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i&amp;subset=latin-ext" rel="stylesheet">
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div data-vide-bg="video/awesome">
	<div class="main-w3layouts center-container">
		<h1>Sign Up</h1>
		<div class="main-agileinfo">
			<div class="agileits-top"> 
				<form action="#" method="post"> 
					<i class="fa fa-user-o" aria-hidden="true"></i>
					<input class="text" type="text" name="txtusername" placeholder="Username" required="">
					<input class="text" type="password" name="txtpassword" placeholder="Password" required="">
					<div>
						<select name="lstusertype" class="text">
							<option>Admin</option>
							<option>Hospital</option>
							<option>Patient</option>
							<option>Testingcenter</option>
	   					</select>
					</div>
					<input class="text" type="text" name="txtcontact" placeholder="Contactno" required="">

					<input class="text email" type="email" name="txtemailid" placeholder="Email" required="">

					
					<div class="wthree-text">  
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>I Agree To The Terms & Conditions</span> 
						</label>  
						<div class="clear"> </div>
					</div>   
					<input type="submit" value="REGISTER" name="btnregister">
					<input type="submit" value="cancel" name="btncancel">
				</form>
			</div>	 
		</div>	
		<!-- copyright -->
		<div class="w3copyright-agile">
			<h2>© 2017 Awesome Register Form. All rights reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a></h2>
		</div>
		<!-- //copyright -->	
	</div>	
	</div>	
	<!-- //main --> 
	<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script src="js/jquery.vide.min.js"></script>
<!-- //js -->

</body>
</html>