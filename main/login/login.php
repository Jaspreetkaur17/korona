<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Awesome Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<!-- //css files -->
<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Philosopher:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,vietnamese" rel="stylesheet">
<!-- //web-fonts -->
    <?php
    session_start();	
	include('../../class/dataclass.php');
	?>
	
	<?php
	  $regid="";
	  $username="";
	  $password="";
	  $msg="";
	  $dc=new dataclass();
	?>
	
	<?php
	  if(isset($_SESSION['regid']))
	  {
	    $regid=$_SESSION['regid']; 
	    $username=$_SESSION['username'];
	  }
	  
	  if(isset($_POST['btnlogin']))
      {
		$username=$_POST['txtusername'];  
		$password=$_POST['txtpassword'];  
		$query="select regid,username,password,usertype from register where username='$username'";
	    $rw=$dc->getRecord($query);
		if($rw)
		{
		  if($password==$rw['password'])
		  { 
			$_SESSION['regid']=$rw['regid'];	
		    $_SESSION['username']=$username;  
			if($rw['usertype']=="admin")
			{
			  header("location:../../admin/adminhome.php");
			}
			elseif($rw['usertype']=="patient")
			{
			  header("location:../../patient/patienthome.php");
			}
			elseif($rw['usertype']=="hospital")
			{
			  header("location:../../hospital/hospitalhome.php");
			}
			elseif($rw['usertype']=="testingcenter")
			{
			  header("location:../../testingcenter/testinghome.php");
			}			
		  }
		  else
		  {
		   $msg="Invalid Password";
		  }
		}
		else
		{
		  $msg="Invalid User Name";
		}
	  }
	  
	?>

</head>
<body>
<form action="#" method="post">
<div data-vide-bg="video/social2">

	<div class="center-container">
		<!--header-->
		<div class="header-w3l">
			<h1> Sign in</h1>
		</div>
		<!--//header-->
		<!--main-->
		<div class="main-content-agile">
			<div class="wthree-pro">
				<h2>Signin Now</h2>
			</div>
			<div class="sub-main-w3">	
				
					<input placeholder="Username" name="txtusername" type="text" value="" >
					<span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span>
					<input placeholder="Usertype" name="txtusertype" type="text" value="" >
					<span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span>
					<input  placeholder="Password" name="txtpassword" type="password" value="" >
					<span class="icon2"><i class="fa fa-unlock" aria-hidden="true"></i></span>
					<div class="rem-w3">
						<span class="check-w3"><input type="checkbox" />Remember Me</span>
						<a href="#">Forgot Password?</a>
						<div class="clear"></div>
					</div>
					<div class="navbar-right social-icons"> 
							<ul>
								<li><a href="#" class="fa fa-facebook icon-border facebook"> </a></li>
								<li><a href="#" class="fa fa-twitter icon-border twitter"> </a></li>
								<li><a href="#" class="fa fa-google-plus icon-border googleplus"> </a></li> 
								<li><a href="#" class="fa fa-pinterest icon-border rss"> </a></li>
							</ul>  
						</div>
					<input type="submit" value="Login" name="btnlogin">
					<input type="submit" value="Cancel" name="btncancel">

				
			</div>
		</div>
		<!--//main-->
		<!--footer-->
		<div class="footer">
			<p>&copy; 2021 Login Form. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
		</div>
		<!--//footer-->
	</div>
</div>
<!-- js -->

<!-- //js -->
</form>
</body>
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script src="js/jquery.vide.min.js"></script>
</html>