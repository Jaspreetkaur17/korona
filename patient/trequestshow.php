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
				  <h3 style="text-align:center"> YOUR REQUEST</h3>
				</div>
			
				</div>
						   <div class="Row">
		    <div class="col-md-12">
			
 		      <table class="table table-bordered table-hover datatable" id="dbtab" style="background-color:white">
                 <thead> 
					 <tr style="background-color:lightblue">
							<th>APPOINTMENT ID</th>
							<th>APPOINTMENT DATE</th>
							<th>PERSON NAME</th>
							<th>CONTACT NO</th>
							<th>EMAIL ID</th>
							<th>TESTING CENTER</th>
							<th>APPOINTMENT TIME</th>
							<th>REPLY</th>
						</tr>
				  </thead>	
					<?php 
					    $patientid=$_SESSION['regid'];
					    $query="select apntid, apntdate, p.patientname, p.contactno, p.emailid, apnttime, tcentername, reply from testingcenter t, patient p, appointment a where reply='yes' and a.tcenterid = t.tcenterid and a.patientid = p.patientid";
					    $tb=$dc->getTable($query);
						$count=0;
						while($rw=mysqli_fetch_array($tb))
						{
						    echo("<tr>");
						      echo("<td>".$rw['apntid']."</td>");
							  echo("<td>".$rw['apntdate']."</td>");
							  echo("<td>".$rw['patientname']."</td>");
							  echo("<td>".$rw['contactno']."</td>");
							  echo("<td>".$rw['emailid']."</td>");
							  echo("<td>".$rw['apnttime']."</td>");
							  echo("<td>".$rw['tcentername']."</td>");
							  echo("<td>".$rw['reply']."</td>");

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