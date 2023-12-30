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
      $query="select qcenterid,qcentername,c.cityname,img from  qurantinecenter q,city c where q.cityid=c.cityid";
	  if(isset($_POST['btnsearch']))
	  {
		  $cityid=$_POST['lstcity'];
		  $query="select qcenterid,qcentername,c.cityname,img from  qurantinecenter q,city c where q.cityid=c.cityid and c.cityid='$cityid'";
		
	  }

   	 if(isset($_POST['btndetail']))
	  {
		 $qcenterid=$_POST['btndetail'];  
		 $_SESSION['qcenterid']=$qcenterid;
		 header('location:qcenterdetail.php');
	  }
	?>


  </head>
  <body>
    <form name="frmhome" action="#" method="post">
    <div id="wrapper" class="home-page">
	  <?php include('navbar.php');  ?>
	  <?php include('menu.php');  ?>
       <div class="container">
	   <div class="row">
	     
		 <div class="col-md-2">
		 
	 <div class="form-group">
		  <label>City Name</label> 
		  <select name="lstcity" class="form-control" style='border:1px solid black;border-radius:15px;'> 
		    <?php
			  $query1="select cityid,cityname from city";
			  $tb=$dc->getTable($query1);
			  while($rw=mysqli_fetch_array($tb))
			  {
				  echo("<option value=".$rw["cityid"] .">".$rw["cityname"]."</option>");
			  }
			?>
		   </select>
		   </div>
		   </div>
		   <div class="col-md-2">
		   <div class="form-group">
		  <input type='submit' class='btn btn-secondary' name='btnsearch' value='Search' style="margin-top:40px;">					
		</div>
	 </div>
	</div>	 
		 
	  
	   
	     <div class="row">
		 
 
		  <?php
		  	$tb=$dc->getTable($query);
			
			while($rw=mysqli_fetch_array($tb))
			{
			  echo("<div class='col-md-3'>"); 	
			  echo("<table class='table table-bordered'>");
			    echo("<tr><td><img src=../qcenter/qimg/".$rw['img']." width='100%' height='200px'></td></tr>");
	            echo("<tr><td>Qurantine Center Name : ".$rw['qcentername']."</td></tr>");
                echo("<tr><td>City Name : ".$rw['cityname']."</td></tr>");	
                echo("<tr><td><center><button type='submit' class='btn btn-secondary' name='btndetail' value='".$rw['qcenterid']."'>Detail</button></center></td></tr>");					
			  echo("</table>");
			  echo("</div>");
			}
		  ?>
	   
		
     </div>
    </div>
	</div>
	<?php include('footer.php');  ?>
   <?php include('jslink.php');  ?>
   </form>
  </body>
  
</html>