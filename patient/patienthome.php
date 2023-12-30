<html>
  <head>
    <?php
    session_start(); 	
	include('csslink.php'); 
	?>
  </head>
  <body>
    <form name="frmhome" action="#" method="post">
    <div  class="home-page">
	  <?php include('navbar.php');  ?>
	  <?php include('menu.php'); ?>
	  <?php include('sliderpatient.php');  ?>
	  		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
          	<span class="subheading">Blog</span>
            <h2 class="mb-4">Recent Blog</h2>
          </div>
        </div>
				<div class="row">
          <div class="col-md-3 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/tcenter2.jpg');">
								<div class="meta-date text-center p-2">
                 
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="#">TESTING CENTER</a></h3>
                <p>In addition to COVID-19 vaccination, physical distancing, and masking, testing is a safe and effective way to help prevent the spread of COVID-19.Testing helps to create a safe learning environment and decreases the risk of disease transmission.</p>
                <div class="d-flex align-items-center mt-4">
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/hsp5.jpg');">
								<div class="meta-date text-center p-2">
                 
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="#">HOSPITAL</a></h3>
                <p>Hospital  is an organisation that mobilises the skills and efforts of widely divergent group of professionals, semi- professionals and non-professionals so as to provide highly personalised services to individual patients.<br><br></p>
                <div class="d-flex align-items-center mt-4">
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/q4.jpg');">
								<div class="meta-date text-center p-2">
                 
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="#">QUARANTINE CENTER</a></h3>
                <p>Quarantine is used to keep someone who has been exposed to a person with COVID-19 away from others. Quarantine helps prevent the spread of disease before a person knows they are sick or if they are infected with the virus without feeling symptoms.</p>
                <div class="d-flex align-items-center mt-4">
                </div>
              </div>
            </div>	
          </div>
		  <div class="col-md-3 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/v1.jpg');">
								<div class="meta-date text-center p-2">
                 
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="#">VACCINATION</a></h3>
                <p>A COVID19 vaccine provide acquired immunity against COVID-19. Prior to the COVID-19 pandemic, work to develop a vaccine against the coronavirus diseases SARS and MERS had established knowledge about the structure and function of coronaviruses.</p>
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