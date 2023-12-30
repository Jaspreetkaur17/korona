<html> 
<head>
    <?php 
		session_start(); 
		include("csslink.php");
		include("../class/dataclass.php");
    ?>
   
    <?php
		$hoxygenid="";
		$patientid="";
		$qty="";
		$hospitalid="";
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
	    $bedid=$_POST['txtbedid'];
		$hospitalid=$_POST['lsthospital'];
		$patientid=$_POST['lstpatientid'];
		$qty=$_POST['txtqty'];
		$query="";	 
	  if($_SESSION['trans']=="new")
	  {
		  
	     $query="insert into hoxygen(hoxygenid,patientid,qty,hospitalid) values('$hoxygenid','$patientid','$qty','$hospitalid')";
	  }
	  $result=$dc->saveRecord($query);
	  if($result)
	  {
		  $_SESSION['trans']="";
		  header('location:hoxygenshow.php');
	  }
	  else
	  {
	    $msg2="Record not saved...";
	  }
		
	 } 
	 		if(isset($_POST['btncancel']))
		 {
			header('location:hoxygenshow.php');
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
			  if(lbluname1.innerHTML!=""  || lblmobno.innerHTML!="" || lblemail.innerHTML!="" || lblspeci.innerHTML!="" || lblexp.innerHTML!="")
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
	
      
		<div class="page-wrapper">
		   <div class="content" style="background-color:white">
		     <div class="row">
			  <div class="col-md-3"></div>
			  <div class="col-md-6">
			   <h2>Hospital Oxygen Form</h2>
			   <p><?php echo($msg1) ?></p>
			  </div>
			 </div> 
		  <div class="row">
		  <div class="col-md-3"></div>
		  <div class="col-md-6">
	 <div class="form-group">
		  <label>Patient Name</label> 
		  <select name="lstpatient" class="form-control" value="<?php echo($patientid)?>"> 
		    <?php
			  $hospitalid=$_SESSION['regid'];
			  $query="select h.patientid,p.patientname from hrequest h, patient p where h.patientid=p.patientid and h.hospitalid='$hospitalid'";
			  $tb=$dc->getTable($query);
			  while($rw=mysqli_fetch_array($tb))
			  {
				if($hoxygenid==$rw['patientid'])
            	  echo("<option value=".$rw["patientid"] ." selected>".$rw["patientname"]."</option>");
				else   
		         echo("<option value=".$rw["patientid"] .">".$rw["patientname"]."</option>");
			  }
			?>
		   </select>
	 </div>

		 <div class="form-group">
		  <label>Hospital Name</label> 
		   <?php 
		    $hospitalid=$_SESSION['regid'];
		    $query1="select hospitalname from hospital where hospitalid='$hospitalid'";
            $hospitalname=$dc->getData($query1);
 		   ?>
		   <input placeholder="hospital name" name="txthospitalname" type="text" class="form-control" readonly value='<?php echo($hospitalname) ?>' >

		    
		  
		 </div>
        <div class="form-group">
		  <label>Quantity</label> 
		  <input placeholder="Enter quantity" id="quantityid" name="txtquantity" type="text" class="form-control"  value="1" readonly>
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
	