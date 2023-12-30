<html>
  <head>
    <?php
    session_start();	
	include('csslink.php');  
	include('../class/dataclass.php');
	?>
	
	<?php
	  $regid="";
	  $patientid="";
	  $patientname="";
	  $address="";
	  $cityid="";
	  $contactno="";
	  $emailid="";
	  $gender="";
	  $birthdate="";
	  $disease="";
	  $bloodgrp="";
	  $height="";
	  $weight="";
	  $filename="";
	  $tmpname="";
	  $img="";
	  $medicalhistory="";
	  $msg="";
	  $query="";
	  $dc=new dataclass();
	?>
	
	<?php

		if(isset($_SESSION['regid']) && $_SESSION['regid']!="")
		{
			$regid=$_SESSION['regid'];  
			$query="select patientid from patient where patientid='$regid'";
			$result=$dc->checkid($query);
			if($result)
			{
				$query="select * from patient where patientid='$regid'";
				$rw=$dc->getRecord($query);
			    $patientname=$rw['patientname'];
				$address=$rw['address'];
				$cityid=$rw['cityid'];
				$contactno=$rw['contactno'];
				$emailid=$rw['emailid'];
				$gender=$rw['gender'];
				$birthdate=$rw['birthdate'];
				$disease=$rw['disease'];
				$bloodgrp=$rw['bloodgrp'];
				$height=$rw['height'];
				$weight=$rw['weight'];
				$img=$rw['img'];
				$medicalhistory=$rw['medicalhistory'];
			}
		}
	 	  
	  if(isset($_POST['btnupdate']))
	  {
		$regid=$_SESSION['regid'];
		
		$patientid=$regid;  
		$patientname=$_POST['txtpatientname'];  
		$address=$_POST['txtaddress'];  
		$cityid=$_POST['lstcity'];
        $contactno=$_POST['txtcontactno'];   	
		$emailid=$_POST['txtemailid'];
		$gender=$_POST['rdogender'];
		$birthdate=$_POST['txtbirthdate'];
		$disease=$_POST['txtdisease'];
		$bloodgrp=$_POST['txtbg'];
		$weight=$_POST['txtw'];
		$height=$_POST['txth'];
		$filename=$_FILES['fupimage']['name'];
		$tmpname=$_FILES['fupimage']['tmp_name'];
		$medicalhistory=$_POST['txtmh'];
		
	
		$query="select patientid from patient where patientid='$regid'";
		$result=$dc->checkid($query);

         
		if($result)
		{
			
			if(isset($_FILES['fupimage']))
			{
			  $ext=pathinfo($filename,PATHINFO_EXTENSION);
			  $filename="patient".$patientid.".".$ext;
		   }
			echo($filename);
			
			if($filename!="")
			{
				$query="update patient set patientname='$patientname',address='$address',cityid='$cityid',contactno='$contactno',emailid='$emailid',gender='$gender',birthdate='$birthdate',disease='$disease',bloodgrp='$bloodgrp',weight='$weight',height='$height',img='$filename',medicalhistory='$medicalhistory' where patientid='$patientid'";
			}
			else
			{
				$query="update patient set patientname='$patientname',address='$address',cityid='$cityid',contactno='$contactno',emailid='$emailid',gender='$gender',birthdate='$birthdate',disease='$disease',bloodgrp='$bloodgrp',weight='$weight',height='$height',medicalhistory='$medicalhistory' where patientid='$patientid'";
			}
			echo($query);
		}
		else
		{
			$ext=pathinfo($filename,PATHINFO_EXTENSION);
			  $filename="patient".$patientid.".".$ext;
		  $patientid=$_SESSION['regid'];
		  $query="insert into patient(patientid,patientname,address,cityid,contactno,emailid,gender,birthdate,disease,bloodgrp,weight,height,img,medicalhistory) values('$patientid','$patientname','$address','$cityid','$contactno','$emailid','$gender','$birthdate','$disease','$bloodgrp','$height','$weight','$filename','$medicalhistory')";
		}
		
		$result=$dc->saveRecord($query);
		if($result)
		{
			 move_uploaded_file($tmpname,"pimg/".$filename);
			$msg="Update Profile Successfully...";
			
		 if(isset($_FILES['fupimage'])|| $filename!='')
		  {
	      
		  }
			header('location:profileshow-p.php');
		  
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
		<center><h2>UPDATE PATIENT PROFILE</h2></center>
	</div>
 <div class="row">
   
   <div class="col-md-5 offset-md-1">
	<div class="form-group">
	<label>Name</label>
	<input type="text" name="txtpatientname" id="name" class="form-control" value="<?php echo($patientname)?>" placeholder="Enter Name">
	</div>

	<div class="form-group">
	<label>Address</label>
	<textarea name="txtaddress" class="form-control" placeholder="Enter Address" rows="4"><?php echo($address)?></textarea> 
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
	  <label>Contact Number</label>
	  <input type="text" name="txtcontactno" class="form-control" value="<?php echo($contactno)?>" placeholder="Enter Contact Number">
	</div>
	</div>
	 </div>	
	<div class="form-group">
	  <label>Emailid</label>
	  <input type="text" name="txtemailid" class="form-control" value="<?php echo($emailid)?>" placeholder="Enter Email">
	</div>
		<div class="form-group" style="margin-bottom:-3px">
	  <label>Gender:-</label>
	  <input type="radio" name="rdogender" value="Male"  <?php if($gender=='Male') echo("checked")  ?> > &nbsp<b>MALE</b> &nbsp 
	  <input type="radio" name="rdogender" value="Female" <?php if($gender=='Female') echo("checked") ?> >&nbsp<b>FEMALE</b>
	</div>
	<div class="form-group">
	  <label>Birthdate</label>
	  <input type="date" value="<?php echo($birthdate)?>" name="txtbirthdate" class="form-control" placeholder="Select Birthdate">
	</div>
	</div>
	<div class="col-md-5">
	<div class="form-group">
	  <label>Disease</label>
	  <input type="text" name="txtdisease" value="<?php echo($disease)?>" class="form-control" placeholder="Enter Disease">
	</div>
	<div class="form-group">
	  <label>Blood Group</label>
	  <input type="text" name="txtbg" class="form-control" value="<?php echo($bloodgrp)?>" placeholder="Enter Blood Group">
	</div>
	<div class="form-group">
	  <label>Height</label>
	  <input type="text" name="txth" class="form-control" value="<?php echo($height)?>"placeholder="Enter height">
	</div>
	<div class="form-group">
	  <label>Weight</label>
	  <input type="text" name="txtw" class="form-control" value="<?php echo($weight)?>" placeholder="Enter weight">
	</div>
	<div class="form-group">
	  <label>Image</label> 
	  <input id="fname" name="fupimage" type="file" class="form-control">
	</div>
	<div class="form-group">
	  <label>Medical History</label>
	  <input type="text" name="txtmh" class="form-control" value="<?php echo($medicalhistory)?>" placeholder="Enter Medical History">
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
   </div>
    <?php include('footer.php');  ?>
 </form>	
   <?php include('jslink.php');  ?>
  
  </body>
  
</html>