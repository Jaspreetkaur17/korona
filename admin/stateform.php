<html> 
<head>
   <?php 
     session_start(); 
     include("csslink.php");
     include("../class/dataclass.php");
   
   
     $stateid="";
	 $statename="";
	 $shortname="";
	 $countryid="";
	 $dc=new dataclass();
	 $msg1="";
	 $msg2="";
   
     if(isset($_SESSION['trans']))
	 {
	   $msg1=$_SESSION['trans']." Record";
	 }
	 
	 if($_SESSION['trans']=="update")
	 {
	   $stateid=$_SESSION['stateid'];
	   $query="select * from state where stateid='$stateid'";
	   $rw=$dc->getRecord($query);
	   $statename=$rw['statename'];
	   $shortname=$rw['shortname'];
	   $countryid=$rw['countryid'];
	 }
	 
	 if(isset($_POST['btnsave']))
	 {
	    $statename=$_POST['txtstatename'];
	    $shortname=$_POST['txtshortname'];
		$countryid=$_POST['lstcountry'];
	   $query="";	 
	  if($_SESSION['trans']=="new")
	  {
	     $query="insert into state(statename,shortname,countryid) values('$statename','$shortname','$countryid')";
	  }
	  if($_SESSION['trans']=="update")
	  {
	   $stateid=$_SESSION['stateid'];  
	   $query="update state set statename='$statename',shortname='$shortname',countryid='$countryid' where stateid='$stateid'";
	  }
	  $result=$dc->saveRecord($query);
	  if($result)
	  {
		  $_SESSION['trans']="";
		  header('location:stateshow.php');
	  }
	  else
	  {
	    $msg2="Record not saved...";
	  }
		
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
   
   </style>
   
</head>
<body>
  <form name="frm" action="#" method="post">
    <?php// include("header.php"); ?>
	<?php //include("sidebar.php"); ?>

	<div class="main-wrapper">
    	
      
		<div class="page-wrapper">
		<div class="row" style="margin-left:20px;margin-right:60px">
		<div class="col-md-1"></div>
		<div class="col-md-10 " style="background-color:white;margin:20px">
		   <div class="content" style="background-color:white;">
		   
		     <div class="row" >
			  <div class="col-md-9 offset-md-3">
			   <h2>State Form</h2>
			   <p><?php echo($msg1) ?></p>
			  </div>
			 </div> 
		  <div class="row" >
		  <div class="col-md-3"></div>
		  <div class="col-md-6">
		  <div class="border border-secondary shadow mb-5 p-3" style="border-radius:25px">
		  <div class="form-group">
		  <label>state Name</label> 
		  <input placeholder="Enter state Name" id="statename" name="txtstatename" type="text" class="form-control" autofocus value='<?php echo($statename); ?>'>
		 </div>
		  <div class="form-group">
		  <label>Short Name</label> 
		  <input placeholder="Enter Short Name" id="shortname" name="txtshortname" type="text" class="form-control" value='<?php echo($shortname); ?>'>
		 </div>
		 <div class="form-group">
		  <label>Country Name</label> 
		  <select name="lstcountry" class="form-control rounded-pill"> 
		    <?php
			  $query="select countryid,countryname from country";
			  $tb=$dc->getTable($query);
			  while($rw=mysqli_fetch_array($tb))
			  {
				if($stateid==$rw['stateid'])
            	  echo("<option value=".$rw["countryid"] ." selected>".$rw["countryname"]."</option>");
				else   
		         echo("<option value=".$rw["countryid"] ." >".$rw["countryname"]."</option>");
			  }
			?>
		   </select>
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
		   </div>
      </div>
	  </form>
    <?php include("jslink.php") ?>
</body>

</html>