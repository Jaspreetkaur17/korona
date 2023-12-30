<html> 
<head>
   <?php 
     session_start(); 
     include("csslink.php");
     include("../class/dataclass.php");
   ?>
   
   <?php
   
     $staffid="";
	 $staffname="";
     $qcenterid="";
	 $contactno="";
	 $emailid="";	 
	 $qualification="";
	 $experience="";
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
	    $staffname=$_POST['txtstaffname'];
		$qcenterid=$_POST['lstqcenter'];
		$contactno=$_POST['txtcontactno'];
		$emailid=$_POST['txtemailid'];
		$qualification=$_POST['txtqualification'];
	    $experience=$_POST['txtexperience'];
        $description=$_POST['txtdescription'];

	   $query="";	 
	  if($_SESSION['trans']=="new")
	  {
	     $query="insert into staff(staffname,qcenterid,contactno,emailid,qualification,experience,description) values('$staffname','$qcenterid','$contactno','$emailid','$qualification','$experience','$description')";
	  }
	  $result=$dc->saveRecord($query);
	  if($result)
	  {
		  $_SESSION['trans']="";
		  header('location:staffshow.php');
	  }
	  else
	  {
	    $msg2="Record not saved...";
	  }
		
	 } 
	 		if(isset($_POST['btncancel']))
		 {
			header('location:staffshow.php');
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
		  if(lblsname.innerHTML!="" || lblmobno.innerHTML!="" || lblemail.innerHTML!="" || lblquali.innerHTML!="")
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
    <?php include("navbar.php"); ?>
	<?php include("menu.php"); ?>
	
      <div class="container" style='margin-top:22px;margin-bottom:22px;'>  
	<div id='contactform' style='box-shadow:5px 10px 18px #009efb75;'>
		<div class="page-wrapper">
		   <div class="content" style="background-color:white">
		     <div class="row">
			  <div class="col-md-3"></div>
			  <div class="col-md-6">
			  <center> <h2>Staff Form</h2></center>
			   <p><?php echo($msg1) ?></p>
			  </div>
			 </div> 
		  <div class="row">
		  <div class="col-md-3"></div>
		  <div class="col-md-6">
		  <div class="form-group">
		  <label>Staff Name *</label> 
		  <input placeholder="Enter Staff Name" id="staffnameid" name="txtstaffname" type="text" class="form-control" onchange="onlyalpha(this,lblsname)" autofocus >
		 <label id="lblsname"></label>
		 </div>
		 <div class="form-group">
		  <label>Qurantine Center Name</label> 
		  <select name="lstqcenter" class="form-control"> 
		    <?php
			  $query="select qcenterid,qcentername from qurantinecenter";
			  $tb=$dc->getTable($query);
			  while($rw=mysqli_fetch_array($tb))
			  {
				if($qcenterid==$rw['qcenterid'])
            	  echo("<option value=".$rw["qcenterid"] ." selected>".$rw["qcentername"]."</option>");
				else   
		         echo("<option value=".$rw["qcenterid"] .">".$rw["qcentername"]."</option>");
			  }
			?>
		   </select>
		  
		 </div>
        <div class="form-group">
		  <label>contactno *</label> 
		  <input placeholder="Enter contact no" id="contactid" name="txtcontactno" type="text" class="form-control" onchange="checkmobileno(this,lblmobno)" >
		  <label id="lblmobno"></label>
		</div>
		 <div class="form-group">
		  <label>email id *</label> 
		  <input placeholder="Enter email id" id="emailid" name="txtemailid" type="text" class="form-control" onchange="checkemail(this,lblemail)">
		  <label id="lblemail"></label>
		</div>
		<div class="form-group">
		  <label>Qualification *</label> 
		  <input placeholder="Enter Qualification" id="qualificationid" name="txtqualification" type="text" class="form-control" onchange="onlyalpha(this,lblquali)">
		  <label id="lblquali"></label>
		</div>
		 <div class="form-group">
		  <label>Experience</label> 
		  <input placeholder="Enter Experience" id="experienceid" name="txtexperience" type="text" class="form-control">
		</div>

		 <div class="form-group">
		  <label>Description *</label> 
		  <input placeholder="Enter Description" id="descriptionid" name="txtdescription" type="text" class="form-control">
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