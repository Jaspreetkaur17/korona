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
	   $tcenterid=$_POST['btndelete'];
	   $query="delete from testingcenter where tcenterid='$tcenterid'";
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
		header('location:testingcenterform.php');  
	  }
	  
	  if(isset($_POST['btnupdate']))
	  {
		$tcenterid=$_POST['btnupdate'];  
		$_SESSION['tcenterid']=$tcenterid;
		$_SESSION['trans']="update";   
		header('location:testingcenterform.php');  
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
				  <h3 style="text-align:center">TESTING CENTER DETAILS</h3>
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
							<th>TCENTER ID</th>
							<th>TCENTER NAME</th>
							<th>TCENTERTYPE</th>
							<th>HEAD</th>
							<th>CONTACT NO</th>
							<th>EMAIL ID</th>
							<th>ADDRESS</th>
							<th>CITY</th>
							<th>TYPE OF TESTING</th>
							<th>UPDATE</th>
							<th>DELETE</th>
						</tr>
				  </thead>	
					<?php 
					    $query="select tcenterid,tcentername,tcentertype,head,contactno,emailid,address,cityname,typeoftesting from  testingcenter t,city c where c.cityid=t.cityid" ; 
					    $tb=$dc->getTable($query);
						$count=0;
						while($rw=mysqli_fetch_array($tb))
						{
						   echo("<tr>");
						      echo("<td>".$rw['tcenterid']."</td>");
							  echo("<td>".$rw['tcentername']."</td>");
							  echo("<td>".$rw['tcentertype']."</td>");
							  echo("<td>".$rw['head']."</td>");
							  echo("<td>".$rw['contactno']."</td>");
							  echo("<td>".$rw['emailid']."</td>");
							  echo("<td>".$rw['address']."</td>");
							  echo("<td>".$rw['cityname']."</td>");
							  echo("<td>".$rw['typeoftesting']."</td>");

							  echo("<td><button type='submit' class='btn btn-primary' name='btnupdate' value='".$rw['tcenterid']."'>UPDATE</button></td>");
							  echo("<td><button type='submit' class='btn btn-danger' name='btndelete' value='".$rw['tcenterid']."'>DELETE</button></td>");
						   echo("</tr>");
						   $count++;
						}
						 echo("</tbody>");
						 echo("<tr style='background-color:grey;color:white'>");
						      
						      echo("<td colspan='12'>Total Records : ".$count."</td>");
							  
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