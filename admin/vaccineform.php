<html> 
<head>
   <?php 
     session_start(); 
     include("csslink.php");
     include("../class/dataclass.php");
   ?>
   
   <?php
   
     $vaccineid="";
	 $vaccinename="";
	 $duration="";
	 $dose="";
	 $cmpid="";
	 $img="";
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
	   $vaccineid=$_SESSION['vaccineid'];
	   $query="select * from vaccine where vaccineid='$vaccineid'";
	   $rw=$dc->getRecord($query);
	   $vaccinename=$rw['vaccinename'];
	   $duration=$rw['duration'];
	   $dose=$rw['dose'];
	   $cmpid=$rw['cmpid'];
	   $img=$rw['img'];

	 }

	 if(isset($_POST['btnsave']))
	 {
	    $vaccinename=$_POST['txtvaccinename'];
	    $duration=$_POST['txtduration'];
		$dose=$_POST['txtdose'];
		$cmpid=$_POST['txtcmpid'];
		$img=$_POST['txtimg'];
	   $query="";	 
	  if($_SESSION['trans']=="new")
	  {
	     $query="insert into vaccine(vaccinename,duration,dose,cmpid,img) values('$vaccinename','$duration','$dose','$cmpid','$img')";
	  }
	  if($_SESSION['trans']=="update")
	  {
	   $vaccineid=$_SESSION['vaccineid'];  
	   $query="update vaccine set vaccinename='$vaccinename',duration='$duration',dose='$dose',cmpid='$cmpid',img='$img' where vaccineid='$vaccineid'";
	  }
	  $result=$dc->saveRecord($query);
	  if($result)
	  {
		  $_SESSION['trans']="";
		  header('location:vaccineshow.php');
	  }
	  else
	  {
	    $msg2="Record not saved...";
	  }
		
	 } 
	 	if(isset($_POST['btncancel']))
		 {
			header('location:vaccineshow.php');
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
			   <h2>vaccine Form</h2>
			   <p><?php echo($msg1) ?></p>
			  </div>
			 </div> 
		  <div class="row">
		  <div class="col-md-3"></div>
		  <div class="col-md-6">
		  <div class="form-group">
		  <label>vaccine Name</label> 
		  <input placeholder="Enter vaccine Name" id="vaccinename" name="txtvaccinename" type="text" class="form-control" autofocus value='<?php echo($vaccinename) ?>'>
		 </div>
		  <div class="form-group">
		  <label>duration</label> 
		  <input placeholder="Enter duration" id="duration" name="txtduration" type="text" class="form-control" value='<?php echo($duration) ?>'>
		 </div>
		 <div class="form-group">
		  <label>dose</label> 
		  <input placeholder="Enter dose" id="dose" name="txtdose" type="text" class="form-control" value='<?php echo($dose) ?>'>
		 </div>
		 <div class="form-group">
		  <label>cmpid</label> 
		  <input placeholder="Enter cmpid" id="dose" name="txtcmpid" type="text" class="form-control" value='<?php echo($cmpid) ?>'>
		</div> 
		 <div class="form-group">
		  <label>img</label>
		  <input placeholder="Enter image" id="img" name="txtimg" type="text" class="form-control" value='<?php echo($img) ?>'>
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