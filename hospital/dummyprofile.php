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
		
	
		$query="select qcenterid from qurantinecenter where qcenterid='$regid'";
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
		  $query="insert into qurantinecenter(qcenterid,qcentername,address,cityid,contactno,emailid,head,capacity,facilities,bed,managedby,service,img) values('$qcenterid','$qcentername','$address','$cityid','$contactno','$emailid','$head','$capacity','$facilities','$bed','$managedby','$service','$filename')";
		}
		
		$result=$dc->saveRecord($query);
		if($result)
		{
			 move_uploaded_file($tmpname,"pimg/".$filename);
			$msg="Update Profile Successfully...";
			
		 if(isset($_FILES['fupimage'])|| $filename!='')
		  {
	      
		  }
			//header('location:profileshow-p.php');
		  
		}
		else
		{
		  $msg="Profile not updated...";
		}
	  }
	?>
	<style>
	label{
		font-managedby:600;
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
  </head>
  <body>
    <form name="frmhome" action="#" method="post" enctype="multipart/form-data">
    
	<div id="wrapper" class="home-page">
	  <?php include('navbar.php');  ?>
	  <?php include('menu.php');  ?>
	<div class="container">  
	<div class="form-group">
		<h2>UPDATE QURANTINECENTER PROFILE</h2> 
	</div>
 <div class="row">
   
   <div class="col-md-5 offset-md-1">
	<div class="form-group">
	<label>Name</label>
	<input type="text" name="txtqcentername" id="name" class="form-control" value="<?php echo($qcentername)?>" placeholder="Enter Name">
	</div>

	<div class="form-group">
	<label>Address</label>
	<textarea name="txtaddress" class="form-control" placeholder="Enter Address" rows="4"><?php echo($address)?></textarea> 
	</div>					
	<div class="row">
	<div class="col-md-6">
	 <div class="form-group">
		  <label>City Name</label> 
		  <select name="lstcity" class="form-control" value="<?php echo($cityid)?>"> 
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
	  <label>Contact Number</label>
	  <input type="text" name="txtcontactno" class="form-control" value="<?php echo($contactno)?>" placeholder="Enter Contact Number">
	</div>
	</div>
	 </div>	
	<div class="form-group">
	  <label>Emailid</label>
	  <input type="text" name="txtemailid" class="form-control" value="<?php echo($emailid)?>" placeholder="Enter Email">
	</div>
	<div class="form-group">
	  <label>head</label>
	  <input type="date" value="<?php echo($head)?>" name="txthead" class="form-control" placeholder="Enter head">
	</div>
	</div>
	<div class="col-md-5">
	<div class="form-group">
	  <label>capacity</label>
	  <input type="text" name="txtcapacity" value="<?php echo($capacity)?>" class="form-control" placeholder="Enter capacity">
	</div>
	<div class="form-group">
	  <label>Facilities</label>
	  <input type="text" name="txtfacilities" class="form-control" value="<?php echo($facilities)?>" placeholder="Enter Facilities">
	</div>
	<div class="form-group">
	  <label>Bed</label>
	  <input type="text" name="txtbed" class="form-control" value="<?php echo($bed)?>"placeholder="Enter Bed">
	</div>
	<div class="form-group">
	  <label>Managedby</label>
	  <input type="text" name="txtmanagedby" class="form-control" value="<?php echo($managedby)?>" placeholder="Enter Managedby">
	</div>
	<div class="form-group">
	  <label>Service</label>
	  <input type="text" name="txtservice" class="form-control" value="<?php echo($service)?>" placeholder="Enter Service">
	</div>

	<div class="form-group">
	  <label>Image</label> 
	  <input id="fname" name="fupimage" type="file" class="form-control">
	</div>
  </div>
   </div>
   <div class="form-group"><center>
   	  <input type="submit" name="btnupdate" value="Update" class="btn btn-success" style="width:150px;">
	  <input type="submit" name="btncancel" value="Cancel" class="btn btn-danger" style="width:150px;">
	</center>
	</div>
	
	<div class="form-group">
	 <label class="lbl" ><?php echo($msg); ?> </label>
	</div>
   </div>
   </div>
    <?php include('footer.php');  ?>
 </form>	
   <?php include('jslink.php');  ?>
  
  </body>
  
</html>