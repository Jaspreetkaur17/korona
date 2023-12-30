<html>
  <head>
    <?php
    session_start();	
	include('csslink.php');  
	include('../class/dataclass.php');
	?>
	
	<?php
	  $contactdate="";
	  $personname="";
	  $details="";
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
		 $contactdate=date('y-m-d');
		 $personname=$_POST['txtpersonname'];
		 $details=$_POST['txtdetails'];
		 $contactno=$_POST['txtcontactno'];
		 $emailid=$_POST['txtemailid'];
		 $reply="no";
		 $query="insert into contact(contactdate,personname,details,contactno,emailid,reply) values('$contactdate','$personname','$details','$contactno','$emailid','$reply')";
		 $result=$dc->saveRecord($query);
		 if($result)
		 {
		   $msg="Contact Details Send Successfully...";
		 }
		 else
		 {
		   $msg="Contact Details not Send....";
		 }
		 
	  }
	  
	  if(isset($_POST['btncancel']))
	  {
		  header('location:mainhome.php');
	  }
	?>
	
	
	<style>
	#contactform{
		border-radius:20px;
	}
	</style>
	
	   <script>
   function checksubmit()
	  {
	  if(spndetl.innerHTML!=""  || spnmobno.innerHTML!="" || spnemail.innerHTML!="" )
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
    <form name="frmhome" action="#" method="post">
    <div id="wrapper" class="home-page">
	  <?php include('navbar.php');  ?>
	  <?php include('menu.php');  ?>
	
	  
	  <div class='container' style='margin-top:22px;margin-bottom:22px;'> 
	<div class="row">
   <div class="col-md-4"></div>
   <div class="col-md-4" id='contactform' style='box-shadow:5px 10px 18px #009efb75;' >
	 
	 <div class="form-group">
		<h2>CONTACT FORM</h2> 
	</div>

	<div class="form-group">
	<label>User Name *</label>
	
	<input type="text" name="txtpersonname" id="personname" class="form-control" placeholder="Enter Your Name" onChange="onlyalpha(this,spnpname1)" required>
	<span id="spnpname1"></span>
	</div>

	<div class="form-group">
	<label>Details *</label>
	<textarea name="txtdetails" id="details" class="form-control" rows="3" onChange="checkchlength(this,spndetl,3,30)"></textarea>
    <span id="spndetl"></span>
	</div>					
	
	 <div class="form-group">
	<label>Contact No *</label>
	 
	 <input type="text" name="txtcontactno" id="contact" class="form-control" placeholder="Enter User Contact" onChange="checkmobileno(this,spnmobno) " required>
	  <span id="spnmobno"></span>
	  </div>          
	  
	 <div class="form-group">
	<label>Email id *</label>
	 
	 <input type="text" name="txtemailid" id="emailid" class="form-control" placeholder="Enter Email Address" onChange="checkemail(this,spnemail)" required>
	  <span id="spnemail"></span>
	</div>          

	 <div class="form-group">
   	  <input type="submit" name="btnsubmit" value="Submit" class="btn btn-success" onclick="return checksubmit()">
	  <input type="submit" name="btncancel" value="Cancel"  class="btn btn-danger" formnovalidate  >
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