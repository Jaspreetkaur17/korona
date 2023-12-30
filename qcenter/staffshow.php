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
		header('location:staffform.php');  
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
				  <h3 style="text-align:center">STAFF DETAILS</h3>
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
							<th>STAFF ID</th>
							<th>STAFF NAME</th>
							<th>CONTACT NO</th>
							<th>EMAIL ID</th>
							<th>CITY</th>
							<th>QUALIFICATION</th>
							<th>EXPERIENCE</th>
							<th>DESCRIPTION</th>


						</tr>
				  </thead>	
					<?php 
					    $query="select staffid, staffname, q.qcentername, s.contactno, s.emailid, qualification, experience,description from staff s, qurantinecenter q where s.qcenterid = q.qcenterid" ; 
					    $tb=$dc->getTable($query);
						$count=0;
						while($rw=mysqli_fetch_array($tb))
						{
						   echo("<tr>");
						      echo("<td>".$rw['staffid']."</td>");
							  echo("<td>".$rw['staffname']."</td>");
							  echo("<td>".$rw['qcentername']."</td>");
							  echo("<td>".$rw['contactno']."</td>");
							  echo("<td>".$rw['emailid']."</td>");
							  echo("<td>".$rw['qualification']."</td>");
							  echo("<td>".$rw['experience']."</td>");
							  echo("<td>".$rw['description']."</td>");

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