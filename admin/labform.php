<html> 
<head>
   <?php 
     session_start(); 
     include("csslink.php");
     include("../class/dataclass.php");
   ?>
   
   <?php
   
     $labid="";
	 $labname="";
	 $labtype="";
	 $address="";
	 $cityid="";
	 $head="";
	 $testtype="";
	 $managedby="";
	 $facilities="";
	 $contactno="";
	 $emailid="";
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
	   $labid=$_SESSION['labid'];
	   $query="select * from laboratory where labid='$labid'";
	   $rw=$dc->getRecord($query);
	   $labname=$rw['labname'];
	   $labtype=$rw['labtype'];
	   $address=$rw['address'];
	   $cityid=$rw['cityid'];
	   $head=$rw['head'];
	   $testtype=$rw['testtype'];
	   $managedby=$rw['managedby'];
	   $facilities=$rw['facilities'];
	   $contactno=$rw['contactno'];
	   $emailid=$rw['emailid'];
	 }
	 
	 if(isset($_POST['btnsave']))
	 {
	    $labname=$_POST['txtlabname'];
	    $labtype=$_POST['txtlabtype'];
	    $address=$_POST['txtaddress'];
		$cityid=$_POST['txtcityid'];
		$head=$_POST['txthead'];
		$testtype=$_POST['txttesttype'];
		$managedby=$_POST['txtmanagedby'];
		$facilities=$_POST['txtfacilities'];
		$contactno=$_POST['txtcontactno'];
		$emailid=$_POST['txtemailid'];
	   $query="";	 
	  if($_SESSION['trans']=="new")
	  {
	     $query="insert into laboratory(labname,labtype,address,cityid,head,testtype,managedby,facilities,contactno,emailid) values('$labname','$labtype','$address','$cityid','$head','$testtype','$managedby','$facilities','$contactno','$emailid')";
	  }
	  if($_SESSION['trans']=="update")
	  {
	   $labid=$_SESSION['labid'];  
	   $query="update laboratory set labname='$labname',labtype='$labtype',address='$address',cityid='$cityid',head='$head',testtype='$testtype',managedby='$managedby',facilities='$facilities',contactno='$contactno',emailid='$emailid' where labid='$labid'";
	  }
	  $result=$dc->saveRecord($query);
	  if($result)
	  {
		  $_SESSION['trans']="";
		  header('location:labshow.php');
	  }
	  else
	  {
	    $msg2="Record not saved...";
	  }
		
	 }
		if(isset($_POST['btncancel']))
		 {
			header('location:labshow.php');
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
			   <h2>Lab Form</h2>
			   <p><?php echo($msg1) ?></p>
			  </div>
			 </div> 
		  <div class="row">
		  <div class="col-md-3"></div>
		  <div class="col-md-6">
		  <div class="form-group">
		  <label>Lab Name</label> 
		  <input placeholder="Enter lab Name" id="labname" name="txtlabname" type="text" class="form-control" autofocus value='<?php echo($labname) ?>'>
		 </div>
		  <div class="form-group">
		  <label>Lab Type</label> 
		  <input placeholder="Enter Lab Type" id="labtype" name="txtlabtype" type="text" class="form-control" value='<?php echo($labtype) ?>'>
		 </div>
		 <div class="form-group">
		  <label>Address</label> 
		  <input placeholder="Enter Address" id="address" name="txtaddress" type="text" class="form-control" value='<?php echo($address) ?>'>
		 </div>
		 <div class="form-group">
		  <label>City Id</label> 
		  <input placeholder="Enter City Id" id="cityid" name="txtcityid" type="text" class="form-control" value='<?php echo($cityid) ?>'>
		 </div>
		 <div class="form-group">
		  <label>Head</label> 
		  <input placeholder="Enter Head" id="head" name="txthead" type="text" class="form-control" value='<?php echo($head) ?>'>
		 </div>
		 <div class="form-group">
		  <label>Test Type</label> 
		  <input placeholder="Enter Test Type" id="testtype" name="txttesttype" type="text" class="form-control" value='<?php echo($testtype) ?>'>
		 </div>
		 <div class="form-group">
		  <label>Managed by</label> 
		  <input placeholder="Enter Managed by" id="managedby" name="txtmanagedby" type="text" class="form-control" value='<?php echo($managedby) ?>'>
		 </div>
		 <div class="form-group">
		  <label>Facilities</label> 
		  <input placeholder="Enter Facilities" id="facilities" name="txtfacilities" type="text" class="form-control" value='<?php echo($facilities) ?>'>
		 </div>
		 <div class="form-group">
		  <label>Contact No</label> 
		  <input placeholder="Enter Contactno" id="contactno" name="txtcontactno" type="text" class="form-control" value='<?php echo($contactno) ?>'>
		 </div>
		  <div class="form-group">
		  <label>Email Id</label> 
		  <input placeholder="Enter Emailid" id="emailid" name="txtemailid" type="text" class="form-control" value='<?php echo($emailid) ?>'>
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

