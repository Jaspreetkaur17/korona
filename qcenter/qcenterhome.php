<html>
  <head>
    <?php include('csslink.php');  
     session_start(); 	
    ?>
 </head>
  <body>
    <form name="frmhome" action="#" method="post">
    <div  class="home-page">
	  <?php include('navbar.php');  ?>
	  <?php include('menu.php'); ?>
	  <?php include('sliderqcenter.php');  ?>
	  		<section class="ftco-section ftco-no-pt ftc-no-pb">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-5 p-md-5 img img-2 mt-5 mt-md-0" style="background-image: url(images/q3.jpg);">
					</div>
					<div class="col-md-7 wrap-about py-4 py-md-5 ftco-animate">
	          <div class="heading-section mb-5">
	          	<div class="pl-md-5 ml-md-5">
		          	<span class="subheading"><h4>FACILITIES PROVIDED BY QUARANTINE CENTER</h4></span>
		            <h5 class="mb-4" style="font-size: 22px;">Quarantine separates and restricts the movement of people who were exposed to a contagious disease to see if they become sick.</h5>
	            </div>
	          </div>
	          <div class="pl-md-5 ml-md-5 mb-5">
							<p>Quarantine Stations are part of a comprehensive system that serves to limit the introduction and spread of contagious diseases.They are staffed with medical and public health officers from the Centers for Disease Control and Prevention  </p>
							
			</div>
		</section>

     <?php include('footer.php');  ?>
    </div>
   <?php include('jslink.php');  ?>
   </form>
  </body>
  
</html>