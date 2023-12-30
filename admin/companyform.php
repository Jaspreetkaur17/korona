<html> 
<head>
   <?php 
     session_start(); 
     include("csslink.php");
     include("../class/dataclass.php");
   ?>
   
   <?php
   
     $cmpid="";
	 $cmpname="";
	 $contactno="";
	 $emailid="";
	 $head="";
	 $cmptype="";
	 $product="";

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
	   $cmpid=$_SESSION['cmpid'];
	   $query="select * from company where cmpid='$cmpid'";
	   $rw=$dc->getRecord($query);
	   $cmpname=$rw['cmpname'];
	   $contactno=$rw['contactno'];
	   $emailid=$rw['emailid'];
	   $head=$rw['head'];
	   $cmptype=$rw['cmptype'];
	   $product=$rw['product'];

	 }
	 
	 if(isset($_POST['btnsave']))
	 {
	    $cmpname=$_POST['txtcmpname'];
	    $contactno=$_POST['txtcontactno'];
	    $emailid=$_POST['txtemailid'];
		$head=$_POST['txthead'];
		$cmptype=$_POST['txtcmptype'];
		$product=$_POST['txtproduct'];

	   $query="";	 
	  if($_SESSION['trans']=="new")
	  {
	     $query="insert into company(cmpname,contactno,emailid,head,cmptype,product) values('$cmpname','$contactno','$emailid','$head','cmptype','product')";
	  }
	  if($_SESSION['trans']=="update")
	  {
	   $cmpid=$_SESSION['cmpid'];  
	   $query="update company set cmpname='$cmpname',contactno='$contactno',emailid='$emailid',head='$head',cmptype='$cmptype',product='$product' where cmpid='$cmpid'";
	  }
	  $result=$dc->saveRecord($query);
	  if($result)
	  {
		  $_SESSION['trans']="cmpid";
		  header('location:companyshow.php');
	  }
	  else
	  {
	    $msg2="Record not saved...";
	  }
		
	 } 
	  if(isset($_POST['btncancel']))
	  {
		$_SESSION['trans']="cancel";   
		header('location:companyshow.php');  
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
			   <h2>Company Form</h2>
			   <p><?php echo($msg1) ?></p>
			  </div>
			 </div> 
		  <div class="row">
		  <div class="col-md-3"></div>
		  <div class="col-md-6">
		  <div class="form-group">
		  <label>Company Name</label> 
		  <input placeholder="Enter Company Name" id="cmpname" name="txtcmpname" type="text" class="form-control" autofocus value='<?php echo($cmpname); ?>'>
		 </div>
		  <div class="form-group">
		  <label>contact no</label> 
		  <input placeholder="Enter Contact No" id="contactno" name="txtcontactno" type="text" class="form-control" value='<?php echo($contactno) ?>'>
		 </div>
		 <div class="form-group">
		  <label>emailid</label> 
		  <input placeholder="Enter Email Id" id="emailid" name="txtemailid" type="text" class="form-control" value='<?php echo($emailid) ?>'>
		 </div>
		 <div class="form-group">
		  <label>head</label> 
		  <input placeholder="Enter head" id="head" name="txthead" type="text" class="form-control" value='<?php echo($head) ?>'>
		  </div>
		  <div class="form-group">
		  <label>cmptype</label> 
		  <input placeholder="Enter companytype" id="cmptype" name="txtcmptype" type="text" class="form-control" value='<?php echo($cmptype) ?>'>
		  </div>
		 <div class="form-group">
		  <label>product</label> 
		  <input placeholder="Enter product" id="product" name="txtproduct" type="text" class="form-control" value='<?php echo($product) ?>'>
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