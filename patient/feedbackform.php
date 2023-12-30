<html> 
<head>
   <?php 
     session_start(); 
     include("csslink.php");
     include("../class/dataclass.php");
   
   
     $fbid="";
	 $fbdate="";
	 $regid="";
	 $description="";
	 $fbfor="";
	 $rating="";
	 $dc=new dataclass();
	 $msg="";
  ?> 
<?php 	 
	if(isset($_POST['btnsave']))
 {
     $fbdate=date('y-m-d');
	 $description=$_POST['txtdescription'];
	 $regid=$_SESSION['regid'];
	 $rating=$_POST['lstrat'];
	 $fbfor=$_POST['lstfb'];
	 $query="insert into feedback(fbdate,regid,description,rating,fbfor) values('$fbdate','$regid','$description','$rating','$fbfor')";   
	 $result=$dc->saveRecord($query);
	 if($result)
	 {
	   $msg="Feedback submit successfully...";
	 }
	 else
	 {
	   $msg="Feedback not submited...";
	 }
 }	
if(isset($_POST['btncancel']))
{
	header('location:patienthome.php');
}	
?>
   <style type="text/css">
   label{
	  font-weight:bold; 
   }
     .form-control
	 {
		
	    border:1px solid grey!important;
		border-radius:8px!important;
	 }
   #contactform{
		border-radius:20px;
	}
   </style>
   

</head>
  <body>
		<form name="frmhome" action="#" method="post">

    <?php include("navbar.php"); ?>
	  <?php include('menu.php');  ?>

	<div class="main-wrapper">
    	
		<div class="container" style='margin-top:22px;margin-bottom:22px;width:900px'>
		   <div id='contactform' style='box-shadow:5px 10px 18px #009efb75;'>
		     <div class="row"  >
			  <div class="col-md-9 offset-md-3">
			   <h2>FEEDBACK FORM</h2>
			  </div>
			 </div>
					<div class="row" >
		  <div class="col-md-3"></div>
		  <div class="col-md-6">
		  <div class="form-group">
		  <label> Feedback</label> 
		  <input placeholder="Enter feedback" type="text" name="txtdescription" class="form-control" onchange="checkchlength(this,spnfdb,5,50)" required >
	     <span id="spnfdb"></span>
		 </div>
		<div class="form-group" >
		  <label>Rating</label> 
		  <select name="lstrat" class="form-control"> 
		    <option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		   </select>
		 </div> 	
		 
		<div class="form-group">
		  <label>Feedback For</label> 
		 <select name="lstfb" class="form-control"> 
			<option value='0'>website service</option>
		    <?php
			  $query="select hospitalid,hospitalname from hospital";
			  $tb=$dc->getTable($query);
			  while($rw=mysqli_fetch_array($tb))
			  {
				if($hospitalid==$rw['hospitalid'])
            	  echo("<option value=".$rw["hospitalid"] .">".$rw["hospitalname"]."</option>");
				else   
		         echo("<option value=".$rw["hospitalid"] ." >".$rw["hospitalname"]."</option>");
			  }
			?>
		   </select>
		 </div> 	
			 <div class="form-group">
		   <input id="save" name="btnsave" type="submit" class="btn btn-success" value="SAVE">
			<input id="cancel" name="btncancel" type="submit" class="btn btn-danger" value="CANCEL" formnovalidate>
	
		 </div><label><?php echo($msg); ?></label> 
	
		</div>
		<div class="col-md-3"></div>
		<div class="row">
		<div class="col-md-12">

		 <center>
		
		</div> 
	</div>
	</div>
	
			</div>
		</div>
     <?php include("footer.php") ?>
     <?php include("jslink.php") ?>
</form>
</body>

</html>
