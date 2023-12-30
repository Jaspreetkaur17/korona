<html>
  <head>
    <?php
    session_start();	
	include('csslink.php');  
	include('../class/dataclass.php');
	?>
	<?php
	  $apntid="";	
	  $patientid="";
	  $tcenterid="";
	  $apnttime="";
	  $contactno="";
	  $emailid="";
	  $reply="";
      $msg="";
	  $query="";
	  $dc=new dataclass();
	?>
	<?php
    
	  if(isset($_POST['btnsubmit']))
	  {
		 $apntdate=date('y-m-d');
		 $patientid=$_SESSION['regid'];
		 $tcenterid=$_POST['lsttcenter'];
         $apnttime=$_POST['txtapnttime'];
		 $contactno=$_POST['txtcontactno'];
		 $emailid=$_POST['txtemailid'];
		 $reply="no";
		 $query="insert into appointment(apntdate,patientid,tcenterid,apnttime,contactno,emailid,reply) values('$apntdate','$patientid','$tcenterid','$apnttime','$contactno','$emailid','$reply')";
		 $result=$dc->saveRecord($query);
		 if($result)
		 {
		   $msg="Appointment Details Send Successfully...";
		 }
		 else
		 {
		   $msg="Appointment Details not Send....";
		 }
		 
	  }
	  
	  if(isset($_POST['btncancel']))
	  {
		  header('location:patienthome.php');
	  }

	?>
	   <script>
		function checksubmit()
		  {
			  if(lblpname.innerHTML!=""  || lblmobno.innerHTML!="" || lblemail.innerHTML!="")
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


	<style>
	#appform{
		border-radius:20px;
	}
	</style>
 </head>
  <body>
    <form name="frmhome" action="#" method="post">
    <div id="wrapper" class="home-page">
	  <?php include('navbar.php');  ?>
	  <?php include('menu.php');  ?>
	<div class='container' style='margin-top:22px;margin-bottom:22px;'>
		<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4" id='appform' style='box-shadow:5px 10px 18px #009efb75;'>
	 
		<div class="form-group">
			<h2>Appointment FORM</h2> 
		</div>


	<div class="form-group">
		  <label>testing center Name</label> 
		  <select name="lsttcenter" class="form-control"> 
		    <?php
			  $query="select tcenterid,tcentername from testingcenter";
			  $tb=$dc->getTable($query);
			  while($rw=mysqli_fetch_array($tb))
			  {
				if($tcenterid==$rw['tcenterid'])
            	  echo("<option value=".$rw["tcenterid"] ." selected>".$rw["tcentername"]."</option>");
				else   
		         echo("<option value=".$rw["tcenterid"] .">".$rw["tcentername"]."</option>");
			  }
			?>
		   </select>

	</div>					
	
	<div class="form-group">
	<label>Appointment time</label> 
	<input type="text" name="txtapnttime" id="apnttime" class="form-control" placeholder="Enter Appointment Time" required>
	</div>					

	<div class="form-group">
	<label>Contact no</label> 
	<input type="text" name="txtcontactno" id="contact" class="form-control" placeholder="Enter User Contact" onchange="checkmobileno(this,spnmobno)" required>
	<span id="spnmobno"></span>
	</div>          
	  
	 <div class="form-group">
	 <label>Email address</label> 
	 <input type="text" name="txtemailid" id="emailid" class="form-control" placeholder="Enter Email Address" onchange="checkemail(this,spnemail)" required>
	 <span id="spnemail"></span>
	 </div>          

	 <div class="form-group">
   	  <input type="submit" name="btnsubmit" value="Submit" class="btn btn-success" >
	  <input type="submit" name="btncancel" value="Cancel" class="btn btn-danger" formnovalidate >
	</div>
	
	<div class="form-group">
	 <label> <?php echo($msg); ?> </label>
	</div>
  </div>
  </div>
  </div>
	  
	  
	
     <?php include('footer.php');  ?>
    </div>
   <?php include('jslink.php');  ?>
   </form>
  </body>
  
</html>
	
