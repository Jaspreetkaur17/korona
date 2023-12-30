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
    if(isset($_POST['btnaccept']))
	 {
	   $qreqid=$_POST['btnaccept'];
	   $query="update qrequest set status='accept' where qreqid='$qreqid'";
	   $result=$dc->saveRecord($query);
	   if($result)
	   {
		  $qcenterid=$_SESSION['regid'];
		  $query="update qurantinecenter set bed=bed-1 where qcenterid='$qcenterid'";
		  $dc->saveRecord($query);
	      $msg="Reply Successfully...";
	   }
	   else
	   {
	     $msg="Not Reply...";
	   }
	 }
   ?>

	</head>
	<body>
	<form name="frmapnt" action="#" method="post">
		<div class="main-wrapper">
		<?php include("navbar.php"); ?>
		<div class="page-wrapper">
			<div class="content">
				<div class="Row">
				<div class="col-md-11">
				  <h3 style="text-align:center">REQUEST DETAILS</h3>
				</div>
			
				</div>
						   <div class="Row">
		    <div class="col-md-12">
			
 		      <table class="table table-bordered table-hover datatable" id="dbtab" style="background-color:white">
                 <thead> 
					 <tr style="background-color:lightblue">
							<th>REQUEST ID</th>
							<th>REQUEST DATE</th>
							<th>PATIENT NAME</th>
							<th>CONTACT NO</th>
							<th>EMAIL ID</th>
							<th>GENDER</th>
							<th>Qurantine Center NAME</th>
							<th>ACCEPT</th>
						</tr>
				  </thead>	
					<?php 
					    $qcenterid=$_SESSION['regid'];
					    
						$query="select qreqid,qreqdate,patientname,p.contactno,p.emailid,gender,qcentername from qurantinecenter q,patient p,qrequest r where r.qcenterid=q.qcenterid and r.patientid=p.patientid and status='pending' and q.qcenterid='$qcenterid'"; 

					    $tb=$dc->getTable($query);
						$count=0;
						while($rw=mysqli_fetch_array($tb))
						{
						    echo("<tr>");
						      echo("<td>".$rw['qreqid']."</td>");
							  echo("<td>".$rw['qreqdate']."</td>");
							  echo("<td>".$rw['patientname']."</td>");
							  echo("<td>".$rw['contactno']."</td>");
							  echo("<td>".$rw['emailid']."</td>");
							  echo("<td>".$rw['gender']."</td>");
							  echo("<td>".$rw['qcentername']."</td>");

							  echo("<td><button type='submit' class='btn btn-primary' name='btnaccept' value='".$rw['qreqid']."'>Accept</button></td>");
						    echo("</tr>");
							$count++;
						}
					echo("</tbody>");
						echo("<tr style='background-color:grey;color:white'>");
						      
						    echo("<td colspan='8'>Total Records : ".$count."</td>");
							  
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
           <?php include("footer.php") ?>
      </div>
	  </form>
    <?php include("jslink.php") ?>
</body>

</html>