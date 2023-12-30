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
							<th>REQUEST ID</th>
							<th>REQUEST DATE</th>
							<th>PATIENT NAME</th>
							<th>CONTACT NO</th>
							<th>EMAIL ID</th>
							<th>GENDER</th>
							<th>HOSPITAL NAME</th>
							<th>STATUS</th>
						</tr>
				  </thead>	
					<?php 
					    $patientid=$_SESSION['regid'];
					    $query="select hreqid,hreqdate,patientname,p.contactno,p.emailid,gender,hospitalname,status from hospital h,patient p,hrequest r where r.hospitalid=h.hospitalid and r.patientid=p.patientid and status='accept' and p.patientid='$patientid'"; 

					    $tb=$dc->getTable($query);
						$count=0;
						while($rw=mysqli_fetch_array($tb))
						{
						    echo("<tr>");
						      echo("<td>".$rw['hreqid']."</td>");
							  echo("<td>".$rw['hreqdate']."</td>");
							  echo("<td>".$rw['patientname']."</td>");
							  echo("<td>".$rw['contactno']."</td>");
							  echo("<td>".$rw['emailid']."</td>");
							  echo("<td>".$rw['gender']."</td>");
							  echo("<td>".$rw['hospitalname']."</td>");
							  echo("<td>".$rw['status']."</td>");

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