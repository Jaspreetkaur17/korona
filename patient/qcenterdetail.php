<html>
  <head>
    <?php
    session_start();	
	include('csslink.php');  
	include('../class/dataclass.php');
	?>
	
	<style>
	 .table>tbody>tr>td,table>tbody>tr>th
	 {
	   border-top:0px solid black!important;
	 }
	</style>
	
	<?php
      $msg="";
	  $query="";
	  $dc=new dataclass();
	?>
	
	<?php
		if(isset($_POST['btnreq']))
		{
		  $qreqdate=date('y-m-d');
		  $patientid=$_SESSION['regid'];
		  echo($patientid);
		  $qcenterid=$_SESSION['qcenterid'];
		  $status="pending";
		  $query="insert into qrequest(qreqdate,patientid,qcenterid,status) values('$qreqdate','$patientid','$qcenterid','$status')";    
		  $result=$dc->saveRecord($query);
		  if($result)
		  {
				$msg="Request Sent Successfully";
		  }
		  else
		  {
		    $msg="Request Unsuccessfull";
		  }
			  
		}

	?>
  </head>
  <body>
    <form name="frmhome" action="#" method="post">
    <div id="wrapper" class="home-page">
	  <?php include('navbar.php');  ?>
	  <?php include('menu.php');  ?>
       <div class="container">
	    <div class="row" style="margin-top:50px">
		  <?php
		    $qcenterid=$_SESSION['qcenterid']; 
		    $query="select qcentername,address,cityname,contactno,emailid,head,capacity,facilities,bed,managedby,service,img from  qurantinecenter q,city c where c.cityid=q.cityid and qcenterid='$qcenterid'" ; 
					
			$rw=$dc->getRecord($query);
		     echo("<div class='col-md-5'>");
			    echo("<img src=../qcenter/qimg/".$rw['img']." width='100%' height='400px'>");			
			 echo("</div>");
			  echo("<div class='col-md-1'></div>");
			 echo("<div class='col-md-5'>");
			   echo("<table class='table' height='400px'>");
			    echo("<tr><td colspan='2'><H3>QURANTINE CENTER DETAILS</H3></td></tr>");
			    echo("<tr><th>Qurantine Center Name</th><td>".$rw['qcentername']."</td></tr>");
                echo("<tr><th>Address</th><td>".$rw['address']."</td></tr>");	
				echo("<tr><th>city</th><td>".$rw['cityname']."</td></tr>");
			    echo("<tr><th>contactno</th><td>".$rw['contactno']."</td></tr>");
				echo("<tr><th>Emailid</th><td>".$rw['emailid']."</td></tr>");
				echo("<tr><th>Head</th><td>".$rw['head']."</td></tr>");
			    echo("<tr><th>Capacity</th><td>".$rw['capacity']."</td></tr>");
			    echo("<tr><th>Facilities</th><td>".$rw['facilities']."</td></tr>");
			    echo("<tr><th>Available Bed</th><td>".$rw['bed']."</td></tr>");
				echo("<tr><th>Managed by</th><td>".$rw['managedby']."</td></tr>");
			    echo("<tr><th>Service</th><td>".$rw['service']."</td></tr>");



               echo("</table>");
			 echo("</div>");
			 ?>
	    </div> 
		<div class="row" >
		  <div class="col-md-1 offset-md-7" style="margin-top:5px;margin-bottom:5px;">
		    <button type='submit'  class="btn btn-primary" name='btnreq' value='request'>request</button>
		</div>
		<div class="col-md-1" style="margin-top:5px;margin-bottom:5px;">
	<button type='submit' class="btn btn-primary" name='btnback' value='back'>Back</button>
		  </div>
		</div>
		</div>
		<span><?php echo($msg)?></span>
    
	<?php include('footer.php');  ?>
    </div>
   <?php include('jslink.php');  ?>
   </form>
  </body>
  
</html>
