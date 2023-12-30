<html>
  <head>
    <?php
    session_start();	
	include('csslink.php');  
	include('../class/dataclass.php');
	?>
	
	<?php
      $msg="";
	  $query="";
	  $dc=new dataclass();
	?>
	
	<?php
    
	  if(isset($_POST['']))
	  {
		  
	  }
	?>
	<style>
	img{
		
		margin-top:50px;
		border-radius:80px;
		border:5px solid black;
	}
	
	</style>
	
  </head>
  <body>
    <form name="frmhome" action="#" method="post">
    <div id="wrapper" class="home-page">
	  <?php include('navbar.php');  ?>
	  <?php include('menu.php');  ?>
	
	<?php
	    $patientid=$_SESSION['regid'];  
	    $query="select patientname,address,cityname,contactno,emailid,gender,birthdate,disease,bloodgrp,weight,height,img,medicalhistory from patient p,city c where p.cityid=c.cityid and patientid='$patientid'";
	    $rw=$dc->getRecord($query);
	?>
	
	<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-5">
	 <?php
	  echo("<img class='avatar' src='pimg\\".$rw['img']."' style='width:100%;height:450px'>");
	?>
	</div>
	
	<div class="col-md-5">
	<?php
		  echo("<table class='table'>");
		  echo("<tr><th>Name:-</th><td>".$rw['patientname']."</td></tr>");
	      echo("<tr><th>Address:-</th><td>".$rw['address']."</td></tr>");
	      echo("<tr><th>Cityname:-</th><td>".$rw['cityname']."</td></tr>");
		  echo("<tr><th>Mobile No:-</th><td>".$rw['contactno']."</td></tr>");
		  echo("<tr><th>Gender:-</th><td>".$rw['gender']."</td></tr>");
		  echo("<tr><th>Email ID:-</th><td>".$rw['emailid']."</td></tr>");
		  echo("<tr><th>Birthdate:-</th><td>".$rw['birthdate']."</td></tr>");
		  echo("<tr><th>Disease:-</th><td>".$rw['disease']."</td></tr>");
		  echo("<tr><th>Bloodgroup:-</th><td>".$rw['bloodgrp']."</td></tr>");
		  echo("<tr><th>Height:-</th><td>".$rw['height']."</td></tr>");
		  echo("<tr><th>Weight:-</th><td>".$rw['weight']."</td></tr>");
		  echo("<tr><th>Image:-</th><td>".$rw['img']."</td></tr>");
		  echo("<tr><th>Medical History:-</th><td>".$rw['medicalhistory']."</td></tr>");
		  
		  echo("</table>");
		
	  ?>
	</div>
	
	</div>  
	  
	
     <?php include('footer.php');  ?>
    </div>
   <?php include('jslink.php');  ?>
   </form>
  </body>
  
</html>