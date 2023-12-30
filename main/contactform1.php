<html>
	<head>
    
	<?php 
    session_start();
	include('csslink.php');
	include('../class/dataclass.php');

	  $contactdate="";
	  $personname="";
	  $contactno="";
	  $email="";
	  $detail="";
	  $reply="";
      $msg="";
	  $query="";
	  $dc=new dataclass(); 
    ?>
	<?php
	if(isset($_POST['btnsend']))
	  {
		 $contactdate=date('y-m-d');
		 $personname=$_POST['txtpersonname'];
		 $contactno=$_POST['txtcontactno'];
		 $email=$_POST['txtemail'];
		 $detail=$_POST['txtdetail'];
		 $reply="no";
		 $query="insert into contact(contactdate,personname,contactno,email,detail,reply) values('$contactdate','$personname','$contactno','$email','$detail','$reply')";
		 $result=$dc->saveRecord($query);
		 if($result)
		 {
		   $msg="Contact Details Send Successfully...";
		 }
		 else
		 {
		   $msg="Contact Details not Send....";
		 }
		 
	  }
	  
	  if(isset($_POST['btncancel']))
	  {
		  header('location:mainhome.php');
	  }
	
	?>
    </head>
	<body style="margin-top:-24px;">
	<header class="header-section">
	<?php include('navbar.php'); ?>
	<?php include('menubar.php'); ?>
	</header>
	<!-- Contact Section Begin -->
    <section class="contact-section spad" style="background-color: #e7ab3c;background: linear-gradient(0deg,#88888870 0%, #e7ab3c 100%);">
        <div class="container">
            <div class="row">
               <div class="col-lg-7" style="background:white;border-radius:25px; padding:25px;">
                    <div class="contact-form">
                        <div class="leave-comment">
                            <h6><b><u>Leave A Message</u></b></h6><br>
                            <form method="post" action="#" class="comment-form">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Your name" name="txtpersonname">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Your Contact no." name="txtcontactno">
                                    </div>
									<div class="col-lg-12">
                                        <input type="text" placeholder="Your Email" name="txtemail">
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea placeholder="Your message" name="txtdetail"></textarea>
                                        <button type="submit" class="site-btn" name="btnsend">Send</button>
										<button type="submit" class="site-btn" name="btncancel">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
           	<div class="col-lg-1">
			 </div>
			<div class="col-lg-4" style="background:white;border-radius:25px;padding:25px;">
                    <div class="contact-title">
                        <h4>Contacts Us</h4>
                        <p>there are many form of contacting us but this is the simplest way!!</p>
                    </div>
                    <div class="contact-widget">
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-location-pin"></i>
                            </div>
                            <div class="ci-text">
                                <span>Address:</span>
                                <p>Shop no. 21,Sanket Elegance,Chhapra road,Navsari</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-mobile"></i>
                            </div>
                            <div class="ci-text">
                                <span>Phone:</span>
                                <p>+91 7226849439</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-email"></i>
                            </div>
                            <div class="ci-text">
                                <span>Email:</span>
                                <p>artandlux@gmail.com</p>
                            </div>
                        </div>
                    </div>
            </div>
			</div>
    </section>
    <!-- Contact Section End -->

	<?php// include('footer.php'); ?>
	<?php include('jslink.php'); ?>
	</body>
</html>
-