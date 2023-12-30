<html>
	<head>
	<title>Korona Care</title>
	<?php
	session_start();
	include('csslink.php');
	include('../class/dataclass.php');
	?>
	<?php
		$inqid="";
		$inqdate="";
		$custid="";
		$details="";
		$inqfor="";
		$response="";
		$status="";
		$msg="";
		$msg1="";
		$dc=new dataclass();
	?>
	<?php
	if(isset($_POST['btnsave']))
	{
		$inqdate=date('y-m-d');
		$patientid=$_SESSION['regid'];
		$details=$_POST['txtdetails'];
		$inqfor=$_POST['txtinqfor'];
		$status="pending";
		$query="insert into inquiry(inqdate,patientid,details,inqfor,status) values('$inqdate','$patientid','$details','$inqfor','$status')";
		echo($query); 
		$result=$dc->saveRecord($query);
		if($result)
		{
			$msg="inquiry Submit successfully";
		}
		else
		{
			$msg="inquiry not Submited";
		}
	}
	
	if(isset($_POST['btncancel']))
	{
	   header('location:userhome.php');
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
		<form name="frmhome" action="#" method="post">

    <?php include("navbar.php"); ?>
	  <?php include('menu.php');  ?>

	<div class="main-wrapper">
    	
      
		<div class="page-wrapper">
		<div class="row" style="margin-left:20px;margin-right:60px">
		<div class="col-md-1"></div>
		<div class="col-md-10 " style="background-color:white;margin:20px">
		   <div class="content" style="background-color:white;">
		   
		     <div class="row" >
			  <div class="col-md-9 offset-md-3">
			   <h2>Your Inquiry's Response</h2>
			  </div>
			 </div> 
		  <div class="row" >
		  <div class="col-md-3"></div>
		  <div class="col-md-6">
		  <div class="border border-secondary shadow mb-5 p-3" style="border-radius:25px">
		  <div class="form-group">

