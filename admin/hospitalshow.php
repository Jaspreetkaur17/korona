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
	   $hospitalid=$_POST['btndelete'];
	   $query="delete from hospital where hospitalid='$hospitalid'";
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
		header('location:hospitalform.php');  
	  }
	  
	  if(isset($_POST['btnupdate']))
	  {
		$hospitalid=$_POST['btnupdate'];  
		$_SESSION['hospitalid']=$hospitalid;
		$_SESSION['trans']="update";   
		header('location:hospitalform.php');  
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
				  <h3 style="text-align:center">HOSPITAL DETAILS</h3>
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
							<th>HOSPITAL ID</th>
							<th>HOSPITAL NAME</th>
							<th>ADDRESS</th>
							<th>CITY</th>
							<th>CONTACT NO</th>
							<th>EMAIL ID</th>
							<th>VENTILATOR</th>
							<th>HOSPITAL TYPE</th>
							<th>MAP/LOCATION</th>
							<th>IMAGE</th>
							<th>UPDATE</th>
							<th>DELETE</th>
						</tr>
				  </thead>	
					<?php 
					    $query="select hospitalid,hospitalname,address,cityname,contactno,emailid,ventilator,hospitaltype,location,img from  hospital h,city c where c.cityid=h.cityid" ; 
					    $tb=$dc->getTable($query);
						$count=0;
						while($rw=mysqli_fetch_array($tb))
						{
						   echo("<tr>");
						      echo("<td>".$rw['hospitalid']."</td>");
							  echo("<td>".$rw['hospitalname']."</td>");
							  echo("<td>".$rw['address']."</td>");
							  echo("<td>".$rw['cityname']."</td>");
							  echo("<td>".$rw['contactno']."</td>");
							  echo("<td>".$rw['emailid']."</td>");
							  echo("<td>".$rw['ventilator']."</td>");
							  echo("<td>".$rw['hospitaltype']."</td>");
							  echo("<td>".$rw['location']."</td>");
							  echo("<td>".$rw['img']."</td>");

							  echo("<td><button type='submit' class='btn btn-primary' name='btnupdate' value='".$rw['hospitalid']."'>UPDATE</button></td>");
							  echo("<td><button type='submit' class='btn btn-danger' name='btndelete' value='".$rw['hospitalid']."'>DELETE</button></td>");
						   echo("</tr>");
						   $count++;
						}
						 echo("</tbody>");
						 echo("<tr style='background-color:grey;color:white'>");
						      
						      echo("<td colspan='14'>Total Records : ".$count."</td>");
							  
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