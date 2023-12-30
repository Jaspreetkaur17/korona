<html> 
<head>
   <?php 
     session_start(); 
     include("csslink.php");
     include("../class/dataclass.php");
   ?>
   
   <?php
   
     $msgid="";
	 $msgdate="";
	 $msg="";
	 $contactno="";
	 $regid="";
	 $dc=new dataclass();
	 $msg1="";
	 $msg2="";
   ?>
   <?php
     if(isset($_SESSION['trans']))
	 {
	   $msg1=$_SESSION['trans']." Record";
	 }
	 if(isset($_POST['btnsave']))
	 {
		$_SESSION['regid']=1;
	    $msgdate=date('y-m-d');

        $msgdate=$_POST['txtmsgdate'];
	    $msg=$_POST['txtmsg'];
	    $contactno=$_POST['txtcontactno'];
		$regid=$_SESSION['regid'];
	   $query="";	 
	  if($_SESSION['trans']=="new")
	  {
	     $query="insert into message(msgdate,msg,contactno,regid) values('$msgdate','$msg','$contactno','$regid')";
	  }
	  $result=$dc->saveRecord($query);
	  if($result)
	  {
		  $_SESSION['trans']="";
		  header('location:msgshow.php');
	  }
	  else
	  {
	    $msg2="Record not saved...";
	  }
		
		
	 } 
	 if(isset($_POST['btncancel']))
	 {
		 header('location:msgshow.php');
	 }
   ?>
   <style type="text/css">
   label{
	  font-weight:bold; 
   }
     .form-control
	 {
		
	    border:1px solid grey!important;
		border-radius:8px!important;
	 }
   
   </style>
   
</head>







<body>
  <form name="frm" action="#" method="post">
    <?php include("header.php"); ?>
	<?php include("sidebar.php"); ?>

	<div class="main-wrapper">
    	
      
		<div class="page-wrapper">
		<div class="row" style="margin-left:20px;margin-right:60px">
		<div class="col-md-1"></div>
		<div class="col-md-10 " style="background-color:white;margin:20px">
		   <div class="content" style="background-color:white;">
		   
		     <div class="row" >
			  <div class="col-md-9 offset-md-3">

			   <h2>Message Form</h2>
			   <p><?php echo($msg1) ?></p>
			  </div>
			 </div> 
		  <div class="row">
		  <div class="col-md-3"></div>
		  <div class="col-md-6">
		  <div class="border border-secondary shadow mb-5 p-3" style="border-radius:25px">
		  
		  <div class="form-group">
		  <label>Message</label> 
		  <input placeholder="Enter message" id="msg" name="txtmsg" type="text" class="form-control" value='<?php echo($msg) ?>'>
		 </div>
		 <div class="form-group">
		  <label>Contact No</label> 
		  <input placeholder="Enter Contact No" id="contactno" name="txtcontactno" type="text" class="form-control" value='<?php echo($contactno) ?>'>
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