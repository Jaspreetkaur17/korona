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
	    $qcenterid=$_SESSION['regid'];  
	    $query="select qcentername,address,cityname,contactno,emailid,head,capacity,facilities,bed,managedby,service,img from qurantinecenter q,city c where q.cityid=c.cityid and qcenterid='$qcenterid'";
	    $rw=$dc->getRecord($query);
	?>
	
	<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-5">
	 <?php
	  echo("<img class='avatar' src='qimg\\".$rw['img']."' style='width:100%;height:450px'>");
	?>
	</div>
	
	<div class="col-md-5">
	<?php
		  echo("<table class='table'>");
		  echo("<tr><th>Name:-</th><td>".$rw['qcentername']."</td></tr>");
	      echo("<tr><th>Address:-</th><td>".$rw['address']."</td></tr>");
	      echo("<tr><th>Cityname:-</th><td>".$rw['cityname']."</td></tr>");
		  echo("<tr><th>Mobile No:-</th><td>".$rw['contactno']."</td></tr>");
		  echo("<tr><th>Email ID:-</th><td>".$rw['emailid']."</td></tr>");
		  echo("<tr><th>Head:-</th><td>".$rw['head']."</td></tr>");
		  echo("<tr><th>Capacity:-</th><td>".$rw['capacity']."</td></tr>");
		  echo("<tr><th>Facilities:-</th><td>".$rw['facilities']."</td></tr>");
		  echo("<tr><th>Managedby:-</th><td>".$rw['managedby']."</td></tr>");
		  echo("<tr><th>service:-</th><td>".$rw['service']."</td></tr>");
		  echo("<tr><th>Image:-</th><td>".$rw['img']."</td></tr>");
		  
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