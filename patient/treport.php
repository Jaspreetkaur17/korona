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
	<form name="frmcity" action="#" method="post">
		<div class="main-wrapper">
		<?php include("navbar.php"); ?>
		<?php include("menu.php"); ?>
		<div class="page-wrapper">
			<div class="content">
				<div class="Row">
				<div class="col-md-11">
				  <h3 style="text-align:center">REPORT DETAILS</h3>
				</div>
			
				</div>
						   <div class="Row">
		    <div class="col-md-12">
			
 		      <table class="table table-bordered table-hover" id="dbtab" style="background-color:white">
                 <thead> 
					 <tr style="background-color:lightblue">
							<th>Test ID</th>
							<th>Test Date</th>
							<th>Tcenter Name</th>
							<th>Patient Name</th>
							<th>Tested By</th>
							<th>Result</th>
							<th>Level</th>
							<th>suggestion</th>
						</tr>
				  </thead>	
					<?php 
					  $patientid=$_SESSION['regid'];
					  $query="select testid,testdate,tcentername,patientname,testedby,level,result,suggestion from  testing t,patient p, testingcenter tc where t.patientid=p.patientid and t.tcenterid=tc.tcenterid and p.patientid='$patientid'" ; 
					    $tb=$dc->getTable($query);
						$count=0;
						while($rw=mysqli_fetch_array($tb))
						{
						   echo("<tr>");
						      echo("<td>".$rw['testid']."</td>");
							  echo("<td>".$rw['testdate']."</td>");
							  echo("<td>".$rw['tcentername']."</td>");
							  echo("<td>".$rw['patientname']."</td>");
							  echo("<td>".$rw['testedby']."</td>");
							  echo("<td>".$rw['result']."</td>");
							  
							  echo("<td>".$rw['level']."</td>");
							  echo("<td>".$rw['suggestion']."</td>");
						   echo("</tr>");
						   $count++;
						}
						 echo("</tbody>");
						 echo("<tr style='background-color:grey;color:white'>");
						      
						      echo("<td colspan='8'></td>");
							  
			              echo("</tr>"); 
					?>
								</table>		


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