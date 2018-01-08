<html>
<head>
	<?php
        require_once("headfiles/vendor_head.php");
		require_once("./classes/DBCnct.php");
		
		echo "<title>Vendor: ".ucfirst($_SESSION['vusername'])."</title>";
		
		class Vendor{
		    private $con;
		    private $smt;
		    private $dbcnt;
		    public $result;
		    
		    public function __construct(){
		        if(!isset($_SESSION["vusername"]))
		          session_destroy();
		        
		        $this->setCookie();
		        $this->dbcnt = new DBCnct();
		        $this->con = $this->dbcnt->getConnection();		        
		    }
		    
		    private function setCookie(){
		        if( isset($_COOKIE["un"]) == $_SESSION["vusername"])
		            setcookie("un", $_SESSION["vusername"]);
		        else
		            unset($_COOKIE["un"]);
		    }
		    
		    public function selectData(){
		        $sqlSelect = "select * from oneatstop.vendor where username = ?";
		        $this->smt = $this->con->prepare($sqlSelect);
		        $this->smt->bind_param("s", $_SESSION["vusername"]);
		        $this->smt->execute();
		        $result = $this->smt->get_result();
		        $this->result = $result->fetch_assoc();
		    }
		    
		    public function updateCoverPhoto(){
		        extract($_POST);
		        $targetdir = "../uploads/cover_pics/";
		        move_uploaded_file( $_FILES['cpic']['tmp_name'], $targetdir.$_FILES['cpic']['name'] );
		        $photoname = $targetdir.$_FILES['cpic']['name'];
		        $query = "UPDATE oneatstop.vendor SET cover = ? WHERE username = ?";
				$this->smt = $this->con->prepare($query);
				$this->smt->bind_param("ss", $photoname, $_SESSION['vusername']);
				$check = $this->smt->execute();
		        if($check){
		            header("location:vendor.php");
		        }
		    }
		    
		    public function execute(){
		        try{
		            $this->selectData();
		            if(isset($_POST["submit"])){
		                $this->updateCoverPhoto();
		            }
		        }catch(Exception $e){
		            $e->getMessage();
		        }
		    }
		}//class Vendor
		
		$vendor = new Vendor();
		$vendor->execute();
	?>
</head>

