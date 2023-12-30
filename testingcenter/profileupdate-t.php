<html>
  <head>
    <?php
    session_start();	
	include('csslink.php');  
	include('../class/dataclass.php');
	?>
	
	<?php
	  $regid="";
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
	  $img="";
	  $msg="";
	  $query="";
	  $dc=new dataclass();
	?>
	
	<?php

		if(isset($_SESSION['regid']) && $_SESSION['regid']!="")
		{
			$regid=$_SESSION['regid'];  
			$query="select tcenterid from testingcenter where tcenterid='$regid'";
			$result=$dc->checkid($query);
			if($result)
			{
				$query="select * from testingcenter where tcenterid='$regid'";
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
				$img=$rw['img'];
			}
		}
	 	  
	  if(isset($_POST['btnupdate']))
	  {
		$regid=$_SESSION['regid'];
		
		$tcenterid=$regid;  
		$tcentername=$_POST['txttcentername'];  
		$tcentertype=$_POST['txttcentertype'];  
		$head=$_POST['txthead'];
        $contactno=$_POST['txtcontactno'];   	
		$emailid=$_POST['txtemailid'];
	    $address=$_POST['txtaddress'];		
		$cityid=$_POST['lstcity'];
		$description=$_POST['txtdescription'];
		$typeoftesting=$_POST['txttypeoftesting'];
		$filename=$_FILES['fupimage']['name'];
		$tmpname=$_FILES['fupimage']['tmp_name'];
		
	
		$query="select tcenterid from testingcenter where tcenterid='$regid'";
		$result=$dc->checkid($query);

         
		if($result)
		{
			
			if(isset($_FILES['fupimage']))
			{
			  $ext=pathinfo($filename,PATHINFO_EXTENSION);
			  $filename="testingcenter".$tcenterid.".".$ext;
		   }
			echo($filename);
			
			if($filename!="")
			{
				$query="update testingcenter set tcentername='$tcentername',tcentertype='$tcentertype',head='$head',contactno='$contactno',emailid='$emailid',address='$address',cityid='$cityid',description='$description',typeoftesting='$typeoftesting',img='$filename' where tcenterid='$tcenterid'";
			}
			else
			{
				$query="update testingcenter set tcentername='$tcentername',tcentertype='$tcentertype',head='$head',contactno='$contactno',emailid='$emailid',address='$address',cityid='$cityid',description='$description',typeoftesting='$typeoftesting' where tcenterid='$tcenterid'";
			}
			echo($query);
		}
		else
		{
		  $tcenterid=$_SESSION['regid'];
		  $query="insert into testingcenter(tcenterid,tcentername,tcentertype,head,contactno,emailid,address,cityid,description,typeoftesting,img) values('$tcenterid','$tcentername','$head','$contactno','$emailid','$address','$cityid','$description','$typeoftesting','$filename')";
		}
		
		$result=$dc->saveRecord($query);
		if($result)
		{
			 move_uploaded_file($tmpname,"timg/".$filename);
			$msg="Update Profile Successfully...";
			
		 if(isset($_FILES['fupimage'])|| $filename!='')
		  {
	      
		  }
		header('location:profileshow-t.php');
		  
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
	
	
	#testform{
		border-radius:20px;
	}

	</style>
   <script>
   function checksubmit()
	  {
		  if(spnname.innerHTML!="" || spntype.innerHTML!="" || spnmobno.innerHTML!="" || spnemail.innerHTML!="" || spntot.innerHTML!="" || spnadd.innerHTML!="" || spndes.innerHTML!="")
	      {
			alert("Form is not valid");  
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
    <form name="frmhome" action="#" method="post" enctype="multipart/form-data">
    
	<div id="wrapper" class="home-page">
	  <?php include('navbar.php');  ?>
	  <?php include('menu.php');  ?>
	<div class="container"  id='testform'  style='margin-top:22px;margin-bottom:22px;box-shadow:5px 10px 18px #009efb75;'>  
	<div class="form-group">
		<center><h2>UPDATE TESTING PROFILE</h2></center>
	</div>
 <div class="row"  style=''>
   <div class='col-md-1'></div>
   <div class="col-md-4 offset-md-1">
	<div class="form-group">
	<label>Name *</label>
	<input type="text" name="txttcentername" id="name" class="form-control" value="<?php echo($tcentername)?>" placeholder="Enter Name" onChange="onlyalpha(this,spnname)"required>
	<span id="spnname"></span>	
	</div>
	
	<div class="form-group">
	<label>Type *</label>
	<input type="text" name="txttcentertype" id="type" class="form-control" value="<?php echo($tcentertype)?>" placeholder="Enter Testing Center" onChange="onlyalpha(this,spntype)" required>
	<span id="spntype"></span>	
	</div>

	<div class="form-group">
	<label>Head</label>
	<input type="text" name="txthead" id="head" class="form-control" value="<?php echo($head)?>" placeholder="Enter Head">
	</div>

	
	 <div class="form-group">
	  <label>Contact Number *</label>
	  <input type="text" name="txtcontactno" class="form-control" value="<?php echo($contactno)?>" placeholder="Enter Contact Number" onChange="checkmobileno(this,spnmobno) " required>
	  <span id="spnmobno"></span>
	</div>
	
	<div class="form-group">
	  <label>Emailid *</label>
	  <input type="text" name="txtemailid" class="form-control" value="<?php echo($emailid)?>" placeholder="Enter Email" onChange="checkemail(this,spnemail)">
	  <span id="spnemail"></span>
	
	</div>
	</div>
	<div class="col-md-4 offset-md-1">
	<div class="form-group">
	<label>Address *</label>
	<textarea name="txtaddress" class="form-control" placeholder="Enter Address" rows="2" onChange="checkchlength(this,spnadd,5,100)" required><?php echo($address)?></textarea> 
   <span id="spnadd"></span>

	</div>					

	 <div class="form-group">
		  <label>City Name</label> 
		  <select name="lstcity" class="form-control" value="<?php echo($cityid)?>"> 
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
	  <label>DESCRIPTION *</label>
	  <input type="text" value="<?php echo($description)?>" name="txtdescription" class="form-control" placeholder="Enter Description" onChange="checkchlength(this,spndes,3,100)">
	<span id="spndes"></span>
	
	</div>
	
	
	<div class="form-group">
	  <label>TYPE OF TESTING *</label>
	  <input type="text" name="txttypeoftesting" value="<?php echo($typeoftesting)?>" class="form-control" placeholder="Enter Type Of Testing" onChange="onlyalpha(this,spntot)" required>
	<span id="spntot"></span>
	</div>
	<div class="form-group">
	  <label>Image</label> 
	  <input id="fname" name="fupimage" type="file" class="form-control">
	</div>
  </div>
  <div class='col-md-1'></div>
 <center><div class='row'>
	<div class='col-md-6'>
   <div class="form-group">
   	  <input type="submit" name="btnupdate" value="Update" class="btn btn-success" style="width:150px;" onclick="return checksubmit()">
	 </div>
	 </div>
	 <div class='col-md-6'>
	 <div class="form-group">
	  <input type="submit" name="btncancel" value="Cancel" class="btn btn-danger" style="width:150px;" formnovalidate>
	</div>
	</div>
   </div></center>
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