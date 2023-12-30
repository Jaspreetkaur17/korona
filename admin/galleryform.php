<html> 
<head>
   <?php 
     session_start(); 
     include("csslink.php");
     include("../class/dataclass.php");
   ?>
   
   <?php
     $imgid="";
	 $title="";
	 $imgtype="";
	 $imgsize="";
	 $filename="";
	 $tmpname="";
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
	 
	 if($_SESSION['trans']=="update")
	 {
	   $imgid=$_SESSION['imgid'];
	   $query="select * from gallery where imgid='$imgid'";
	   $rw=$dc->getRecord($query);
	   $title=$rw['title'];
	   $description=$rw['description'];
	 }
	 
	 if(isset($_POST['btnsave']))
	 {
	    $title=$_POST['txttitle'];
	    $filename=$_FILES['fupimage']['name'];
		$imgtype=$_FILES['fupimage']['type'];
	    $imgsize=$_FILES['fupimage']['size'];
		$tmpname=$_FILES['fupimage']['tmp_name'];
		$description=$_POST['txtdescription'];
	    $query="";	 
		
		 if(isset($_FILES['fupimage'])|| $filename!='')
		 {
		    $ext=pathinfo($filename,PATHINFO_EXTENSION);
	        $filename="img".$imgid.".".$ext;	
		 }
		
	  if($_SESSION['trans']=="new")
	  {
		 $imgid=$dc->primary("select max(imgid) from gallery"); 
		 if(isset($_FILES['fupimage'])|| $filename!='')
		 {
		    $ext=pathinfo($filename,PATHINFO_EXTENSION);
	        $filename="img".$imgid.".".$ext;	
		 }
		 
	     $query="insert into gallery(imgid,title,imgtype,imgsize,filename,description) values('$imgid','$title','$imgtype','$imgsize','$filename','$description')";
	  }
	  if($_SESSION['trans']=="update")
	  {
	   $imgid=$_SESSION['imgid'];  
	   if(isset($_FILES['fupimage'])|| $filename!='')
	    {	
	     $query="update gallery set title='$title',imgtype='$imgtype',imgsize='$imgsize',filename='$filename',description='$description' where imgid='$imgid'";
	   }
	   else
	   {
	     $query="update gallery set title='$title',description='$description' where imgid='$imgid'";
	   }
	  }
	  $result=$dc->saveRecord($query);
	  if($result)
	  {
		  if(isset($_FILES['fupimage'])|| $filename!='')
		  {
	       move_uploaded_file($tmpname,"gallery/".$filename);
		  }
		  $_SESSION['trans']="";
		  header('location:galleryshow.php');
	  }
	  else
	  {
	    $msg2="Record not saved...";
	  }
		
	 } 
	 if(isset($_POST['btncancel']))
	 {
	 	 $_SESSION['trans']="";
		  header('location:galleryshow.php');
	 }
   ?>
   
      
   
   <style type="text/css">
     .form-control
	 {
		    label{
					font-weight:bold; 
				 }
			 .form-control
			 {
				
				border:1px solid grey!important;
				border-radius:8px!important;
			 }

	 }
   
   </style>
   
</head>

<body>
  <form name="frm" action="#" method="post">
    <?php include("header.php"); ?>
	<?php include("sidebar.php"); ?>

	<div class="main-wrapper">
    	
      
		<div class="page-wrapper">
		<div class="row" style="margin-left:20px;margin-right:60px">
		<div class="col-md-1"></div>
		<div class="col-md-10 " style="background-color:white;margin:20px">
		   <div class="content" style="background-color:white;">
		   
		     <div class="row" >
			  <div class="col-md-9 offset-md-3">

			   <h2>GALLERY FORM</h2>
			   <p><?php echo($msg1) ?></p>
			  </div>
			 </div> 
		  <div class="row">
		  <div class="col-md-3"></div>
		  <div class="col-md-6">
		  <div class="border border-secondary shadow mb-5 p-3" style="border-radius:25px">
		  
		  <div class="form-group">
		  <label>Title</label> 
		  <input placeholder="Enter Image Title" id="title" name="txttitle" type="text" class="form-control" autofocus value='<?php echo($title) ?>'>
		 </div>
		  <div class="form-group">
		  <label>File Name</label> 
		  <input id="fname" name="fupimage" type="file" class="form-control">
		 </div>
		 <div class="form-group">
		  <label>Description</label> 
		  <textarea id="desc" name="txtdescription" class="form-control" rows="4"> <?php echo($imgsize) ?> </textarea>
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