    <?php
	if(isset($_POST['btnlg']))
	{
		session_destroy();
	header("location:../main/mainhome.php");
	}	
	
			$username=$_SESSION['username'];

	?>
   
   <nav class="navbar py-4 navbar-expand-lg ftco_navbar navbar-light bg-light flex-row">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
    			<div class="col-lg-2 pr-4 align-items-center">
		    		<a class="navbar-brand" href="index.html">Korona<span>care</span></a>
					<label style='margin-left:28px;'><i class='fa fa-user'></i><b><?php echo($username) ?></b></label>
	    		</div>
	    		<div class="col-lg-8 d-none d-md-block">
		    		<div class="row d-flex">
			    		<div class="col-md-4 pr-4 d-flex topper align-items-center">
			    			<div class="icon bg-white mr-2 d-flex justify-content-center align-items-center"><span class="icon-map"></span></div>
						    <span class="text">Address: 22B,MGG hospital Station Road</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon bg-white mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">Email: koronacare@email.com</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon bg-white mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">Phone: +91 9723709617</span>
					    </div>
				    </div>
			    </div>
				<div class="col-md-1">
				<button class="btn btn-danger" name="btnlg" type="submit"><i class="fa fa-sign-out"></i>LOGOUT</button>
				</div>
		    </div>
		  </div>
    </nav>
