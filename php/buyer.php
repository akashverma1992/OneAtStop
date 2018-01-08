<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/mycss.css">
	<script src="../bootstrap/jquery/1.12.4/jquery.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		#mycarousel{
	width:70%;
	margin: auto;
	margin-top:51px;
}

.carousel-inner img{
	width: 100%;  /*Set width to 100% */
  	margin: auto;
}
	</style>
	<?php
		session_start();
		if( !isset($_SESSION['buyername']) ){
			session_destroy();
			header("location:index.php");
		}
	?>
</head>
<body>
	<div id="wrapper">
		<div class="nav navbar-left">
			<div id="sidebar-wrapper">
				<ul class="sidebar-nav">
					<li><b><a id='dd'href="#">Enquiry</a></b></li>
					<li><b><a href="#">Special Offers</a></b></li>
					<li><b><a href="#">Upload Profile Pic</a></b></li>
					<li><b><a href="#">Vouchers</a></b></li>
					<!--<li><b><a id='dd' href="#">Footwear</a></b></li>
					<li><b><a id='dd' href="#">Jewellery</a></b></li>
					<li><b><a id='dd' href="#">Books Stores</a></b></li>
					<li><b><a id='dd' href="#">Fitness</a></b></li>
					<li><b><a id='dd' href="#">Salons</a></b></li>
					<li><b><a id='dd' href="#">Spa</a></b></li>
					<li><b><a id='dd' href="#">Laundries</a></b></li>
					<li><b><a id='dd' href="#">Mobile & Accessories</a></b></li>-->
				</ul>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
				<div class="nav navbar-left">
					<a href='#' class="glyphicon glyphicon-tasks btn" style="color:white;" id="menu-toggle"></a>
				</div>
		<div class="container" >
			<div class="navbar-header">
					<a class="navbar-brand" href="buyer.php">
						<img src="../images/LOGO3.png">
					</a>
				</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="buyer.php">Home</a></li>					
			
			</ul>
			<!-- Login and signup-->
			<ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user" style="color:cyan"></span>  <?php echo ucfirst($_SESSION['buyername']);?></a></li>
        <li><a href="signout.php"><span class="glyphicon glyphicon-off" style="color:red;"></span> Signout</a></li>
      </ul>
      	<form class="navbar-form navbar-left" role="search">
          	<div class="form-group">
              <input type="text" class="form-control" placeholder="Search" name="search">
            </div>
            <button type="submit" class="btn btn-info" name="submit">Submit</button>
  		</form>
		</div>
		</div>
	</nav>
		
	<!--carousel-->
	<div id="mycarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#mycarousel" data-slide-to="0" class="active"></li>
			<li data-target="#mycarousel" data-slide-to="1"></li>
			<li data-target="#mycarousel" data-slide-to="2"></li>
			<li data-target="#mycarousel" data-slide-to="3"></li>
			<li data-target="#mycarousel" data-slide-to="4"></li>
			<li data-target="#mycarousel" data-slide-to="5"></li>
			<li data-target="#mycarousel" data-slide-to="6"></li>
			<li data-target="#mycarousel" data-slide-to="7"></li>
			<li data-target="#mycarousel" data-slide-to="8"></li>
		</ol>

		<!-- Wrapper -->		  
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img src="../images/images_carousel/a1.jpg">
					<div class="carousel-caption">
					<h1>Accomodations</h1>
					</div>
			</div>
			
			<div class="item">
				<img src="../images/images_carousel/r1.jpg">
					<div class="carousel-caption">
							<h1>Resturants</h1>
					</div>
			</div>	
			<div class="item">
				<img src="../images/images_carousel/bars.jpg">
					<div class="carousel-caption">
							<h1>Cafe and Lounge</h1>
					</div>
			</div>		
					
			
			<div class="item">
				<img src="../images/images_carousel/b.jpg">
					<div class="carousel-caption">
							<h1>Books Store</h1>
					</div>
			</div>		
			<div class="item">
				<img src="../images/images_carousel/footwear-shops.jpg">
					<div class="carousel-caption">
							<h1>Footwear</h1>
					</div>
			</div>		
			<div class="item">
				<img src="../images/images_carousel/headerLaundries_384.jpg">
					<div class="carousel-caption">
							<h1>Laundries</h1>
					</div>
			</div>		
			<div class="item">
				<img src="../images/images_carousel/sal.jpg">
					<div class="carousel-caption">
							<h1>Salons</h1>
					</div>
			</div>		
			<div class="item">
				<img src="../images/images_carousel/9.jpg">
					<div class="carousel-caption">
							<h1>Spa</h1>
					</div>
			</div>
			
			<div class="item">
				<img src="../images/images_carousel/f.jpg">
					<div class="carousel-caption">
							<h1>Fitness</h1>
					</div>
			</div>						
		</div>
	
		<!-- Buttons-->
		<a class="left carousel-control" href="#mycarousel" role="button" data-slide="prev">
		  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		  <span class="sr-only">Previous</span>
		</a>
		<a href="#mycarousel" class="right carousel-control" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

	<!---tabs-->
	<!--Image tabs-->
	<div id='tabs' class="container text-center">
	  <h3>What We Do</h3><br>
	  <div class="row">
	    <div class="col-sm-4">
	      <a href='#'><img src="../images/images_carousel/a.jpg" class="img-responsive" style="width:100%" alt="Image"></a>
	      <p>Current Project</p>
	    </div>
	    <div class="col-sm-4">
	      <a href='vendor.php'><img src="../images/images_carousel/a.jpg" class="img-responsive" style="width:100%" alt="Image"></a>
	      <p>Project 2</p>
	    </div>
		<div class="col-sm-4">
	      <a href='#'><img src="../images/images_carousel/a.jpg" class="img-responsive" style="width:100%" alt="Image"></a>
	      <p>Project 2</p>
	    </div>
		<div class="col-sm-4">
	      <a href='#'><img src="../images/images_carousel/a.jpg" class="img-responsive" style="width:100%" alt="Image"></a>
	      <p>Project 2</p>
	    </div>
		<div class="col-sm-4">
	      <a href='#'><img src="../images/images_carousel/a.jpg" class="img-responsive" style="width:100%" alt="Image"></a>
	      <p>Project 2</p>
	    </div>
		<div class="col-sm-4">
	      <a href='#'><img src="../images/images_carousel/a.jpg" class="img-responsive" style="width:100%" alt="Image"></a>
	      <p>Project 2</p>
	    </div>

	  </div>
	</div>

	<!--Footer-->
	<footer class="text-center container-fluid bg-light" id="myfooter"> 		
		<div class="container">
			<div class="navbar-left">
				<b><a href="helpcenter.php">Help Center</b>
				<b><a href="Faqs.php">FAQS</b>
				<b><a href="helpcenter.php">Terms And Conditons</b>
			</div>		
			<div class="navbar-right">
				<b><a href="Facebook.php">Facebook</b>
				<b><a href="Twitter.php">Twitter</b>
				<b><a href="Instagram">Instagram</b>
			</div>
		</div>		
	</footer>	
	</body>
	
	<script>
	$("#menu-toggle").click(function(e){
		e.preventDefault();
		$('#wrapper').toggleClass("menuDisplayed");
	});
</script>
		
		