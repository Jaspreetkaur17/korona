<html> 
<head>
   <?php 
     session_start(); 
     include("csslink.php");
     include("../class/dataclass.php");
   ?>
   
   <?php
   
     $medicineid="";
	 $medicinename="";
	 $medicinetype="";
	 $company="";
	 $form="";
	 $agegrp="";
	 $category="";
	 $unit="";
	 $power="";
	 $description="";
	 $img="";
	 $dc=new dataclass();
	 $msg1="";
	 $msg2="";
   ?>
   
   
   <?php
     if(isset($_SESSION['trans']))
	 {
	   $msg1=$_SESSION['trans']." Record";
	 }
	 
	 if($_SESSION['trans']=="update")
	 {
	   $medicineid=$_SESSION['medicineid'];
	   $query="select * from medicine where medicineid='$medicineid'";
	   $rw=$dc->getRecord($query);
	   $medicinename=$rw['medicinename'];
	   $medicinetype=$rw['medicinetype'];
	   $company=$rw['company'];
	   $form=$rw['form'];
	   $agegrp=$rw['agegrp'];
	   $category=$rw['category'];
	   $unit=$rw['unit'];
	   $power=$rw['power'];
	   $description=$rw['description'];
	   $img=$rw['img'];
	 }
	 
	 if(isset($_POST['btnsave']))
	 {
	   $medicinename=$_POST['txtmedicinename'];
	   $medicinetype=$_POST['txtmedicinetype'];
	   $company=$_POST['txtcompany'];
	   $form=$_POST['txtform'];
	   $agegrp=$_POST[txtagegrp];
	   $category=$_POST[txtcategory];
	   $unit=$_POST[txtunit];
	   $power=$_POST[txtpower];
	   $description=$_POST[txtdescription];
	   $img=$_POST[txtimg];

	   $query="";	 
	  if($_SESSION['trans']=="new")
	  {
	     $query="insert into medicine(medicinename,medicinetype,company,form,agegrp,category,unit,power,description,img) values('$medicinename','$medicinetype','$company','$form','$agegrp','$category','$unit','$power','$description','$img')";
	  }
	  if($_SESSION['trans']=="update")
	  {
	   $medicineid=$_SESSION['medicineid'];  
	   $query="update medicine set medicinename='$medicinename',medicinetype='$medicinetype',company='$company',form='$form',agegrp='$agegrp',category='$category',unit='$unit',power='$power',description='$description',img='$img' where medicineid='$medicineid'";
	  }
	  $result=$dc->saveRecord($query);
	  if($result)
	  {
		  $_SESSION['trans']="";
		  header('location:medicineshow.php');
	  }
	  else
	  {
	    $msg2="Record not saved...";
	  }
		
	 } 
		if(isset($_POST['btncancel']))
		 {
			header('location:medicineshow.php');
		 }

   ?>
   
      
   
   <style type="text/css">
     .form-control
	 {
		
	    border:1px solid grey!important;
		border-radius:8px!important;
	 }
   
   </style>
   
</head>
<body>
  <form name="frm" action="#" method="post">
    <div class="main-wrapper">
    <?php include("header.php"); ?>
	<?php include("sidebar.php"); ?>
	
      
		<div class="page-wrapper">
		   <div class="content" style="background-color:white">
		     <div class="row">
			  <div class="col-md-3"></div>
			  <div class="col-md-6">
			   <h2>Medicine Form</h2>
			   <p><?php echo($msg1) ?></p>
			  </div>
			 </div> 
		  <div class="row">
		  <div class="col-md-3"></div>
		  <div class="col-md-6">
		  <div class="form-group">
		  <label>Medicine Name</label> 
		  <input placeholder="Enter Medicine Name" id="medicinename" name="txtmedicinename" type="text" class="form-control" autofocus value='<?php echo($medicinename); ?>'>
		 </div>
		  <div class="form-group">
		  <label>Medicine Type</label> 
		  <input placeholder="Enter Medicine Type" id="medicinetype" name="txtmedicinetype" type="text" class="form-control" value='<?php echo($medicinetype); ?>'>
		 </div>
		 <div class="form-group">
		  <label>company</label>
		  <input placeholder="Enter Company" id="company" name="txtcompany" type="text" class="form-control" value='<?php echo($company); ?>'>
		  </div>
		  <div class="form-group">
		  <label>form</label>
		  <input placeholder="Enter Form" id="form" name="txtform" type="text" class="form-control" value='<?php echo($form); ?>'>
		  </div>
		 <div class="form-group">
		  <label>agegrp</label>
		  <input placeholder="Enter agegrp" id="agegrp" name="txtagegrp" type="text" class="form-control" value='<?php echo($agegrp); ?>'>
		  </div>
		 <div class="form-group">
		  <label>category</label>
		  <input placeholder="Enter Category" id="category" name="txtcategory" type="text" class="form-control" value='<?php echo($category); ?>'>
		  </div>
		 <div class="form-group">
		  <label>unit</label>
		  <input placeholder="Enter unit" id="unit" name="txtunit" type="text" class="form-control" value='<?php echo($unit); ?>'>
		  </div>
		 <div class="form-group">
		  <label>power</label>
		  <input placeholder="Enter power" id="power" name="txtpower" type="text" class="form-control" value='<?php echo($power); ?>'>
		  </div>
		 <div class="form-group">
		  <label>description</label>
		  <input placeholder="Enter description" id="description" name="txtdescription" type="text" class="form-control" value='<?php echo($description); ?>'>
		  </div>
		 <div class="form-group">
		  <label>img</label>
		  <input placeholder="Enter img" id="img" name="txtimg" type="text" class="form-control" value='<?php echo($img); ?>'>
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