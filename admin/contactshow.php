<html>
	<head>
		<?php
			session_start(); 
			include("csslink.php");
			include("../class/dataclass.php");
		
		
			$msg="";
			$dc=new dataclass();
		
		
   ?>
    <?php
     if(isset($_POST['btnreply']))
	 {
	   $contactid=$_POST['btnreply'];
	   $query="update contact set reply='yes' where contactid='$contactid'";
	   $result=$dc->saveRecord($query);
	   if($result)
	   {
	     $msg="Replied Successfull...";
	   }
	   else
	   {
	     $msg="Replied Unsuccessfull ...";
	   }
	 }
	  
   ?>
	</head>
	<body>
	<form name="regisfrm" action="#" method="post">
		<?php include("header.php"); ?>
		<?php include("sidebar.php"); ?>
		 <div class="content">
		<main id="main" class="main">
		<div class="Row" style="margin-top:10px">
		    <div class="col-md-12">
			  <h3 style="text-align:center"><b><u>CONTACT DETAILS</u></b></h3>
			</div>
						
	   </div>
	   <div class="col-md-12">
	   <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr style="background-color:lightgrey">
					<th>CONTACTID</th>
					<th>CONTACTDATE</th>
					<th>PERSONNAME</th>
					<th>CONTACTNO</th>
					<th>EMAILID</th>
					<th>DETAILS</th>
					<th>REPLY</th>
				</tr>
                </thead>
                  <?php 
					    $query="select * from contact where reply='no'" ; 
					    $tb=$dc->getTable($query);
						$count=0;
						echo("<tbody>");
						while($rw=mysqli_fetch_array($tb))
						{
							echo("<tr>");
							echo("<td>".$rw['contactid']."</td>");
							echo("<td>".$rw['contactdate']."</td>");
							echo("<td>".$rw['personname']."</td>");
							echo("<td>".$rw['contactno']."</td>");
							echo("<td>".$rw['emailid']."</td>");
							echo("<td>".$rw['details']."</td>");
							echo("<td><button type='submit' class='btn btn-outline-primary rounded-pill' name='btnreply' value='".$rw['contactid']."'>Reply</button></td>");
							echo("</tr>");
						    $count++;
						}
						 echo("</tbody>");
						 echo("<tr style='background-color:#787276; color:white;'>"); //color=fossil=#787276
						      
						      echo("<td colspan='7'>Total Records : ".$count."</td>");
							  
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
		</div>
	</form>
		<?php include("jslink.php"); ?>
</body>
</html>