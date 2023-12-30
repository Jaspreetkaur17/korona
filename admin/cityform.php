<html> 
<head>
   <?php 
     session_start(); 
     include("csslink.php");
     include("../class/dataclass.php");
   ?>
   
   <?php
   
     $cityid="";
	 $cityname="";
	 $shortname="";
	 $pincode="";
	 $stateid="";
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
	   $cityid=$_SESSION['cityid'];
	   $query="select * from city where cityid='$cityid'";
	   $rw=$dc->getRecord($query);
	   $cityname=$rw['cityname'];
	   $shortname=$rw['shortname'];
	   $pincode=$rw['pincode'];
	   $stateid=$rw['stateid'];
	 }
	 
	 if(isset($_POST['btnsave']))
	 {
	    $cityname=$_POST['txtcityname'];
	    $shortname=$_POST['txtshortname'];
	    $pincode=$_POST['txtpincode'];
		$stateid=$_POST['lststate'];
	   $query="";	 
	  if($_SESSION['trans']=="new")
	  {
	     $query="insert into city(cityname,shortname,pincode,stateid) values('$cityname','$shortname','$pincode','$stateid')";
	  }
	  if($_SESSION['trans']=="update")
	  {
	   $cityid=$_SESSION['cityid'];  
	   $query="update city set cityname='$cityname',shortname='$shortname',pincode='$pincode',stateid='$stateid' where cityid='$cityid'";
	  }
	  $result=$dc->saveRecord($query);
	  if($result)
	  {
		  $_SESSION['trans']="";
		  header('location:cityshow.php');
	  }
	  else
	  {
	    $msg2="Record not saved...";
	  }
		
	 } 
	 	 if(isset($_POST['btncancel']))
		 {
			header('location:cityshow.php');
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
   
   
      <script>
	   function checksave()
		  {
			  if(lblctname.innerHTML!="" || lblsctname.innerHTML!="" )
			  {
				lblmsg.innerHTML="Form is not valid";  
				return false;
			  }
			  else
			  {
				return true;
			  }
		  }
	  </script>

   
</head>
<body>
  <form name="frm" action="#" method="post">
    <div class="main-wrapper">
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
      
			   <h2>City Form</h2>
			   <p><?php echo($msg1) ?></p>
			  </div>
			 </div> 
		  <div class="row">
		  <div class="col-md-3"></div>
		  <div class="col-md-6">
		  <div class="border border-secondary shadow mb-5 p-3" style="border-radius:25px">
		  
		  <div class="form-group">
		  <label>City Name</label> 
			<input placeholder="Enter City Name" id="cityname" name="txtcityname" type="text" class="form-control" autofocus value='<?php echo($cityname) ?>' onchange="onlyalpha(this,lblctname)">
			<label id="lblctname"></label>
		 </div>
		  <div class="form-group">
			<label>Short Name</label> 
			<input placeholder="Enter Short Name" id="shortname" name="txtshortname" type="text" class="form-control" value='<?php echo($shortname) ?>' onchange="onlyalpha(this,lblsctname)">
		 <label id="lblsctname"></label>
        </div>
		 <div class="form-group">
		  <label>Pincode</label> 
		  <input placeholder="Enter Pincode" id="pincode" name="txtpincode" type="text" class="form-control" value='<?php echo($pincode) ?>' >
		 </div>
		 <div class="form-group">
		  <label>State Name</label> 
		  <select name="lststate" class="form-control"> 
		    <?php
			  $query="select stateid,statename from state";
			  $tb=$dc->getTable($query);
			  while($rw=mysqli_fetch_array($tb))
			  {
				if($stateid==$rw['stateid'])
            	  echo("<option value=".$rw["stateid"] ." selected>".$rw["statename"]."</option>");
				else   
		         echo("<option value=".$rw["stateid"] .">".$rw["statename"]."</option>");
			  }
			?>
		   </select>
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