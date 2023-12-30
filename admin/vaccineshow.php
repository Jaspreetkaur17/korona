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
     if(isset($_POST['btndelete']))
	 {
	   $vaccineid=$_POST['btndelete'];
	   $query="delete from vaccine where vaccineid='$vaccineid'";
	   $result=$dc->saveRecord($query);
	   if($result)
	   {
	     $msg="Delete Record Successfully...";
	   }
	   else
	   {
	     $msg="Record not Deleted...";
	   }
	 }
	  if(isset($_POST['btnnew']))
	  {
		$_SESSION['trans']="new";   
		header('location:vaccineform.php');  
	  }
	  
	  if(isset($_POST['btnupdate']))
	  {
		$vaccineid=$_POST['btnupdate'];  
		$_SESSION['vaccineid']=$vaccineid;
		$_SESSION['trans']="update";   
		header('location:vaccineform.php');  
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
				  <h3 style="text-align:center">VACCINE DETAILS</h3>
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
							<th>VACCINE ID</th>
							<th>VACCINE NAME</th>
							<th>DURATION</th>
							<th>DOSE</th>
							<th>COMPANY NAME</th>
							<th>IMAGE</th>
							<th>UPDATE</th>
							<th>DELETE</th>
						</tr>
				  </thead>	
					<?php 
					    $query="select vaccineid,vaccinename,duration,dose,cmpname,img from vaccine v,company c where v.cmpid=c.cmpid" ; 
					    $tb=$dc->getTable($query);
						$count=0;
						while($rw=mysqli_fetch_array($tb))
						{
						   echo("<tr>");
						      echo("<td>".$rw['vaccineid']."</td>");
							  echo("<td>".$rw['vaccinename']."</td>");
							  echo("<td>".$rw['duration']."</td>");
							  echo("<td>".$rw['dose']."</td>");
							  echo("<td>".$rw['cmpname']."</td>");
							  echo("<td>".$rw['img']."</td>");
							  echo("<td><button type='submit' class='btn btn-primary' name='btnupdate' value='".$rw['vaccineid']."'>UPDATE</button></td>");
							  echo("<td><button type='submit' class='btn btn-danger' name='btndelete' value='".$rw['vaccineid']."'>DELETE</button></td>");
						   echo("</tr>");
						   $count++;
						}
						 echo("</tbody>");
						 echo("<tr style='background-color:grey;color:white'>");
						      
						      echo("<td colspan='9'>Total Records : ".$count."</td>");
							  
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