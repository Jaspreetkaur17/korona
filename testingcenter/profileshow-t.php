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
	    $tcenterid=$_SESSION['regid'];  
	    $query="select tcentername,tcentertype,head,contactno,emailid,address,cityname,description,typeoftesting,img from testingcenter t,city c where t.cityid=c.cityid and tcenterid='$tcenterid'";
	    $rw=$dc->getRecord($query);
	?>
	
	<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-5">
	 <?php
	  echo("<img class='avatar' src='timg\\".$rw['img']."' style='width:100%;height:450px'>");
	?>
	</div>
	
	<div class="col-md-5">
	<?php
		  echo("<table class='table'>");
		  echo("<tr><th>Testing Center Name:-</th><td>".$rw['tcentername']."</td></tr>");
	      echo("<tr><th>Testing Center Type:-</th><td>".$rw['tcentertype']."</td></tr>");
	      echo("<tr><th>Head:-</th><td>".$rw['head']."</td></tr>");
		  echo("<tr><th>Contact No:-</th><td>".$rw['contactno']."</td></tr>");
		  echo("<tr><th>Email id:-</th><td>".$rw['emailid']."</td></tr>");
		  echo("<tr><th>Address:-</th><td>".$rw['address']."</td></tr>");
		  echo("<tr><th>City Name:-</th><td>".$rw['cityname']."</td></tr>");
		  echo("<tr><th>Description:-</th><td>".$rw['description']."</td></tr>");
		  echo("<tr><th>Type Of Testing:-</th><td>".$rw['typeoftesting']."</td></tr>");
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