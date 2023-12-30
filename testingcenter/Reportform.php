<html>
	<head>
	    <?php 
		 session_start(); 
		 include("csslink.php");
		 include("../class/dataclass.php");
	    ?>
		<?php
		 $testid="";
		 $testdate="";
		 $tcenterid="";
		 $patientid="";
		 $testedby="";
		 $result="";	 
		 $level="";
		 $suggestion="";
		 $msg1="";
		 $msg2="";
		 $dc=new dataclass();
		?>
		<?php
	 if(isset($_POST['btnsave']))
	 {
		$testdate=date('y-m-d');
		$tcenterid=$_SESSION['regid'];
		$patientid=$_POST['lstpatient'];
		$testedby=$_POST['txttestedby'];
		$result=$_POST['txtresult'];
		$level=$_POST['txtlevel'];
		$suggestion=$_POST['txtsuggestion'];
		$query="";	 
	    $query="insert into testing(testdate,tcenterid,patientid,testedby,result,level,suggestion) values('$testdate','$tcenterid','$patientid','$testedby','$result','$level','$suggestion')";
	  
	    $result=$dc->saveRecord($query);
	    if($result)
	    {
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
			header('location:testinghome.php');
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
		  if(spntest.innerHTML!="" || spnresult.innerHTML!="" || spnsgn.innerHTML!="" )
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
	
   <div class='container' style='margin-top:22px;margin-bottom:22px;'> 
	 <div class="row">
	 <div class="col-md-4"></div>
		<div class="col-md-4" id='reportform' style='box-shadow:5px 10px 18px #009efb75;' >
	    <div class="form-group">  <h2> Testing Form</h2></div>
	
	      <div class="form-group">
		   <label>Testingcenter Name</label> 
		   <?php 
		    $tcenterid=$_SESSION['regid'];
		    $query1="select tcentername from testingcenter where tcenterid='$tcenterid'";
            $tcentername=$dc->getData($query1);
 		   ?>
		   <input placeholder="Testingcenter Name" name="txttcentername" type="text" class="form-control" readonly value='<?php echo($tcentername) ?>' >
		 </div>
	 
	   <div class="form-group">
		  <label>Patient Name</label> 
		  <select name="lstpatient" class="form-control" value="<?php echo($patientid)?>" > 
		    <?php
			  $tcenterid=$_SESSION['regid'];
			  $query="select a.patientid,p.patientname from appointment a, patient p where a.patientid=p.patientid and a.tcenterid='$tcenterid'";

			  $tb=$dc->getTable($query);
			  while($rw=mysqli_fetch_array($tb))
			  {
				if($testid==$rw['patientid'])
            	  echo("<option value=".$rw["patientid"] ." selected>".$rw["patientname"]."</option>");
				else   
		         echo("<option value=".$rw["patientid"] .">".$rw["patientname"]."</option>");
			  }
			?>
		   </select>
	   </div>
	      <div class="form-group">
		  <label>Tested By *</label>
	      <input type="text" name="txttestedby" id="testedby" class="form-control" placeholder="Enter Testedby" onChange="checkchlength(this,spntest,3,50)" required>
	      <span id="spntest"></span>
		  </div>

	      <div class="form-group">
		  <label>Result *</label>
	      <input type="text" name="txtresult" id="result" class="form-control" placeholder="Enter Result" onchange="onlyalpha(this,spnresult)" required>
	      <span id="spnresult"></span>
	      </div>
	      
		  <div class="form-group">
		  <label>Level *</label>
	      <input type="text" name="txtlevel" id="level" class="form-control" placeholder="Enter Level" required >
	      </div>
	      
		  <div class="form-group">
		  <label>Suggestion </label>
	      <input type="text" name="txtsuggestion" id="suggestion" class="form-control" placeholder="Enter Suggestion" onChange="checkchlength(this,spnsgn,3,50)">
	      <span id="spnsgn"></span>
	     
		 </div>

		 <div class="form-group">
		    <input id="save" name="btnsave" type="submit" class="btn btn-success" value="Save" onclick="return checksubmit()">
			<input id="cancel" name="btncancel" type="submit" class="btn btn-danger" value="Cancel" formnovalidate >
		 </div>
			  
			  </div>
			</div>  
		  
           </div>
      </div>
	 
	  </form>
    <?php include("jslink.php") ?>
</body>

</html>     
	