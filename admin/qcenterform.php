<html> 
<head>
   <?php 
     session_start(); 
     include("csslink.php");
     include("../class/dataclass.php");
   ?>
   
   <?php
	 
	 $regid="";
     $qcenterid="";
	 $qcentername="";
	 $address="";
	 $cityid="";
	 $contactno="";
	 $emailid="";
	 $head="";
	 $capacity="";
	 $facilities="";
	 $managedby="";
	 $service="";
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
	   $qcenterid=$_SESSION['qcenterid'];
	   $query="select * from qurantinecenter where qcenterid='$qcenterid'";
	   $rw=$dc->getRecord($query);
	   $qcentername=$rw['qcentername'];
	   $address=$rw['address'];
	   $cityid=$rw['cityid'];
	   $contactno=$rw['contactno'];
	   $emailid=$rw['emailid'];
	   $head=$rw['head'];
	   $capacity=$rw['capacity'];
	   $facilities=$rw['facilities'];
	   $managedby=$rw['managedby'];
	   $service=$rw['service'];
	 }
	 
	 if(isset($_POST['btnsave']))
	 {
	    $qcentername=$_POST['txtqcentername'];
	    $address=$_POST['txtaddress'];
		$cityid=$_POST['lstcity'];

		$contactno=$_POST['txtcontactno'];
		$emailid=$_POST['txtemailid'];
		$head=$_POST['txthead'];
		$capacity=$_POST['txtcapacity'];
		$facilities=$_POST['txtfacilities'];
		$managedby=$_POST['txtmanagedby'];
		$service=$_POST['txtservice'];

	   $query="";	 
	  if($_SESSION['trans']=="new")
	  {
	     $query="insert into qurantinecenter(qcentername,address,cityid,contactno,emailid,head,capacity,facilities,managedby,service) values('$qcentername','$address','$cityid','$contactno','$emailid','$head','$capacity','$facilities','$managedby','$service')";
	  }
	  if($_SESSION['trans']=="update")
	  {
	   $qcenterid=$_SESSION['qcenterid'];  
	   $query="update qurantinecenter set qcentername='$qcentername',address='$address',cityid='$cityid',contactno='$contactno',emailid='$emailid',head='$head',capacity='$capacity',facilities='$facilities',managedby='$managedby',service='$service' where qcenterid='$qcenterid'";
	  }
	  $result=$dc->saveRecord($query);
	  if($result)
	  {
		  $_SESSION['trans']="";
		  header('location:qcentershow.php');
	  }
	  else
	  {
	    $msg2="Record not saved...";
	  }
		
	 } 
	 		if(isset($_POST['btncancel']))
		 {
			header('location:qcentershow.php');
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

			   <h2>qcenter Form</h2>
			   <p><?php echo($msg1) ?></p>
			  </div>
			 </div> 
		  <div class="row">
		  <div class="col-md-3"></div>
		  <div class="col-md-6">
		  <div class="border border-secondary shadow mb-5 p-3" style="border-radius:25px">
		  
		  <div class="form-group">
		  <label>qcenter Name</label> 
		  <input placeholder="Enter qcenter Name" id="qcentername" name="txtqcentername" type="text" class="form-control" autofocus value='<?php echo($qcentername); ?>'>
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
		  <label>head</label> 
		  <input placeholder="Enter head" id="headid" name="txthead" type="text" class="form-control" value='<?php echo($head); ?>'>
		</div>
		 <div class="form-group">
		  <label>capacity</label> 
		  <input placeholder="Enter capacity" id="capacityid" name="txtcapacity" type="text" class="form-control" value='<?php echo($capacity); ?>'>
		</div>
		 <div class="form-group">
		  <label>facilities</label> 
		  <input placeholder="Enter facilities" id="facilitiesid" name="txtfacilities" type="text" class="form-control" value='<?php echo($facilities); ?>'>
		</div>
		 <div class="form-group">
		  <label>managedby</label> 
		  <input placeholder="Enter managedby" id="managedbyid" name="txtmanagedby" type="text" class="form-control" value='<?php echo($managedby); ?>'>
		</div>
		 <div class="form-group">
		  <label>service</label> 
		  <input placeholder="Enter service" id="serviceid" name="txtservice" type="text" class="form-control" value='<?php echo($service); ?>'>
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