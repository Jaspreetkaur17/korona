<html> 
<head>
   <?php 
     session_start(); 
     include("csslink.php");
     include("../class/dataclass.php");
   ?>
      
   <?php
     $msg="";
     $dc=new dataclass();
   ?>
   
   <?php
     if(isset($_POST['btndelete']))
	 {
	   $imgid=$_POST['btndelete'];
	   $query="delete from gallery where imgid='$imgid'";
	   $result=$dc->saveRecord($query);
	   if($result)
	   {
	     $msg="Delete Record Successfully...";
	   }
	   else
	   {
	     $msg="Record not Deleted...";
	   }
	 }
	  if(isset($_POST['btnnew']))
	  {
		$_SESSION['trans']="new";   
		header('location:galleryform.php');  
	  }
	  
	  if(isset($_POST['btnupdate']))
	  {
		$imgid=$_POST['btnupdate'];  
		$_SESSION['imgid']=$imgid;
		$_SESSION['trans']="update";   
		header('location:galleryform.php');  
	  }
   ?>
</head>

<body>
  <form name="frm" action="#" method="post">
    <div class="main-wrapper">
    <?php include("header.php"); ?>
	<?php include("sidebar.php"); ?>
	
      
		<div class="page-wrapper">
		   <div class="content">
		   
		    <div class="Row" style="margin-top:20px">
		    <div class="col-md-11">
			  <h3 style="text-align:center">GALLERY DETAILS</h3>
			</div>
			<div class="col-md-1">
			   <input type='submit' class='btn btn-primary' name='btnnew' value='NEW'>
			</div>
			
		   </div>
		   
		   <div class="Row">
		    <div class="col-md-12">
			
 		      <table class="table table-bordered table-hover" id="dbtab" style="background-color:white">
                 <thead> 
					 <tr style="background-color:lightblue">
							<th>IMAGE ID</th>
							<th>TITLE</th>
							<th>IMAGE TYPE</th>
							<th>IMAGE SIZE</th>
							<th>FILE NAME</th>
							<th>UPDATE</th>
							<th>DELETE</th>
						</tr>
				  </thead>	
				  <tbody>	
					   <?php 
					    $query="select * from gallery";
						$tb=$dc->getTable($query);
						$count=0;
						while($rw=mysqli_fetch_array($tb))
						{
						   echo("<tr>");
						      echo("<td>".$rw['imgid']."</td>");
							  echo("<td>".$rw['title']."</td>");
							  echo("<td>".$rw['imgtype']."</td>");
							  echo("<td>".$rw['imgsize']."</td>");
							  echo("<td>".$rw['filename']."</td>");
							  echo("<td><button type='submit' class='btn btn-primary' name='btnupdate' value='".$rw['imgid']."'>UPDATE</button></td>");
							  echo("<td><button type='submit' class='btn btn-danger' name='btndelete' value='".$rw['imgid']."'>DELETE</button></td>");
						   echo("</tr>");
						   $count++;
						}
						 echo("</tbody>");
						 echo("<tr style='background-color:grey;color:white'>");
						      
						      echo("<td colspan='7'>Total Records : ".$count."</td>");
							  
			              echo("</tr>"); 
						  
						  if($count==0)
						  {
						    $msg="Record not found..";
						  }
					   ?>
					
				  </table>		
		      </div>
			  </div>
			  <div class="Row">
		       <div class="col-md-12">
			    <h3> <?php echo($msg) ?> </h3>
			   </div>
			   </div>
           </div>
      </div>
	  </form>
    <?php include("jslink.php") ?>
</body>

</html>