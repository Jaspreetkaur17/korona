<html> 
<head>
   <?php 
     session_start(); 
     include("csslink.php");
     include("../class/dataclass.php");
   ?>
   
   <?php
   
     $tcenterid="";
	 $tcentername="";
     $tcentertype="";
	 $head="";
     $contactno="";
	 $emailid="";	 
	 $address="";
	 $cityid="";
	 $description="";
	 $typeoftesting="";
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
	   $tcenterid=$_SESSION['tcenterid'];
	   $query="select * from testingcenter where tcenterid='$tcenterid'";
	   $rw=$dc->getRecord($query);
	   $tcentername=$rw['tcentername'];	  
	   $tcentertype=$rw['tcentertype'];
	   $head=$rw['head'];
       $contactno=$rw['contactno'];
	   $emailid=$rw['emailid'];
	   $address=$rw['address'];
	   $cityid=$rw['cityid'];
       $description=$rw['description'];
	   $typeoftesting=$rw['typeoftesting'];
	 }
	 
	 if(isset($_POST['btnsave']))
	 {
	    $tcentername=$_POST['txttcentername'];
	   	$tcentertype=$_POST['txttcentertype'];
		$head=$_POST['txthead'];
        $contactno=$_POST['txtcontactno'];
		$emailid=$_POST['txtemailid'];
	    $address=$_POST['txtaddress'];
		$cityid=$_POST['lstcity'];
        $description=$_POST['txtdescription'];
		$typeoftesting=$_POST['txttypeoftesting'];

	   $query="";	 
	  if($_SESSION['trans']=="new")
	  {
	     $query="insert into testingcenter(tcentername,tcentertype,head,contactno,emailid,address,cityid,description,typeoftesting) values('$tcentername','$tcentertype','$head','$contactno','$emailid','$address','$cityid','$description','$typeoftesting')";
	  }
	  if($_SESSION['trans']=="update")
	  {
	   $tcenterid=$_SESSION['tcenterid'];  
	   $query="update testingcenter set tcentername='$tcentername',tcentertype='$tcentertype',head='$head',contactno='$contactno',emailid='$emailid',address='$address',cityid='$cityid',description='$description',typeoftesting='$typeoftesting' where tcenterid='$tcenterid'";
	  }
	  $result=$dc->saveRecord($query);
	  if($result)
	  {
		  $_SESSION['trans']="";
		  header('location:testingcentershow.php');
	  }
	  else
	  {
	    $msg2="Record not saved...";
	  }
		
	 } 
	 		if(isset($_POST['btncancel']))
		 {
			header('location:testingcentershow.php');
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

			   <h2>TESTING CENTER FORM</h2>
			   <p><?php echo($msg1) ?></p>
			  </div>
			 </div> 
		  <div class="row">
		  <div class="col-md-3"></div>
		  <div class="col-md-6">
		  <div class="border border-secondary shadow mb-5 p-3" style="border-radius:25px">
		  
		  <div class="form-group">
		  <label>Tcenter Name</label> 
		  <input placeholder="Enter tcenter Name" id="tcentername" name="txttcentername" type="text" class="form-control" autofocus value='<?php echo($tcentername); ?>'>
		 </div>
		 <div class="form-group">
		  <label>Tcenter type</label> 
		  <input placeholder="Enter tcenter type" id="tcentertype" name="txttcentertype" type="text" class="form-control" value='<?php echo($tcentertype); ?>'>
		 </div>
		 <div class="form-group">
		  <label>Head</label> 
		  <input placeholder="Enter head" id="headid" name="txthead" type="text" class="form-control" value='<?php echo($head); ?>'>
		</div>
        <div class="form-group">
		  <label>Contact No</label> 
		  <input placeholder="Enter contact no" id="contactid" name="txtcontactno" type="text" class="form-control" value='<?php echo($contactno); ?>'>
		</div>
		 <div class="form-group">
		  <label>Email Id</label> 
		  <input placeholder="Enter email id" id="emailid" name="txtemailid" type="text" class="form-control" value='<?php echo($emailid); ?>'>
		</div>
		<div class="form-group">
		  <label>Address</label> 
		  <input placeholder="Enter address" id="address" name="txtaddress" type="text" class="form-control" value='<?php echo($address); ?>'>
		 </div>
		 <div class="form-group">
		      <label>City Name</label> 
			  <select name="lstcity" class="form-control"> 
				<?php
				  $query="select cityid,cityname from city";
				  $tb=$dc->getTable($query);
				  while($rw=mysqli_fetch_array($tb))
				  {
					if($cityid==$rw['cityid'])
					  echo("<option value=".$rw["cityid"] ." selected>".$rw["cityname"]."</option>");
					else   
					 echo("<option value=".$rw["cityid"] .">".$rw["cityname"]."</option>");
				  }
				?>
			   </select>
		 </div>

		 <div class="form-group">
		  <label>Description</label> 
		  <input placeholder="Enter description" id="descriptionid" name="txtdescription" type="text" class="form-control" value='<?php echo($description); ?>'>
		</div>
		 <div class="form-group">
		  <label>Type Of Testing</label> 
		  <input placeholder="Enter typeoftesting" id="typeoftestingid" name="txttypeoftesting" type="text" class="form-control" value='<?php echo($typeoftesting); ?>'>
		</div>
		<div class="form-group">
		    <input id="save" name="btnsave" type="submit" class="btn btn-success" value="Save">
			<input id="cancel" name="btncancel" type="submit" class="btn btn-danger" value="Cancel">
		 </div>
		</div>

		 
			  
			  </div>
			</div>  
		  
           </div>
      </div>
	  </form>
    <?php include("jslink.php") ?>
</body>

</html>