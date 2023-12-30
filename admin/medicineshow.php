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
	   $medicineid=$_POST['btndelete'];
	   $query="delete from medicine where medicineid='$medicineid'";
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
		header('location:medicineform.php');  
	  }
	  
	  if(isset($_POST['btnupdate']))
	  {
		$medicineid=$_POST['btnupdate'];  
		$_SESSION['medicineid']=$medicineid;
		$_SESSION['trans']="update";   
		header('location:medicineform.php');  
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
				  <h3 style="text-align:center">MEDICINE DETAILS</h3>
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
							<th>MEDICINE ID</th>
							<th>MEDICINE NAME</th>
							<th>MEDICINE TYPE</th>
							<th>COMPANY</th>
							<th>FORM</th>
							<th>AGE GROUP</th>
							<th>CATEGORY</th>
							<th>UNIT</th>
							<th>POWER</th>
							<th>DESCRIPTION</th>
							<th>IMG</th>
							<th>UPDATE</th>
							<th>DELETE</th>
						</tr>
				  </thead>	
					<?php 
					    $query="select medicineid,medicinename,medicinetype,company,form,agegrp,category,unit,power,description,img from medicine" ; 
					    $tb=$dc->getTable($query);
						$count=0;
						while($rw=mysqli_fetch_array($tb))
						{
						   echo("<tr>");
						      echo("<td>".$rw['medicineid']."</td>");
							  echo("<td>".$rw['medicinename']."</td>");
							  echo("<td>".$rw['medicinetype']."</td>");
							  echo("<td>".$rw['company']."</td>");
							  echo("<td>".$rw['form']."</td>");
							  echo("<td>".$rw['agegrp']."</td>");
							  echo("<td>".$rw['category']."</td>");
							  echo("<td>".$rw['unit']."</td>");
							  echo("<td>".$rw['power']."</td>");
							  echo("<td>".$rw['description']."</td>");
							  echo("<td>".$rw['img']."</td>");

							  echo("<td><button type='submit' class='btn btn-primary' name='btnupdate' value='".$rw['medicineid']."'>UPDATE</button></td>");
							  echo("<td><button type='submit' class='btn btn-danger' name='btndelete' value='".$rw['medicineid']."'>DELETE</button></td>");
						   echo("</tr>");
						   $count++;
						}
						 echo("</tbody>");
						 echo("<tr style='background-color:grey;color:white'>");
						      
						      echo("<td colspan='13'>Total Records : ".$count."</td>");
							  
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