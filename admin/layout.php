<!DOCTYPE html>
<html> 
<head>
   <?php 
     session_start(); 
     include("../class/dataclass.php");
	 include("csslink.php");
   ?>
</head>

<body>
	<form name="frm" action="#" method="post">
		<div class="main-wrapper">
			<?php include("header.php"); ?>
			<?php include("sidebar.php"); ?>
		<div class="page-wrapper">
		   <div class="content">
		    <p>
			  This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

			  This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details. 
			</p>
		  
           </div>
        </div>
	  </form>
    <?php include("jslink.php") ?>
</body>

</html>