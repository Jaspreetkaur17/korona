<html> 
<head>
   <?php 
     session_start(); 
     include("csslink.php");
     include("../class/dataclass.php");
   ?>
   
   <?php
   
     $hospitalid="";
	 $hospitalname="";
	 $address="";
	 $cityid="";
	 $contactno="";
	 $emailid="";
	 $website="";
	 $hospitaltype="";
	 $facilities="";
	 $service="";
	 $ventilator="";
	 $location="";
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
	   $hospitalid=$_SESSION['hospitalid'];
	   $query="select * from hospital where hospitalid='$hospitalid'";
	   $rw=$dc->getRecord($query);
	   $hospitalname=$rw['hospitalname'];
	   $address=$rw['address'];
	   $cityid=$rw['cityid'];
	   $contactno=$rw['contactno'];
	   $emailid=$rw['emailid'];
	   $website=$rw['website'];
	   $hospitaltype=$rw['hospitaltype'];
	   $facilities=$rw['facilities'];
	   $service=$rw['service'];
	   $ventilator=$rw['ventilator'];
	   $location=$rw['location'];
	   $img=$rw['img'];

	 }
	 
	 if(isset($_POST['btnsave']))
	 {
	    $hospitalname=$_POST['txthospitalname'];
	    $address=$_POST['txtaddress'];
		$cityid=$_POST['lstcity'];
		$contactno=$_POST['txtcontactno'];
		$emailid=$_POST['txtemailid'];
		$website=$_POST['txtwebsite'];
		$hospitaltype=$_POST['txthospitaltype'];
		$facilities=$_POST['txtfacilities'];
		$service=$_POST['txtservice'];
		$ventilator=$_POST['txtventilator'];
		$location=$_POST['txtlocation'];
		$img=$_POST['txtimg'];

	   $query="";	 
	  if($_SESSION['trans']=="new")
	  {
	     $query="insert into hospital(hospitalname,address,cityid,contactno,emailid,website,hospitaltype,facilities,service,ventilator,location,img) values('$hospitalname','$address','$cityid','$contactno','$emailid','$website','$hospitaltype','$facilities','$service','$ventilator','$location','$img')";
	  }
	  if($_SESSION['trans']=="update")
	  {
	   $hospitalid=$_SESSION['hospitalid'];  
	   $query="update hospital set hospitalname='$hospitalname',address='$address',cityid='$cityid',contactno='$contactno',emailid='$emailid',website='$website',hospitaltype='$hospitaltype',facilities='$facilities',service='$service',ventilator='$ventilator',location='$location',img='$img' where hospitalid='$hospitalid'";
	  }
	  $result=$dc->saveRecord($query);
	  if($result)
	  {
		  $_SESSION['trans']="";
		  header('location:hospitalshow.php');
	  }
	  else
	  {
	    $msg2="Record not saved...";
	  }
		
	 } 
	  if(isset($_POST['btncancel']))
		 {
			header('location:hospitalshow.php');
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

			   <h2>Hospital Form</h2>
			   <p><?php echo($msg1) ?></p>
			  </div>
			 </div> 
		  <div class="row">
		  <div class="col-md-3"></div>
		  <div class="col-md-6">
		  <div class="border border-secondary shadow mb-5 p-3" style="border-radius:25px">
		  
		  <div class="form-group">
		  <label>Hospital Name</label> 
		  <input placeholder="Enter qcenter Name" id="hospitalname" name="txthospitalname" type="text" class="form-control" autofocus value='<?php echo($hospitalname); ?>'>
		 </div>
		  <div class="form-group">
		  <label>address</label> 
		  <input placeholder="Enter address" id="address" name="txtaddress" type="text" class="form-control" value='<?php echo($address); ?>'>
		 </div>
		 <div class="form-group">

		  <label>City Name</label> 
		  <select name="lstcity" class="form-control" value="<?php echo($cityids)?>"> 
		    <?php
			  $query="select cityid,cityname from city";
			  $tb=$dc->getTable($query);
			  while($rw=mysqli_fetch_array($tb))
			  {
				if($stateid==$rw['cityid'])
            	  echo("<option value=".$rw["cityid"] ." selected>".$rw["cityname"]."</option>");
				else   
		         echo("<option value=".$rw["cityid"] .">".$rw["cityname"]."</option>");
			  }
			?>
		   </select>
		</div>
		<div class="form-group">
		  <label>contactno</label> 
		  <input placeholder="Enter contact no" id="contactid" name="txtcontactno" type="text" class="form-control" value='<?php echo($contactno); ?>'>
		</div>
		 <div class="form-group">
		  <label>email id</label> 
		  <input placeholder="Enter email id" id="emailid" name="txtemailid" type="text" class="form-control" value='<?php echo($emailid); ?>'>
		</div>
		 <div class="form-group">
		  <label>website</label> 
		  <input placeholder="Enter website" id="websiteid" name="txtwebsite" type="text" class="form-control" value='<?php echo($website); ?>'>
		</div>
		 <div class="form-group">
		  <label>hospitaltype</label> 
		  <input placeholder="Enter hospitaltype" id="hospitaltypeid" name="txthospitaltype" type="text" class="form-control" value='<?php echo($hospitaltype); ?>'>
		</div>
		 <div class="form-group">
		  <label>facilities</label> 
		  <input placeholder="Enter facilities" id="facilitiesid" name="txtfacalities" type="text" class="form-control" value='<?php echo($facilities); ?>'>
		</div>
		 <div class="form-group">
		  <label>service</label> 
		  <input placeholder="Enter service" id="serviceid" name="txtservice" type="text" class="form-control" value='<?php echo($service); ?>'>
		</div>
		<div class="form-group">
		  <label>ventilator</label> 
		  <input placeholder="Enter ventilator" id="ventilatorid" name="txtventilator" type="text" class="form-control" value='<?php echo($ventilator); ?>'>
		</div>

		<div class="form-group">
		  <label>location</label> 
		  <input placeholder="Enter location" id="locationid" name="txtlocation" type="text" class="form-control" value='<?php echo($location); ?>'>
		</div>
		 <div class="form-group">
		  <label>img</label> 
		  <input placeholder="Enter img" id="imgid" name="txtimg" type="text" class="form-control" value='<?php echo($img); ?>'>
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