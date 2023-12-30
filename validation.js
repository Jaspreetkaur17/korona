   function onlyalpha(ctrl,msg) 
   {
		 var data = ctrl.value;  //amit patel
		 var result = data.match(/[a-z|A-Z ]+/); //amit patel
		 if (result != data) 
		 {
			 msg.innerHTML = "Enter Only Alpha";
		 }
		 else 
		 {
			 msg.innerHTML ="";
		 }
	 }
	 
   function checklength(ctrl,msg,min,max) 
   {
		 var data = ctrl.value; 
		 var len=data.length;
		 if (len<min || len>max) 
		 {
			 msg.innerHTML = "Password length between " + min+ " to " + max;
		 }
		 else 
		 {
			 msg.innerHTML ="";
		 }
	 }
	   function checkchlength(ctrl,msg,min,max) 
   {
		 var data = ctrl.value; 
		 var len=data.length;
		 if (len<min || len>max) 
		 {
			 msg.innerHTML = "character length between " + min+ " to " + max;
		 }
		 else 
		 {
			 msg.innerHTML ="";
		 }
	 }
 
   function checkemail(ctrl,msg) 
   {
		 var data = ctrl.value; 
		 var prtn=/^\w+([\.]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		 if(!prtn.test(data)) 
		 {
			 msg.innerHTML = "Invalid Email Address..";
		 }
		 else 
		 {
			 msg.innerHTML ="";
		 }
	}

	function onlynumber(ctrl,msg) 
	 {
		 var data = args.Value;
		 var result = data.match(/[0-9]+/);
		 if (result != data) 
		 {
		   msg.innerHTML="Enter only number..";               
		 }
		 else
		 {
			msg.innerHTML="";
		 }
    }

       function chkpositive(ctrl,msg) 
        {
            var data = eval(ctrl.Value);
            if (data < 0) 
            {
                msg.innerHTML="Positive Number Only";
            }
            else 
            {
                msg.innerHTML=""; 
            }
        }

   function checkmobileno(ctrl,msg) 
   {
		 var data = ctrl.value; 
		 var prtn=/^\d{10}$/;
		 if(!prtn.test(data)) 
		 {
			 msg.innerHTML = "10 Digits Only..";
		 }
		 else 
		 {
			 msg.innerHTML ="";
		 }
	}
	
    function checkrange(ctrl,msg,min,max) 
   {
		 var data = eval(ctrl.value); 
		 if (data<min || data>max) 
		 {
			 msg.innerHTML = "Value between " + min+ " to " + max;
		 }
		 else 
		 {
			 msg.innerHTML ="";
		 }
	 }
	
   function confirmpassword(ctrl1,ctrl2,msg) 
   {
		 var data1 = ctrl1.value; 
		 var data2 = ctrl2.value; 
		 
		 if (data1!=data2) 
		 {
			 msg.innerHTML = "Password not match";
		 }
		 else 
		 {
			 msg.innerHTML ="";
		 }
	 }
	 
   function checkblank(ctrl,msg) 
   {
		 var data = ctrl.value; 
		  
		 if (data=="") 
		 {
			 msg.innerHTML = "Can not left blank";
		 }
		 else 
		 {
			 msg.innerHTML ="";
		 }
	 }
	
       