<body>	
	<!--Vendor Cover Photo-->
	<!-- <div id='cover' class='container-fluid'> -->
	<div id='cover' class="container">
		<div class="row">
			<!-- <?php echo "<img src='$vendor->result[cover]' class='img-fluid img-rounded center-block'>";?> -->
			<img src="<?php echo $vendor->result['cover']?>"/>
		</div>
		<form action='' method='post' enctype="multipart/form-data">
			<div class="btn-group">
    			<input id='cpic1' type='file' name="cpic" class="btn"/>
    			<input id='cpic2' type='submit' name='submit' value='Upload' class="btn btn-primary"/>
			</div>
		</form>
	</div>
	
	<hr/>
	<!--Menu 2-->
	<!--<nav id='menu' class="navbar">-->
	<nav id='sticky' class="navbar">		
		<!--Collapse Navbar-->
		<button class="navbar-toggle" data-toggle='collapse' data-target=".navHeaderCollapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		
		<!--Nav-->		
		<div class='container'>
		<div class="collapse navbar-collapse navHeaderCollapse">
			<ul class="nav nav-pills nav-justified">
			 <li class="nav-item active"><a class="nav-link" href="#">Home</a></li>
			 <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
			 <li class="nav-item"><a class="nav-link" href="#">Gallery</a></li>
			 <li class="nav-item"><a class="nav-link" href="#">Menu</a></li>
 			 <li class="nav-item"><a class="nav-link" href="code.php">Special Offers</a></li>
			 <li class="nav-item"><a class="nav-link" href="comment.php">Feedback</a></li>			
			 <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
		  </ul>
		</div>
		</div>
	</nav>
	
	<!--<div id='tabs' class="container text-center">-->
	<div id='sticky-anchor' class="container text-center">
		<div class='row'>
			<div class="col-sm-4">
				<img src='../images/cover.jpg' class="img-responsive" style="width=100%;">
				<p>Current Project</p>
			</div>
			<div class="col-sm-4">
				<img src='../images/cover.jpg' class="img-responsive" style="width=100%;">
				<p>Current Project</p>
			</div>
			<div class="col-sm-4">
				<img src='../images/cover.jpg' class="img-responsive" style="width=100%;">
				<p>Current Project</p>
			</div>
			<div class="col-sm-4">
				<img src='../images/cover.jpg' class="img-responsive" style="width=100%;">
				<p>Current Project</p>
			</div>
			<div class="col-sm-4">
				<img src='../images/cover.jpg' class="img-responsive" style="width=100%;">
				<p>Current Project</p>
			</div>
			<div class="col-sm-4">
				<img src='../images/cover.jpg' class="img-responsive" style="width=100%;">
				<p>Current Project</p>
			</div>
			<div class="col-sm-4">
				<img src='../images/cover.jpg' class="img-responsive" style="width=100%;">
				<p>Current Project</p>
			</div>
			<div class="col-sm-4">
				<img src='../images/cover.jpg' class="img-responsive" style="width=100%;">
				<p>Current Project</p>
			</div>
			<div class="col-sm-4">
				<img src='../images/cover.jpg' class="img-responsive" style="width=100%;">
				<p>Current Project</p>
			</div>
			<div class="col-sm-4">
				<img src='../images/cover.jpg' class="img-responsive" style="width=100%;">
				<p>Current Project</p>
			</div>
			<div class="col-sm-4">
				<img src='../images/cover.jpg' class="img-responsive" style="width=100%;">
				<p>Current Project</p>
			</div>
			<div class="col-sm-4">
				<img src='../images/cover.jpg' class="img-responsive" style="width=100%;">
				<p>Current Project</p>
			</div>
			<div class="col-sm-4">
				<img src='../images/cover.jpg' class="img-responsive" style="width=100%;">
				<p>Current Project</p>
			</div>
			<div class="col-sm-4">
				<img src='../images/cover.jpg' class="img-responsive" style="width=100%;">
				<p>Current Project</p>
			</div>
			<div class="col-sm-4">
				<img src='../images/cover.jpg' class="img-responsive" style="width=100%;">
				<p>Current Project</p>
			</div>
			<div class="col-sm-4">
				<img src='../images/cover.jpg' class="img-responsive" style="width=100%;">
				<p>Current Project</p>
			</div>
			<div class="col-sm-4">
				<img src='../images/cover.jpg' class="img-responsive" style="width=100%;">
				<p>Current Project</p>
			</div>
			<div class="col-sm-4">
				<img src='../images/cover.jpg' class="img-responsive" style="width=100%;">
				<p>Current Project</p>
			</div>
		</div>
	</div><br/>	

	
	<script type="text/javascript">
		$(function(){
			$('#cpic1').hide();
			$('#cpic2').hide();
			$('#cover').hover(function(){
				$('#cpic1').show();
				$('#cpic2').show();
				$('#cpic1').css("margin-left","700px");
			},function(){
				$('#cpic1').hide();
				$('#cpic2').hide();
			});
			//$('#sticky').stick_in_parent();
			//$('#sticky').css("margin-top", "60px");				
			//$('#tabs').css("z-index", -1);				
			/* function sticky_relocate() {
				var window_top = $(window).scrollTop();
				var div_top = $('#sticky-anchor').offset().top;
				if (window_top > div_top) {
					$('#sticky').addClass('stick');
					$('#sticky-anchor').height($('#sticky').outerHeight());
				} else {
					$('#sticky').removeClass('stick');
					$('#sticky-anchor').height(50);
				}
			}
			$(function() {
				$(window).scroll(sticky_relocate);
				sticky_relocate();
			}); */
		})
	</script>

	<style>
		.container{
			position: relative;
		}
	</style>
</body>

<footer class="text-center container-fluid bg-light" style="height:60px;">
		<p><label>Footer</label></p>
	</footer>

</html>