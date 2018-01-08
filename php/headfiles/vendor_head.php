<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/css_vendor.css">
	<script src="../bootstrap/jquery/1.12.4/jquery.min.js"></script>
	<script src="../bootstrap/jquery/sticky/sticky-kit.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
		session_start();
		if(!isset($_SESSION['vusername']) ){
			//delets all session variables to avoid accessing to the inner pages
			session_destroy();
			header("location:index.php");
		}
	?>
</head>

<body>
	<!--Navbar header-->
	<nav id='menu1' class="navbar navbar-inverse navbar-fixed-top container-fluid">
		<a class='nav-brand' href='../php/vendor.php'><img src='../images/logo.jpg'/></a>			
		<ul class="navbar-nav nav navbar-right">
			<li class="nav-item dropdown" style="font-size:17px"><a class="nav-link dropdown-toggle" data-toggle='dropdown' href="#">
			<span class="glyphicon glyphicon-user" style="color:cyan;"></span> <?php echo ucfirst(isset($_SESSION['vusername'])?$_SESSION['vusername']:''),' '; ?><span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li class="nav-item"><a class='nav-link' href="vendor.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
					<li class="nav-item"><a class='nav-link' href="profile.php"><span class="glyphicon glyphicon-list-alt"></span> Profile</a></li>
					<li class="nav-item"><a class='nav-link' href="signout.php"><span class="glyphicon glyphicon-log-out" style="color:red;"></span> Signout</a></li>
				</ul>
			</li>
		</ul>
	</nav>