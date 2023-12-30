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
		header('location:emailform.php');  
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
				  <h3 style="text-align:center">EMAIL DETAILS</h3>
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
							<th>EMAIL ID</th>
							<th>EMAIL DATE</th>
							<th>EMAIL FROM</th>
							<th>EMAIL TO</th>
							<th>SUBJET</th>
							<th>DESCRIPTION</th>

						</tr>
				  </thead>	
					<?php 
					    $query="select * from email"; 
					    $tb=$dc->getTable($query);
						$count=0;
						while($rw=mysqli_fetch_array($tb))
						{
						   echo("<tr>");
						      echo("<td>".$rw['eid']."</td>");
							  echo("<td>".$rw['emaildate']."</td>");
							  echo("<td>".$rw['emailfrom']."</td>");
							  echo("<td>".$rw['emailto']."</td>");
							  echo("<td>".$rw['subject']."</td>");
							  echo("<td>".$rw['description']."</td>");

						   echo("</tr>");
						   $count++;
						}
						 echo("</tbody>");
						 echo("<tr style='background-color:grey;color:white'>");
						      
						      echo("<td colspan='7'>Total Records : ".$count."</td>");
							  
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