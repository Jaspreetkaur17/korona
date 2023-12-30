<html>
  <head>
    <?php
    session_start();	
	include('csslink.php');  
	include('../class/dataclass.php');
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
	  $bed="";
	  $managedby="";
	  $service="";
	  $filename="";
	  $tmpname="";
	  $img="";
	  $msg="";
	  $query="";
	  $dc=new dataclass();
	?>
	

	<?php
		if(isset($_SESSION['regid']) && $_SESSION['regid']!="")
		{
			$regid=$_SESSION['regid'];  
			$query="select qcenterid from qurantinecenter where qcenterid='$regid'";
			$result=$dc->checkid($query);
			if($result)
			{
				$query="select * from qurantinecenter where qcenterid='$regid'";
				$rw=$dc->getRecord($query);
			    $qcentername=$rw['qcentername'];
				$address=$rw['address'];
				$cityid=$rw['cityid'];
				$contactno=$rw['contactno'];
				$emailid=$rw['emailid'];
				$head=$rw['head'];
				$capacity=$rw['capacity'];
				$facilities=$rw['facilities'];
				$bed=$rw['bed'];
				$managedby=$rw['managedby'];
				$service=$rw['service'];
				$img=$rw['img'];
			}
		}

	 	  
	  if(isset($_POST['btnupdate']))
	  {
		$regid=$_SESSION['regid'];
		
		$qcenterid=$regid;  
		$qcentername=$_POST['txtqcentername'];  
		$address=$_POST['txtaddress'];  
		$cityid=$_POST['lstcity'];
        $contactno=$_POST['txtcontactno'];   	
		$emailid=$_POST['txtemailid'];
		$head=$_POST['txthead'];
		$capacity=$_POST['txtcapacity'];
		$facilities=$_POST['txtfacilities'];
		$bed=$_POST['txtbed'];
		$managedby=$_POST['txtmanagedby'];
		$service=$_POST['txtservice'];
		$filename=$_FILES['fupimage']['name'];
		$tmpname=$_FILES['fupimage']['tmp_name'];
		
	
		$query="select qcenterid from Qurantinecenter where qcenterid='$regid'";
		$result=$dc->checkid($query);

         
		if($result)
		{
			
			if(isset($_FILES['fupimage']))
			{
			  $ext=pathinfo($filename,PATHINFO_EXTENSION);
			  $filename="qcenter".$qcenterid.".".$ext;
		   }
			echo($filename);
			
			if($filename!="")
			{
				$query="update qurantinecenter set qcentername='$qcentername',address='$address',cityid='$cityid',contactno='$contactno',emailid='$emailid',head='$head',capacity='$capacity',facilities='$facilities',bed='$bed',managedby='$managedby',service='$service',img='$filename' where qcenterid='$qcenterid'";
			}
			else
			{
				$query="update qurantinecenter set qcentername='$qcentername',address='$address',cityid='$cityid',contactno='$contactno',emailid='$emailid',head='$head',capacity='$capacity',facilities='$facilities',bed='$bed',managedby='$managedby',service='$service' where qcenterid='$qcenterid'";
			}
			echo($query);
		}
		else
		{
		  $qcenterid=$_SESSION['regid'];
		 $ext=pathinfo($filename,PATHINFO_EXTENSION);
			  $filename="qcenter".$qcenterid.".".$ext; 
		  $query="insert into qurantinecenter(qcenterid,qcentername,address,cityid,contactno,emailid,head,capacity,facilities,bed,managedby,service,img) values('$qcenterid','$qcentername','$address','$cityid','$contactno','$emailid','$head','$capacity','$facilities','$bed','$managedby','$service','$filename')";
		}
		
		$result=$dc->saveRecord($query);
		if($result)
		{
			 move_uploaded_file($tmpname,"qimg/".$filename);
			$msg="Update Profile Successfully...";
			
		 
			header('location:profileshow-q.php');
		  
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
	<div class="form-group">
		<center><h2>UPDATE QURANTINECENTER PROFILE</h2> </center> 
	</div>
 <div class="row">
   
   <div class="col-md-5 offset-md-1">
	<div class="form-group">
	<label>Name *</label>
	<input type="text" name="txtqcentername" id="name" class="form-control" value="<?php echo($qcentername)?>" placeholder="Enter Qurantinecenter Name" onChange="onlyalpha(this,sqnuname1)" required>
	<span id="sqnuname1"></span>
	</div>

	<div class="form-group">
	<label>Address *</label>
	<textarea name="txtaddress" class="form-control" placeholder="Enter Address" rows="4" onChange="checkchlength(this,spnadd,3,50)" required><?php echo($address)?></textarea> 
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
	<div class="group-input">
		<label>Email ID *</label> 
		<input placeholder="Enter Email" id="emailid" name="txtemailid" type="text" class="form-control" onChange="checkemail(this,spnemail)" required>
		<span id="spnemail"></span>
	</div>

	<div class="form-group" style="margin-bottom:-3px">
	  <label>Head</label>
	  <input type="text" name="txthead" class="form-control" value="<?php echo($head)?>" placeholder="Enter Head">
	</div>
	<div class="form-group">
	  <label>capacity</label>
	  <input type="text" value="<?php echo($capacity)?>" name="txtcapacity" class="form-control" placeholder="Select Capacity" required>
	</div>
	</div>
	<div class="col-md-5">
	<div class="form-group">
	  <label>Facilities </label>
	  <input type="text" name="txtfacilities" value="<?php echo($facilities)?>" class="form-control" placeholder="Enter Facilities">
	</div>
	<div class="form-group">
	  <label>Bed</label>
	  <input type="text" name="txtbed" class="form-control" value="<?php echo($bed)?>" placeholder="Enter Bed" required>
	</div>
	<div class="form-group">
	  <label>managedby </label>
	  <input type="text" name="txtmanagedby" class="form-control" value="<?php echo($managedby)?>"placeholder="Enter Managedby">
	</div>
	<div class="form-group">
	  <label>Service *</label>
	  <input type="text" name="txtservice" class="form-control" value="<?php echo($service)?>" placeholder="Enter Service" onChange="checkchlength(this,spnser,3,30)">
	<span id="spnser"></span>

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