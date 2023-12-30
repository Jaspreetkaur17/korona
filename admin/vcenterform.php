<html> 
<head>
   <?php 
     session_start(); 
     include("csslink.php");
     include("../class/dataclass.php");
   ?>
   
   <?php
   
     $vcenterid="";
	 $vcentername="";
	 $address="";
	 $cityid="";
	 $contactno="";
	 $emailid="";
	 $duration="";
	 $dc=new dataclass();
	 $msg1="";
	 $msg2="";
   ?>
   
   
   <?php
     if(isset($_SESSION['trans']))
	 {
	   $msg1=$_SESSION['trans']." Record";
	 }
	 
	 if($_SESSION['trans']=="update")
	 {
	   $vcenterid=$_SESSION['vcenterid'];
	   $query="select * from vaccinecenter where vcenterid='$vcenterid'";
	   $rw=$dc->getRecord($query);
	   $vcentername=$rw['vcentername'];
	   $address=$rw['address'];
	   $cityid=$rw['cityid'];
	   $contactno=$rw['contactno'];
	   $emailid=$rw['emailid'];
	   $duration=$rw['duration'];
	 }
	 
	 if(isset($_POST['btnsave']))
	 {
	    $vcentername=$_POST['txtvcentername'];
	    $address=$_POST['txtaddress'];
		$cityid=$_POST['txtcityid'];
		$contactno=$_POST['txtcontactno'];
		$emailid=$_POST['txtemailid'];
		$duration=$_POST['txtduration'];
		$query="";	 
	  if($_SESSION['trans']=="new")
	  {
	     $query="insert into vaccinecenter(vcentername,address,cityid,contactno,emailid,duration) values('$vcentername','$address','$cityid','$contactno','$emailid','$duration')";
	  }
	  if($_SESSION['trans']=="update")
	  {
	   $vcenterid=$_SESSION['vcenterid'];  
	   $query="update vaccinecenter set vcentername='$vcentername',address='$address',cityid='$cityid',contactno='$contactno',emailid='$emailid',duration='$duration' where vcenterid='$vcenterid'";
	  }
	  $result=$dc->saveRecord($query);
	  if($result)
	  {
		  $_SESSION['trans']="";
		  header('location:vcentershow.php');
	  }
	  else
	  {
	    $msg2="Record not saved...";
	  }
		
	 } 
	 	if(isset($_POST['btncancel']))
		 {
			header('location:vcentershow.php');
		 }

   ?>
   
      
   
   <style type="text/css">
     .form-control
	 {
		
	    border:1px solid grey!important;
		border-radius:8px!important;
	 }
   
   </style>
   
</head>
<body>
  <form name="frm" action="#" method="post">
    <div class="main-wrapper">
    <?php include("header.php"); ?>
	<?php include("sidebar.php"); ?>
	
      
		<div class="page-wrapper">
		   <div class="content" style="background-color:white">
		     <div class="row">
			  <div class="col-md-3"></div>
			  <div class="col-md-6">
			   <h2>vaccinecenter Form</h2>
			   <p><?php echo($msg1) ?></p>
			  </div>
			 </div> 
		  <div class="row">
		  <div class="col-md-3"></div>
		  <div class="col-md-6">
		  <div class="form-group">
		  <label>Vcenter Name</label> 
		  <input placeholder="Enter vcenter Name" id="vcentername" name="txtvcentername" type="text" class="form-control" autofocus value='<?php echo($vcentername); ?>'>
		 </div>
		  <div class="form-group">
		  <label> Address</label> 
		  <input placeholder="Enter Address" id="address" name="txtaddress" type="text" class="form-control" value='<?php echo($address); ?>'>
		 </div>
		 <div class="form-group">
		  <label>City id</label> 
		  <input placeholder="Enter Cityid" id="cityid" name="txtcityid" type="text" class="form-control" value='<?php echo($cityid); ?>'>
		</div>
		 <div class="form-group">
		  <label>Contact No</label> 
		  <input placeholder="Enter Contact No" id="contactno" name="txtcontactno" type="text" class="form-control" value='<?php echo($contactno); ?>'>
		</div>
		 <div class="form-group">
		  <label>Email id</label> 
		  <input placeholder="Enter Email Id" id="emailid" name="txtemailid" type="text" class="form-control" value='<?php echo($emailid); ?>'>
		</div>
		 <div class="form-group">
		  <label>Duration</label> 
		  <input placeholder="Enter Duration" id="duration" name="txtduration" type="text" class="form-control" value='<?php echo($duration); ?>'>
		</div>

		 <div class="form-group">
		    <input id="save" name="btnsave" type="submit" class="btn btn-success" value="Save">
			<input id="cancel" name="btncancel" type="submit" class="btn btn-danger" value="Cancel">
		 </div>
			  
			  </div>
			</div>  
		  
           </div>
      </div>
	  </form>
    <?php include("jslink.php") ?>
</body>

</html>