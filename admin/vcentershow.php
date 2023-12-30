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
	   $vcenterid=$_POST['btndelete'];
	   $query="delete from vaccinecenter where vcenterid='$vcenterid'";
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
		header('location:vcenterform.php');  
	  }
	  
	  if(isset($_POST['btnupdate']))
	  {
		$vcenterid=$_POST['btnupdate'];  
		$_SESSION['vcenterid']=$vcenterid;
		$_SESSION['trans']="update";   
		header('location:vcenterform.php');  
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
				  <h3 style="text-align:center">VACCINECENTER DETAILS</h3>
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
							<th>VCENTER ID</th>
							<th>VCENTER NAME</th>
							<th>ADDRESS</th>
							<th>CITYID</th>
							<th>CONTACT NO</th>
							<th>EMAIL ID </th>	
							<th>DURATION</th>
							<th>UPDATE</th>
							<th>DELETE</th>
						</tr>
				  </thead>	
					<?php 
					    $query="select vcenterid,vcentername,address,v.cityid,contactno,emailid,duration from vaccinecenter v,city c where v.cityid=c.cityid" ; 
					    $tb=$dc->getTable($query);
						$count=0;
						while($rw=mysqli_fetch_array($tb))
						{
						   echo("<tr>");
						      echo("<td>".$rw['vcenterid']."</td>");
							  echo("<td>".$rw['vcentername']."</td>");
							  echo("<td>".$rw['address']."</td>");
							  echo("<td>".$rw['cityid']."</td>");
							  echo("<td>".$rw['contactno']."</td>");
							  echo("<td>".$rw['emailid']."</td>");
							  echo("<td>".$rw['duration']."</td>");

							  echo("<td><button type='submit' class='btn btn-primary' name='btnupdate' value='".$rw['vcenterid']."'>UPDATE</button></td>");
							  echo("<td><button type='submit' class='btn btn-danger' name='btndelete' value='".$rw['vcenterid']."'>DELETE</button></td>");
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