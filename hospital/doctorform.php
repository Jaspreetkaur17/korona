<html> 
<head>
   <?php 
     session_start(); 
     include("csslink.php");
     include("../class/dataclass.php");
   ?>
   
   <?php
   
     $doctorid="";
	 $doctorname="";
     $hospitalid="";
	 $contactno="";
	 $emailid="";	 
	 $qualification="";
	 $experience="";
	 $specification="";
	 $description="";
	 $dc=new dataclass();
	 $msg1="";
	 $msg2="";
   ?>
   
   
   <?php
     if(isset($_SESSION['trans']))
	 {
	   $msg1=$_SESSION['trans']." Record";
	 }
	 
	 
	 if(isset($_POST['btnsave']))
	 {
	    $doctorname=$_POST['txtdoctorname'];
		$hospitalid=$_POST['lsthospital'];
		$contactno=$_POST['txtcontactno'];
		$emailid=$_POST['txtemailid'];
		$qualification=$_POST['txtqualification'];
	    $experience=$_POST['txtexperience'];
		$specification=$_POST['txtspecification'];
        $description=$_POST['txtdescription'];
		$img=$_POST['txtimg'];

	   $query="";	 
	  if($_SESSION['trans']=="new")
	  {
	     $query="insert into doctor(doctorname,hospitalid,contactno,emailid,qualification,experience,specification,description,img) values('$doctorname','$hospitalid','$contactno','$emailid','$qualification','$experience','$specification','$description','$img')";
	  }
	  $result=$dc->saveRecord($query);
	  if($result)
	  {
		  $_SESSION['trans']="";
		  header('location:doctorshow.php');
	  }
	  else
	  {
	    $msg2="Record not saved...";
	  }
		
	 } 
	 		if(isset($_POST['btncancel']))
		 {
			header('location:doctorshow.php');
		 }

   ?>
   
      
   
   <style type="text/css">
     .form-control
	 {
		
	    border:1px solid grey!important;
		border-radius:8px!important;
	 }
   
   </style>
      <script>
   function checksubmit()
	  {
		  if(spnuname1.innerHTML!="" || spnpwd.innerHTML!="" || spnmobno.innerHTML!="" || spnemail.innerHTML!="")
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
  <form name="frm" action="#" method="post">
    <div class="main-wrapper">
    <?php include("navbar.php"); ?>
	<?php include("menu.php"); ?>
		<div class="container" style='margin-top:22px;margin-bottom:22px;'>  
		<div id='contactform' style='box-shadow:5px 10px 18px #009efb75;'>
		<div class="content" style="background-color:white">
		 <div class="row">
			  <div class="col-md-3"></div>
			  <div class="col-md-6">
			   <center><h2>Doctor Form</h2></center>
			   <p><?php echo($msg1) ?></p>
			  </div>
			 </div> 
		  <div class="row">
		  <div class="col-md-3"></div>
		  <div class="col-md-6">
		  <div class="form-group">
		  <label>Doctor Name *</label> 
		  <input placeholder="Enter Doctor Name" id="doctornameid" name="txtdoctorname" type="text" class="form-control" onchange="onlyalpha(this,lbluname1)" required autofocus >
		  <label id="lbluname1"></label>
		</div>
		 <div class="form-group">
		  <label>Hospital Name</label> 
		  <select name="lsthospital" class="form-control"> 
		    <?php
			  $query="select hospitalid,hospitalname from hospital";
			  $tb=$dc->getTable($query);
			  while($rw=mysqli_fetch_array($tb))
			  {
				if($hospitalid==$rw['hospitalid'])
            	  echo("<option value=".$rw["hospitalid"] ." selected>".$rw["hospitalname"]."</option>");
				else   
		         echo("<option value=".$rw["hospitalid"] .">".$rw["hospitalname"]."</option>");
			  }
			?>
		   </select>
		  
		 </div>
        <div class="form-group">
		  <label>contactno *</label> 
		  <input placeholder="Enter contact no" id="contactid" name="txtcontactno" type="text" class="form-control" onchange="checkmobileno(this,lblmobno)" required>
		  <label id="lblmobno"></label>
		</div>
		 <div class="form-group">
		  <label>email id *</label> 
		  <input placeholder="Enter email id" id="emailid" name="txtemailid" type="text" class="form-control" onChange="checkemail(this,lblemail)" required >
		  <label id="lblemail"></label>
		</div>
		<div class="form-group">
		  <label>Qualification *</label> 
		  <input placeholder="Enter Qualification" id="qualificationid" name="txtqualification" type="text" class="form-control" onchange="onlyalpha(this,lblquali)" required>
		  <label id="lblquali"></label>
		</div>
		 <div class="form-group">
		  <label>Experience *</label> 
		  <input placeholder="Enter Experience" id="experienceid" name="txtexperience" type="text" class="form-control" onchange="onlynumber(this,lblexpr)" required>
		  <label id="lblexpr"></label>
		</div>
		 <div class="form-group">
		  <label>Specification *</label> 
		  <input placeholder="Enter Specification" id="specificationid" name="txtspecification" type="text" class="form-control" onchange="onlyalpha(this,lblspeci)">
		  <label id="lblspeci"></label>
		</div>

		 <div class="form-group">
		  <label>Description *</label> 
		  <input placeholder="Enter Description" id="descriptionid" name="txtdescription" type="text" class="form-control" onChange="checklength(this,spndis,3,100)">
		  <span id="spndis"></span>		
		</div>
		

		 <div class="form-group">
		    <input id="save" name="btnsave" type="submit" class="btn btn-success" value="Save" onclick="return checksubmit()">
			<input id="cancel" name="btncancel" type="submit" class="btn btn-danger" value="Cancel" formnovalidate>
		 </div>
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