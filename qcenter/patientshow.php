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
  

	</head>
	<body>
	<form name="frmapnt" action="#" method="post">
		<div class="main-wrapper">
		<?php include("navbar.php"); ?>
		<div class="page-wrapper">
			<div class="content">
				<div class="Row">
				<div class="col-md-11">
				  <h3 style="text-align:center">PATIENT DETAILS</h3>
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

						</tr>
				  </thead>	
					<?php 
					    $qcenterid=$_SESSION['regid'];

						$query="select qreqid,qreqdate,patientname,p.contactno,p.emailid,gender,qcentername from qurantinecenter q,patient p,qrequest r where r.qcenterid=q.qcenterid and r.patientid=p.patientid and status='accept' and q.qcenterid='$qcenterid'  "; 

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
           <?php include("footer.php") ?>
      </div>
	  </form>
    <?php include("jslink.php") ?>
</body>

</html>