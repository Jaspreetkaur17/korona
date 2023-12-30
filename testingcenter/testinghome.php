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
	  <?php include('slidertcenter.php');  ?>
	  		<section class="ftco-services ftco-no-pb">
			<div class="container">
				<div class="row no-gutters">
          <div class="col-md-4 d-flex services align-self-stretch p-4 ftco-animate">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-doctor"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Testing Type</h3>
                <p>Laboratory testing for the COVID-19 virus includes methods that detect the presence of virus and those that detect antibodies produced in response to infection those are rtpcr & rapid test.</p>
              </div>
            </div>      
          </div>
          
          <div class="col-md-4 d-flex services align-self-stretch p-4 ftco-animate">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-stethoscope"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Staff</h3>
                <p>The organised body of licensed physicians and other healthcare providers who are permitted by law and by a hospital to provide medical care within that hospital or facility.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-4 d-flex services align-self-stretch p-4 ftco-animate">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-24-hours"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Timing</h3>
                <p>If you have symptoms of COVID-19 and want to get tested, try our website to get your nearby testing center.Generally, you can get your covid test during your working hours ( 9 A.M. to 6 P.M. )</p>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>
	<section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter img" id="section-counter" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
    	
		    <?php
			  include("../class/dataclass.php");
			  $dc=new dataclass();
			  $totaltesting=$dc->getData("select count(*) from testing");
			  $totalcase=$dc->getData("select count(*) from testing where result='positive'");
			  $totalhospital=$dc->getData("select count(*) from hospital");
			  $totalqcenter=$dc->getData("select count(*) from qurantinecenter");
		  
			?>
			
    			<div class="col-lg-6 p-5 bg-counter aside-stretch" style="max-width:100%">
						
    				<div class="row pt-4 mt-1">
		          <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 p-5 bg-light">
		              <div class="text">
		                <strong class="number" data-number="<?php echo($totaltesting) ?>">0</strong>
		                <span>Total Testing</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 p-5 bg-light">
		              <div class="text">
		                <strong class="number" data-number="<?php echo($totalcase) ?>">0</strong>
		                <span>Total Corona Case </span>
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