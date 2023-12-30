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
		<?php include("header.php"); ?>
		<?php include("sidebar.php"); ?>
		<div class="page-wrapper">
			<div class="content">
				<div class="Row">
				<div class="col-md-11">
				  <h3 style="text-align:center">COMPLAINT DETAILS</h3>
				</div>
				
			
				</div>
						   <div class="Row">
		    <div class="col-md-12">
			
 		      <table class="table table-bordered table-hover" id="dbtab" style="background-color:white">
                 <thead> 
					 <tr style="background-color:lightblue">
							<th>COMPLAINT ID</th>
							<th>COMPLAINT DATE </th>
							<th> PERSON NAME </th>
							<th>COMPLAINT</th>
							<th>DETAILS</th>
							<th>CONTACT NO</th>
							<th>EMAIL ID</th>
							<th>COMPLAINT FOR</th>
						</tr>
				  </thead>	
					<?php 
					    $query="select complaintid,complaintdate,personname,complaint,details,contactno,emailid,complaintfor from complaint" ; 
					    $tb=$dc->getTable($query);
						$count=0;
						while($rw=mysqli_fetch_array($tb))
						{
						   echo("<tr>");
						      echo("<td>".$rw['complaintid']."</td>");
							  echo("<td>".$rw['complaintdate']."</td>");
							  echo("<td>".$rw['personname']."</td>");
							  echo("<td>".$rw['complaint']."</td>");
							  echo("<td>".$rw['details']."</td>");
							  echo("<td>".$rw['contactno']."</td>");
							  echo("<td>".$rw['emailid']."</td>");
							  echo("<td>".$rw['complaintfor']."</td>");
						   echo("</tr>");
						   $count++;
						}
						 echo("</tbody>");
						 echo("<tr style='background-color:grey;color:white'>");
						      
						      echo("<td colspan='8'>Total Records : ".$count."</td>");
							  
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
