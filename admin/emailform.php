<html> 
<head>
   <?php 
     session_start(); 
     include("csslink.php");
     include("../class/dataclass.php");
   
   
     $eid="";
	 $emaildate="";
	 $emailfrom="";
	 $emailadd=""; //reference to register table
	 $subject="";
	 $description="";
	 $dc=new dataclass();
	 $msg1="";
	 $msg2="";
   
     if(isset($_SESSION['trans']))
	 {
	   $msg1=$_SESSION['trans']." Record";
	 }
	 
	 if(isset($_POST['btnsave']))
	 {
		$emaildate=date('y-m-d');
		$emailfrom=$_SESSION['emailid'];
		$emailadd=$_POST['txtemailto']; //reference to register table
		$subject=$_POST['txtsubject'];
		$description=$_POST['txtdescription'];
		//$regid=$regid1;
		$query="";	 
	  if($_SESSION['trans']=="new")
	  {
	     $query="insert into email(emaildate,emailfrom,emailadd,subject,description) values('$emaildate','$emailfrom','$emailadd','$subject','$description')";
	  }
	  $result=$dc->saveRecord($query);
	  if($result)
	  {
		  $_SESSION['trans']="";
		  header('location:emailshow.php');
	  }
	  else
	  {
	    $msg2="Record not saved...";
	  }
		
	 } 
	 if(isset($_POST['btncancel']))
	 {
	 	 $_SESSION['trans']="";
		  header('location:emailshow.php');
	 }
   ?>
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

			   <h2>Email Form</h2>
			   <p><?php echo($msg1) ?></p>
			</div>
				</div> 
		<div class="row">
		  <div class="col-md-3"></div>
		  <div class="col-md-6">
		  <div class="border border-secondary shadow mb-5 p-3" style="border-radius:25px">
		   <div class="form-group">
		  
		  <label>Email To</label> 
		  		  <input type="text" class="form-control" name="txtemailto" value="" placeholder="Enter Email Address" autofocus onchange='checkemail(this,lblemail)'>
          <label id="lblemail"></label>
		 </div>
		 	   <div class="form-group">
		 <label><b>Subject</label>
		 <input type="text" class="form-control" name="txtsubject" value="" placeholder="Enter Subject" >
	   </div>
	   <div class="form-group">
		 <label>Description</label>
		 <textarea class="form-control" name="txtdescription" rows="4" > </textarea>
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