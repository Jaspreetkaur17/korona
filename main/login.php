<html>
<head>

	<?php
    session_start();	
	include("csslink.php");
    include('../class/dataclass.php');
	
	?>

   <style type="text/css">
     .form-control
	 {
		
	    border:1px solid grey!important;
		border-radius:8px!important;
	 }
	 input[type=text],[type=password]
	 {
		 width:600px;
	 }
	.login-form
	 {
		
	    border:3px solid #009efb25!important;
		border-radius:8px!important;
		width:800px;
	 }
	 .bg-light {
     background: #009efb25 !important;
	}
	label{
		
	}
   </style>
      <script>
   function checksubmit()
	  {
   function checksubmit()
	  {
		  if(spnuname1.innerHTML!="" || spnpwd.innerHTML!="" )
	      {
			alert("Form is not valid");  
		    return false;
		  }
		  else
		  {
		    return true;
		  }
	  }

	  }
	  </script>

    
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
		$query="select regid,username,password,usertype,emailid from register where username='$username'";
	    $rw=$dc->getRecord($query);
		if($rw)
		{
		  if($password==$rw['password'])
		  { 
			$_SESSION['emailid']=$rw['emailid'];
			$_SESSION['regid']=$rw['regid'];	
		    $_SESSION['username']=$rw['username'];  
			if($rw['usertype']=="admin")
			{
			  header("location:../admin/adminhome.php");
			}
			elseif($rw['usertype']=="patient")
			{
			  header("location:../patient/patienthome.php");
			}
			elseif($rw['usertype']=="hospital")
			{
			  header("location:../hospital/hospitalhome.php");
			}
			elseif($rw['usertype']=="testingcenter")
			{
			  header("location:../testingcenter/testinghome.php");
			}			
			elseif($rw['usertype']=="qurantinecenter")
			{
			  header("location:../qcenter/qcenterhome.php");
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
	  
	  
	  	 if(isset($_POST['btncancel']))
		 {
			header('location:mainhome.php');
		 }

	  
	?>





</head>
<body>
  <form name="frm" action="#" method="post">
    <?php include("navbar.php"); ?>
	<?php include("menu.php"); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="login-form" style="box-shadow:5px 10px 18px #009efb75;width:700px;height:400px;padding-left:50px;margin-top:70px">
					<h2 style="padding-left:37%">LOGIN </h2>
					<div class="group-input">
						<label>User Name *</label> 
						<input placeholder="Enter User Name" id="username" name="txtusername" type="text" class="form-control" onChange="onlyalpha(this,spnuname1)" required>
						<span id="spnuname1"></span>

					</div>
					
					<div class="form-group">
						<label>Password *</label> 
						<input placeholder="Enter Password" id="password" name="txtpassword" type="password" class="form-control" onChange="checklength(this,spnpwd,3,10)" required >
						<label id="spnpwd"></label>
					</div>
					<div class="form-group">
						<input type="submit" name="btnlogin" value="login" class="btn btn-success"onclick="return checksubmit()">
						<input type="submit" name="btncancel" value="cancel" class="btn btn-danger" formnovalidate>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<?php include("jslink.php"); ?>
  </form>
    
</body>
</form>

</html>
