<html>
  <head>
    <?php 
	include('csslink.php');
    session_start(); 	
    ?>
  </head>
  <body>
    <form name="frmhome" action="#" method="post">
    <div  class="home-page">
	  <?php include('navbar.php');  ?>
	  <?php include('menu.php'); ?>
	  <?php include('sliderhsp.php');  ?>
	  		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
          	
            <h2 class="mb-4">Hospital Services</h2>
            
          </div>
        </div>
				<div class="row">
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
								<div class="meta-date text-center p-2">
                  
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="#">Oxygen Availability</a></h3>
                <p>Some people with COVID-19 have low levels of oxygen in their blood, even when they feel well. Low
oxygen levels can be an early warning sign that medical care is needed.<br><br></p>
                <div class="d-flex align-items-center mt-4">
	                
	                
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
								<div class="meta-date text-center p-2">
                  
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="#">Ventilator</a></h3>
                <p>A ventilator is a machine that provides mechanical ventilation by moving breathable air into and out of the lungs, to deliver breaths to a patient who is physically unable to breathe, or breathing insufficiently.</p>
                <div class="d-flex align-items-center mt-4">
	                
	                
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
								<div class="meta-date text-center p-2">
                 
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="#">Bed Availability</a></h3>
                <p>You can check whether bed or ward ( icu , general ) is available or not.<br>
				If it is available then you can book partcular bed aur ward by using our website.<br><br></p>
                <div class="d-flex align-items-center mt-4">
	               
                </div>
              </div>
            </div>
          </div>
        </div>
			</div>
		</section>


     <?php include('footer.php');  ?>
    </div>
   <?php include('jslink.php');  ?>
   </form>
  </body>
  
</html>