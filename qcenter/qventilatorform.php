<html> 
<head>
    <?php 
		session_start(); 
		include("csslink.php");
		include("../class/dataclass.php");
    ?>
   
    <?php
		$qventid="";
		$patientid="";
		$qcenterid="";
		
		$qty="";

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
		$qcenterid=$_SESSION['regid'];
		$patientid=$_POST['lstpatient'];
		$qty=$_POST['txtqty'];
		$query="";	 
	    $query="insert into ventilator(patientid,qcenterid,qty) values('$patientid','$qcenterid','$qty')";
	
	  $result=$dc->saveRecord($query);
	  if($result)
	  {
		  $query="update qurantinecenter set bed=bed-1 where qurantineid='$qurantineid'";
		  $dc->saveRecord($query);
		  $_SESSION['trans']="";
		 // header('location:hbedshow.php');
	  }
	  else
	  {
	    $msg2="Record not saved...";
	  }
		
	 } 
	 		if(isset($_POST['btncancel']))
		 {
			//header('location:hbedshow.php');
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
			   <h2>Ventilator Form</h2>
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
			  $qcenterid=$_SESSION['regid'];
			  $query="select q.patientid,p.patientname from qrequest q, patient p where q.qcenterid=p.patientid and q.qcenterid='$qcenterid'";
			  $tb=$dc->getTable($query);
			  while($rw=mysqli_fetch_array($tb))
			  {
				if($qventilatorid==$rw['patientid'])
            	  echo("<option value=".$rw["patientid"] ." selected>".$rw["patientname"]."</option>");
				else   
		         echo("<option value=".$rw["patientid"] .">".$rw["patientname"]."</option>");
			  }
			?>
		   </select>
	 </div>

		 <div class="form-group">
		  <label>Qurantine Center Name</label> 
		   <?php 
		    $qcenterid=$_SESSION['regid'];
		    $query1="select qcentername from qurantinecenter where qcenterid='$qcenterid'";
            $qcentername=$dc->getData($query1);
 		   ?>
		   <input placeholder="Qurantine Center Name" name="txtqcentername" type="text" class="form-control" readonly value='<?php echo($qcentername) ?>' >

		    
		  
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
	