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
				header('location:msgform.php');  
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
				  <h3 style="text-align:center">MESSAGE DETAILS</h3>
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
							<th>MESSAGE ID</th>
							<th>MESSAGE DATE</th>
							<th>MESSAGE</th>
							<th>CONTACT NO</th>
							<th>USERNAME</th>

					</tr>
				  </thead>	
					<?php 
					    $query="select msgid,msgdate,msg,m.contactno,username from message m,register r where r.regid=m.regid" ; 
					    $tb=$dc->getTable($query);
						$count=0;
						while($rw=mysqli_fetch_array($tb))
						{
						   echo("<tr>");
						      echo("<td>".$rw['msgid']."</td>");
							  echo("<td>".$rw['msgdate']."</td>");
							  echo("<td>".$rw['msg']."</td>");
 							  echo("<td>".$rw['contactno']."</td>");
							  echo("<td>".$rw['username']."</td>");

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