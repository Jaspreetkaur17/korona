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
	   $qcenterid=$_POST['btndelete'];
	   $query="delete from qurantinecenter where qcenterid='$qcenterid'";
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
		header('location:qcenterform.php');  
	  }
	  
	  if(isset($_POST['btnupdate']))
	  {
		$qcenterid=$_POST['btnupdate'];  
		$_SESSION['qcenterid']=$qcenterid;
		$_SESSION['trans']="update";   
		header('location:qcenterform.php');  
	  }
   ?>

	</head>
	<body>
	<form name="frmcity" action="#" method="post">
		<div class="main-wrapper">
		<?php include("header.php"); ?>
		<?php include("sidebar.php"); ?>
		<div class="page-wrapper">
			<div class="content">
				<div class="Row">
				<div class="col-md-11">
				  <h3 style="text-align:center">QURANTINE CENTER DETAILS</h3>
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
							<th>QCENTER ID</th>
							<th>QCENTER NAME</th>
							<th>ADDRESS</th>
							<th>CITY</th>
							<th>CONTACT NO</th>
							<th>EMAIL ID</th>
							<th>HEAD</th>
							<th>CAPACITY</th>
							<th>FACILITIES</th>
							<th>MANAGEDBY</th>
							<th>UPDATE</th>
							<th>DELETE</th>
						</tr>
				  </thead>	
					<?php 
					    $query="select qcenterid,qcentername,address,cityname,contactno,emailid,head,capacity,facilities,managedby from  qurantinecenter q,city c where c.cityid=q.cityid" ; 
					    $tb=$dc->getTable($query);
						$count=0;
						while($rw=mysqli_fetch_array($tb))
						{
						   echo("<tr>");
						      echo("<td>".$rw['qcenterid']."</td>");
							  echo("<td>".$rw['qcentername']."</td>");
							  echo("<td>".$rw['address']."</td>");
							  echo("<td>".$rw['cityname']."</td>");
							  echo("<td>".$rw['contactno']."</td>");
							  echo("<td>".$rw['emailid']."</td>");
							  echo("<td>".$rw['head']."</td>");
							  echo("<td>".$rw['capacity']."</td>");
							  echo("<td>".$rw['facilities']."</td>");
							  echo("<td>".$rw['managedby']."</td>");

							  echo("<td><button type='submit' class='btn btn-primary' name='btnupdate' value='".$rw['qcenterid']."'>UPDATE</button></td>");
							  echo("<td><button type='submit' class='btn btn-danger' name='btndelete' value='".$rw['qcenterid']."'>DELETE</button></td>");
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