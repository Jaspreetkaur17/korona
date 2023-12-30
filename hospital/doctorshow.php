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
	  if(isset($_POST['btnnew']))
	  {
		$_SESSION['trans']="new";   
		header('location:doctorform.php');  
	  }
	  
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
				  <h3 style="text-align:center">DOCTOR DETAILS</h3>
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
							<th>DOCTOR ID</th>
							<th>DOCTOR NAME</th>
							<th>CONTACT NO</th>
							<th>EMAIL ID</th>
							<th>CITY</th>
							<th>QUALIFICATION</th>
							<th>EXPERIENCE</th>
							<th>SPECIFICATION</th>
							<th>DESCRIPTION</th>
							<th>IMG</th>


						</tr>
				  </thead>	
					<?php 
					    $query="select doctorid, doctorname, h.hospitalname, d.contactno, d.emailid, qualification, experience, specification, description, d.img from doctor d, hospital h where d.hospitalid = h.hospitalid" ; 
					    $tb=$dc->getTable($query);
						$count=0;
						while($rw=mysqli_fetch_array($tb))
						{
						   echo("<tr>");
						      echo("<td>".$rw['doctorid']."</td>");
							  echo("<td>".$rw['doctorname']."</td>");
							  echo("<td>".$rw['hospitalname']."</td>");
							  echo("<td>".$rw['contactno']."</td>");
							  echo("<td>".$rw['emailid']."</td>");
							  echo("<td>".$rw['qualification']."</td>");
							  echo("<td>".$rw['experience']."</td>");
							  echo("<td>".$rw['specification']."</td>");
							  echo("<td>".$rw['description']."</td>");
							  echo("<td>".$rw['img']."</td>");

						   echo("</tr>");
						   $count++;
						}
						 echo("</tbody>");
						 echo("<tr style='background-color:grey;color:white'>");
						      
						      echo("<td colspan='10'>Total Records : ".$count."</td>");
							  
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