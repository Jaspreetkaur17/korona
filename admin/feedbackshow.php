<html>
	<head>
		<?php
			session_start(); 
			include("csslink.php");
			include("../class/dataclass.php");
		
		
			$msg="";
			$dc=new dataclass();
		
		
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
				  <h3 style="text-align:center">FEEDBACK DETAILS</h3>
				</div>
						
	   </div>
	   <div class="col-md-12">
	   <!-- Table with stripped rows -->
 		      <table class="table table-bordered table-hover" id="dbtab" style="background-color:white">

                <thead>
                  <tr style="background-color:lightblue">
					<th>ID</th>
					<th>FBDATE</th>
					<th>NAME</th>
					<th>DESCRIPTION</th>
					<th>RATING(5)</th>
					
				</tr>
                </thead>
                  <?php 
					    $query="select fbid,fbdate,username,description,rating from feedback f,register r where f.regid=r.regid "; 
					    $tb=$dc->getTable($query);
						$count=0;
						echo("<tbody>");
						while($rw=mysqli_fetch_array($tb))
						{
							echo("<tr>");
							echo("<td>".$rw['fbid']."</td>");
							echo("<td>".$rw['fbdate']."</td>");
							echo("<td>".$rw['username']."</td>");
							echo("<td>".$rw['description']."</td>");
							
							echo("<td>".$rw['rating']."</td>");
							echo("</tr>");
						    $count++;
						}
						 echo("</tbody>");
						 echo("<tr style='background-color:grey;color:white'>");
						      
						      echo("<td colspan='6'>Total Records : ".$count."</td>");
							  
			              echo("</tr>"); 

					   ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
			 <div class="Row">
		       <div class="col-md-12">
			    <h3> <?php echo($msg) ?> </h3>
			   </div>
			   </div>
	   </div>
		</main>
		</form>
	
		<?php include("jslink.php"); ?>
</body>
</html>