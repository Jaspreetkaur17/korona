<html>
<head>

	<?php include("csslink.php");?>
 
    <?php
    session_start();	
	include('../class/dataclass.php');
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
		 $contactno=$_POST['txtcontactno'];
		 $query="insert into register values('$regid','$regdate','$username','$password','$usertype','$contactno','$emailid')";
		 $result=$dc->saveRecord($query);
		 echo($query);
		 if($result)
		 {
		   $_SESSION['regid']=$regid;	
		   $_SESSION['username']=$username;
           header('location:../main/login.php');   		   
		  }
		 else
		 {
		   $msg="User Not Registered";
		 }
	  }
	  
	  if(isset($_POST['btncancel']))
	  {
		$_SESSION['regid']="";  
		header('location:../main/mainhome.php');   
	  }
	    
	
	
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
		  if(spnuname1.innerHTML!="" || spnpwd.innerHTML!="" || spnmobno.innerHTML!="" || spnemail.innerHTML!="")
	      {
			alert("Form is not valid");  
		    return false;
		  }
		  else
		  {
		    return true;
		  }
	  }
	  </script>

</head>
<body>
  <form name="frm" action="#" method="post" >
    <?php include("navbar.php"); ?>
	<?php include("menu.php"); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="login-form" style="box-shadow:5px 10px 18px #009efb75;width:700px;height:95%;padding-left:50px;margin-top:70px">
					<h2 style="padding-left:37%">REGISTER </h2>
					<div class="group-input">
						<label>User Name *</label> 
						<input placeholder="Enter User Name" id="username" name="txtusername" type="text" class="form-control" onChange="onlyalpha(this,spnuname1)" required>
							<span id="spnuname1"></span>

					</div>
					<div class="form-group">
						<label>Password *</label> 
						<input placeholder="Enter Password" id="password" name="txtpassword" type="password" class="form-control" onChange="checklength(this,spnpwd,3,10)" required>
						<span id="spnpwd"></span>

					</div>
					<div class="form-group">
						<label>User Type</label> 
						<select name="lstusertype" class="form-control" style="width:600px">
							<option>Hospital</option>
							<option>Patient</option>
							<option>Testing center</option>
							<option>Qurantine center</option>
	   					</select>
					</div>

					<div class="form-group">
						<label>contact no *</label> 
						<input placeholder="Enter Contactno" id="contactno" name="txtcontactno" type="text" class="form-control" onChange="checkmobileno(this,spnmobno) " required>
						<span id="spnmobno"></span>

					</div>
					<div class="group-input">
						<label>Email ID *</label> 
						<input placeholder="Enter Email" id="emailid" name="txtemailid" type="text" class="form-control" onChange="checkemail(this,spnemail)" required>
					<span id="spnemail"></span>
	
					</div>

					<div class="form-group" style="margin-top:15px;padding-right:100px;">
						<input type="submit" name="btnregister" value="register" class="btn btn-success" onclick="return checksubmit()">
						<input type="submit" name="btncancel" value="cancel" class="btn btn-danger" formnovalidate>
					</div>
					
				</div>
				<span id="lblmsg"></span>
			</div>
		</div>
	</div>
	<?php include("jslink.php"); ?>
  </form>
    
</body>
</form>

</html>
