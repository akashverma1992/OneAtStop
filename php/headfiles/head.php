<html>
<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/mycss.css">
	<script src="../bootstrap/jquery/1.12.4/jquery.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<script src='../bootstrap/jquery/3.0.0/jquery-3.0.0.min.js'></script>
	<script src='../bootstrap/jquery/jquery-ui/jquery-ui.js'></script>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/JavaScriptFunctions.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div id="wrapper">
		<div class="nav navbar-left">
			<div id="sidebar-wrapper">
				<ul class="sidebar-nav" style="font-family:calibri;  font-size:15px;">
					<li><b><a href="./searchCategories.php?search=accomodation">Accomodations</a></b></li>
						<ul>
							<li><a href='#'>rahul</a></li>
						</ul>
					</li>
					<li><b><a href="./searchCategories.php?search=resturant">Resturants</a></b></li>
					<li><b><a href="./searchCategories.php?search=cafe and Lounge">Cafe and Lounge</a></b></li>
					<li><b><a href="./searchCategories.php?search=clothing">Clothing</a></b></li>
					<li><b><a href="./searchCategories.php?search=footwear">Footwear</a></b></li>
					<li><b><a href="./searchCategories.php?search=jewellery">Jewellery</a></b></li>
					<li><b><a href="./searchCategories.php?search=book stores">Book Stores</a></b></li>
					<li><b><a href="./searchCategories.php?search=fitness">Fitness</a></b></li>
					<li><b><a href="./searchCategories.php?search=salons">Salons</a></b></li>
					<li><b><a href="./searchCategories.php?search=spa">Spa</a></b></li>
					<li><b><a href="./searchCategories.php?search=laundries">Laundries</a></b></li>
					<li><b><a href="./searchCategories.php?search=mobile">Mobile & Accessories</a></b></li>
				</ul>
			</div>
		</div>
	</div>
	<div id="page-content-wrapper">
	<nav class="navbar navbar-inverse navbar-fixed-top" style="font-family:calibri;  font-size:15px;">
		<div class="container-fluid">
			<div class="nav navbar-left">
				<a href='#' class="glyphicon glyphicon-tasks btn" style="color:white;" id="menu-toggle"></a>
			</div>
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php">
						<img src="../images/LOGO3.png">
					</a>
				</div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php">Home</a></li>
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories
					<span class="caret"></span></a>
						<ul class="dropdown-menu  ul-inner">
							<form method="get">
							<li><b><a href="./searchCategories.php?search=accomodation">Accomodations</a></b></li>
							<li><b><a href="./searchCategories.php?search=resturant">Resturants</a></b></li>
							<li><b><a href="./searchCategories.php?search=cafe and Lounge">Cafe and Lounge</a></b></li>
							<li><b><a href="./searchCategories.php?search=clothing">Clothing</a></b></li>
							<li><b><a href="./searchCategories.php?search=footwear">Footwear</a></b></li>
							<li><b><a href="./searchCategories.php?search=jewellery">Jewellery</a></b></li>
							<li><b><a href="./searchCategories.php?search=book stores">Book Stores</a></b></li>
							<li><b><a href="./searchCategories.php?search=fitness">Fitness</a></b></li>
							<li><b><a href="./searchCategories.php?search=salons">Salons</a></b></li>
							<li><b><a href="./searchCategories.php?search=spa">Spa</a></b></li>
							<li><b><a href="./searchCategories.php?search=laundries">Laundries</a></b></li>
							<li><b><a href="./searchCategories.php?search=mobile">Mobile & Accessories</a></b></li>
							</form>
						</ul>
					</li>
				<li><a href="#">About us</a></li>
			</ul>
			<!-- Login and signup -->
			<ul class="nav navbar-nav navbar-right">
				<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				<li><a href="./htmlPages/Signup.html"><span class="glyphicon glyphicon-user"></span> Signup</a></li>
			</ul>
			<form class="navbar-form navbar-left" role="search" action='searchCategories.php' method='get' name='search'>
				<div class="form-group ui-widget">
					<input type='text' id='searchText' name='search' class="form-control" placeholder="Search" >
				</div>
				<input type="submit" class="btn btn-info" name="submit" value='Search'></input>
			</form>
		</div>
	</nav>
	</div>
	</div>

<script>
$(function(){
	$("#searchText").autocomplete({
		source:'searchdb.php'
	});
	$("#menu-toggle").click(function(e){
		e.preventDefault();
		$('#wrapper').toggleClass("menuDisplayed");
	});
});
</script>

</body>
</html>