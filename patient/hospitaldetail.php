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
		  $hreqdate=date('y-m-d');
		  $patientid=$_SESSION['regid'];
		  echo($patientid);
		  $hospitalid=$_SESSION['hospitalid'];
		  $status="pending";
		  $query="insert into hrequest(hreqdate,patientid,hospitalid,status) values('$hreqdate','$patientid','$hospitalid','$status')";    
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
		if(isset($_POST['btnback']))
		{
			header('location:hospitalshow.php');
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
		    $hospitalid=$_SESSION['hospitalid']; 
		    $query="select hospitalname,address,cityname,contactno,emailid,ventilator,bed,hospitaltype,location,img from  hospital h,city c where c.cityid=h.cityid and hospitalid='$hospitalid'" ; 
					
			$rw=$dc->getRecord($query);
		     echo("<div class='col-md-5'>");
			    echo("<img src=../hospital/himg/".$rw['img']." width='100%' height='400px'>");			
			 echo("</div>");
			  echo("<div class='col-md-1'></div>");
			 echo("<div class='col-md-5'>");
			   echo("<table class='table' height='400px'>");
			    echo("<tr><td colspan='2'><H3>HOSPITAL DETAILS</H3></td></tr>");
			    echo("<tr><th>Hospital Name</th><td>".$rw['hospitalname']."</td></tr>");
                echo("<tr><th>Hospital Type</th><td>".$rw['hospitaltype']."</td></tr>");	
				echo("<tr><th>ventilator</th><td>".$rw['ventilator']."</td></tr>");
			    echo("<tr><th>Available Bed</th><td>".$rw['bed']."</td></tr>");
				echo("<tr><th>city</th><td>".$rw['cityname']."</td></tr>");
			    echo("<tr><th>contactno</th><td>".$rw['contactno']."</td></tr>");
				
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
