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
	   $labid=$_POST['btndelete'];
	   $query="delete from laboratory where labid='$labid'";
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
		header('location:labform.php');  
	  }
	  
	  if(isset($_POST['btnupdate']))
	  {
		$labid=$_POST['btnupdate'];  
		$_SESSION['labid']=$labid;
		$_SESSION['trans']="update";   
		header('location:labform.php');  
	  }
   ?>

	</head>
	<body>
	<form name="frmlab" action="#" method="post">
		<div class="main-wrapper">
		<?php include("header.php"); ?>
		<?php include("sidebar.php"); ?>
		<div class="page-wrapper">
			<div class="content">
				<div class="Row">
				<div class="col-md-11">
				  <h3 style="text-align:center">LABORATORY DETAILS</h3>
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
							<th>LAB ID</th>
							<th>LAB NAME</th>
							<th>LAB TYPE</th>
							<th>ADDRESS</th>
							<th>CITY ID</th>
							<th>HEAD</th>
							<th>TEST TYPE</th>
							<th>MANAGED BY</th>
							<th>FACILITIES</th>
							<th>CONTACT NO</th>
							<th>EMAIL ID</th>
							<th>UPDATE</th>
							<th>DELETE</th>
						</tr>
				  </thead>	
					<?php 
					    $query="select labid,labname,labtype,address,l.cityid,head,testtype,managedby,facilities,contactno,emailid
						from laboratory l,city c where l.cityid=c.cityid" ; 
					    $tb=$dc->getTable($query);
						$count=0;
						while($rw=mysqli_fetch_array($tb))
						{
						   echo("<tr>");
						      echo("<td>".$rw['labid']."</td>");
							  echo("<td>".$rw['labname']."</td>");
							  echo("<td>".$rw['labtype']."</td>");
							  echo("<td>".$rw['address']."</td>");
							  echo("<td>".$rw['cityid']."</td>");
							  echo("<td>".$rw['head']."</td>");
							  echo("<td>".$rw['testtype']."</td>");
							  echo("<td>".$rw['managedby']."</td>");
							  echo("<td>".$rw['facilities']."</td>");
							  echo("<td>".$rw['contactno']."</td>");
							  echo("<td>".$rw['emailid']."</td>");
							  echo("<td><button type='submit' class='btn btn-primary' name='btnupdate' value='".$rw['labid']."'>UPDATE</button></td>");
							  echo("<td><button type='submit' class='btn btn-danger' name='btndelete' value='".$rw['labid']."'>DELETE</button></td>");
						   echo("</tr>");
						   $count++;
						}
						 echo("</tbody>");
						 echo("<tr style='background-color:grey;color:white'>");
						      
						      echo("<td colspan='13'>Total Records : ".$count."</td>");
							  
			              echo("</tr>"); 
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