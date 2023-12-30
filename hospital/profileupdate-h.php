<html>
  <head>
    <?php
    session_start();	
	include('csslink.php');  
	include('../class/dataclass.php');
	?>
	
	<?php
	  $regid="";
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
	  $bed="";
	  $location="";
	  $img="";
	  $filename="";
	  $tmpname="";
	  $msg="";
	  $query="";
	  $dc=new dataclass();
	?>
	
	<?php

		if(isset($_SESSION['regid']) && $_SESSION['regid']!="")
		{
			$regid=$_SESSION['regid'];  
			$query="select hospitalid from hospital where hospitalid='$regid'";
			$result=$dc->checkid($query);
			if($result)
			{
				$query="select * from hospital where hospitalid='$regid'";
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
				$bed=$rw['bed'];
				$location=$rw['location'];
				$img=$rw['img'];

			}
		}
	 	  
	  if(isset($_POST['btnupdate']))
	  {
		$regid=$_SESSION['regid'];
		
		$hospitalid=$regid;  
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
		$bed=$_POST['txtbed'];
		$location=$_POST['txtlocation'];
		$filename=$_FILES['fupimage']['name'];
		$tmpname=$_FILES['fupimage']['tmp_name'];
		
		
		$query="select hospitalid from hospital where hospitalid='$regid'";
		$result=$dc->checkid($query);
		if($result)
		{
			
			if(isset($_FILES['fupimage']))
			{
			  $ext=pathinfo($filename,PATHINFO_EXTENSION);
			  $filename="hospital".$hospitalid.".".$ext;

		    }
			
			if($filename!="")
			{
				$query="update hospital set hospitalname='$hospitalname',address='$address',cityid='$cityid',contactno='$contactno',emailid='$emailid',website='$website',hospitaltype='$hospitaltype',facilities='$facilities',service='$service',ventilator='$ventilator',bed='$bed',location='$location',img='$filename' where hospitalid='$hospitalid'";
			}
			else
			{
				$query="update hospital set hospitalname='$hospitalname',address='$address',cityid='$cityid',contactno='$contactno',emailid='$emailid',website='$website',hospitaltype='$hospitaltype',facilities='$facilities',service='$service',ventilator='$ventilator',bed='$bed',location='$location' where hospitalid='$hospitalid'";
			}
		}
		else
		{
		  $hospitalid=$_SESSION['hospitalid'];
		  $query="insert into hospital(hospitalid,hospitalname,address,cityid,contactno,emailid,website,hospitaltype,facilities,service,ventilator,bed,location,img) values('$hospitalid','$hospitalname','$address','$cityid','$contactno','$emailid','$website','$hospitaltype','$facilities','$service','$ventilator','$bed','$location','$filename')";
		}
		
		$result=$dc->saveRecord($query);
		if($result)
		{
			 move_uploaded_file($tmpname,"himg/".$filename);
			$msg="Update Profile Successfully...";
			
		 if(isset($_FILES['fupimage'])|| $filename!='')
		  {
	      
		  }
			header('location:profileshow.php');
		  
		}
		else
		{
		  $msg="Profile not updated...";
		}
	  }
	?>

	<style>
	label{
		font-weight:600;
	}
	input[type=text],[type=date]{
		border:1.5px solid #000000;
		border-radius:15px;
	}
	select{
		border:1.5px solid #000000 !important;
		border-radius:15px !important;
	}
	textarea{
		border:1.5px solid #000000 !important;
		border-radius:15px !important;
	}
	
	</style>
	<style>
	label{
		font-weight:600;
	}
	input[type=text],[type=date]{
		border:1.5px solid #000000;
		border-radius:15px;
	}
	select{
		border:1.5px solid #000000 !important;
		border-radius:15px !important;
	}
	textarea{
		border:1.5px solid #000000 !important;
		border-radius:15px !important;
	}
	
	#contactform{
		border-radius:20px;
	}
	</style>
  </head>
  <body>
    <form name="frmhome" action="#" method="post" enctype="multipart/form-data">
    
	<div id="wrapper" class="home-page">
	  <?php include('navbar.php');  ?>
	  <?php include('menu.php');  ?>
	<div class="container" style='margin-top:22px;margin-bottom:22px;'>  
	<div id='contactform' style='box-shadow:5px 10px 18px #009efb75;'>
	<div class="form-group" >
		<center><h2>UPDATE HOSPITAL PROFILE</h2></center> 
	</div>
 <div class="row">
   
   <div class="col-md-5 offset-md-1">
	<div class="form-group">
	<label>Name *</label>
	<input type="text" name="txthospitalname" id="name" class="form-control" value="<?php echo($hospitalname)?>" placeholder="Enter Name" onChange="onlyalpha(this,spnuname1)" required>
	<span id="spnuname1"></span>

	</div>

	<div class="form-group">
	<label>Address *</label>
	<textarea name="txtaddress" class="form-control" placeholder="Enter Address" rows="4" onChange="checkchlength(this,spnadd,3,50)" ><?php echo($address)?></textarea> 
	<span id="spnadd"></span>
	
	</div>					
	<div class="row">
	<div class="col-md-6">
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
	 </div>
	 <div class="col-md-6">
	 <div class="form-group">
	  <label>Contact Number *</label>
	  <input type="text" name="txtcontactno" class="form-control" value="<?php echo($contactno)?>" placeholder="Enter Contact Number" onChange="checkmobileno(this,spnmobno) " required>
	 <span id="spnmobno"></span>
	
	</div>
	</div>
	 </div>	
	<div class="form-group">
	  <label>Emailid *</label>
	  <input type="text" name="txtemailid" class="form-control" value="<?php echo($emailid)?>" placeholder="Enter Email" onChange="checkemail(this,spnemail)" required>
	  <span id="spnemail"></span>
	
	</div>
	<div class="form-group" style="margin-bottom:-3px">
		<label>Website </label>
		<input type="text" name="txtwebsite" class="form-control" value="<?php echo($website)?>" placeholder="Enter Website">
	</div>
	<div class="form-group">
	  <label>Hospital Type *</label>
	  <input type="text" value="<?php echo($hospitaltype)?>" name="txthospitaltype" class="form-control" placeholder="Enter Hospital Type" onChange="onlyalpha(this,spntype)" required>
	  <span id="spntype"></span>
	
	</div>
	</div>
	<div class="col-md-5">
	<div class="form-group">
	  <label>Facilities </label>
	  <input type="text" name="txtfacilities" value="<?php echo($facilities)?>" class="form-control" placeholder="Enter Facilities">
	</div>
	<div class="form-group">
	  <label>Service </label>
	  <input type="text" name="txtservice" class="form-control" value="<?php echo($service)?>" placeholder="Enter Service">
	</div>
	<div class="form-group">
	  <label>Ventilator</label>
	  <input type="text" name="txtventilator" class="form-control" value="<?php echo($ventilator)?>"placeholder="Enter Ventilator" required>
	</div>
	<div class="form-group">
	  <label>Bed</label>
	  <input type="text" name="txtbed" class="form-control" value="<?php echo($bed)?>" placeholder="Enter Bed" required>
	</div>
	<div class="form-group">
	  <label>location *</label>
	  <input type="text" name="txtlocation" class="form-control" value="<?php echo($location)?>" placeholder="Enter Location">
	</div>

	<div class="form-group">
	  <label>Image</label> 
	  <input id="fname" name="fupimage" type="file" class="form-control">
	</div>
  </div>
   </div>
   <div class="form-group"><center>
   	  <input type="submit" name="btnupdate" value="Update" class="btn btn-success" style="width:150px;">
	  <input type="submit" name="btncancel" value="Cancel" class="btn btn-danger" style="width:150px;" formnovalidate>
	</center>
	</div>
	
	<div class="form-group">
	 <label class="lbl" ><?php echo($msg); ?> </label>
	</div>
   </div>
   </div>
   </div>
    <?php include('footer.php');  ?>
 </form>	
   <?php include('jslink.php');  ?>
  
  </body>
  
</html>