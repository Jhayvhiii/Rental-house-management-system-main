<?php
require_once "admin/functions/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="images/icon.png">
<title>Available Units | East Rembo Rentals</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Coalition Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- font-awesome-icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome-icons -->
<link href="//fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</head>
<body>
<!-- banner -->
	<div class="banner1">
		<div class="container">
			<div class="w3_agile_banner_top">
				<div class="agile_phone_mail">
					<ul>
						<li><i class="fa fa-phone" aria-hidden="true"></i>+63 9XX XXX XXXX</li>
						<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@eastrembo-rentals.example">info@eastrembo-rentals.example</a></li>
					</ul>
				</div>
			</div>
			<div class="agileits_w3layouts_banner_nav">
				<nav class="navbar navbar-default">
					<div class="navbar-header navbar-left">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<h1><a class="navbar-brand" href="index.php"><img src="images/logo.png" class="img-responsive"></a></h1>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
						<nav class="cl-effect-13" id="cl-effect-13">
						<ul class="nav navbar-nav">
							<li><a href="index.php">Home</a></li>
							<li><a href="about.php">About</a></li>
							<li class="active"><a href="portfolio.php">Available Units</a></li>
							<li><a href="blog.php">Blog</a></li>
							<li><a href="contact.php">Contact</a></li>
						</ul>
						
					</nav>

					</div>
				</nav>
			</div>
		</div>
	</div>
<!-- //banner -->
<!-- gallery -->
	<div class="gallery">
		<div class="container">
			<h2 class="w3l_head w3l_head1">Available Units in East Rembo</h2>
			<div class="wthree_gallery_grids">
				<?php
					$units = mysqli_query($conn, "SELECT `house_name`,`number_of_rooms`,`rent_amount`,`location`,`num_of_bedrooms` FROM `houses` WHERE `house_status`='Vacant' ORDER BY `rent_amount` ASC");
					if ($units && mysqli_num_rows($units) > 0) {
						while ($u = mysqli_fetch_assoc($units)) {
							$beds = (int)$u['num_of_bedrooms'];
							$bedLabel = $beds === 0 ? 'Studio / Room / Bedspace' : $beds . ' bedroom' . ($beds > 1 ? 's' : '');
							echo '<div class="col-md-4 col-sm-6" style="margin-bottom:25px;">'
								. '<div style="border:1px solid #ddd; border-radius:6px; padding:20px; background:#fff;">'
								. '<h4>' . htmlspecialchars($u['house_name']) . '</h4>'
								. '<p><span class="glyphicon glyphicon-map-marker"></span> ' . htmlspecialchars($u['location']) . ', Brgy. East Rembo, Taguig City</p>'
								. '<p><span class="glyphicon glyphicon-home"></span> ' . htmlspecialchars($bedLabel) . '</p>'
								. '<p><strong style="font-size:1.4em;">&#8369;' . number_format((float)$u['rent_amount']) . '</strong> / month</p>'
								. '<p>' . (int)$u['number_of_rooms'] . ' unit(s) available</p>'
								. '<a href="contact.php" class="btn btn-default">Inquire / Schedule a viewing</a>'
								. '</div></div>';
						}
					} else {
						echo '<p class="text-center">No vacant units are listed right now. Please check back soon or <a href="contact.php">contact us</a>.</p>';
					}
				?>
				<div class="clearfix"></div>
			</div>
			<script src="js/jzBox.js"></script>
		</div>
	</div>
<!-- //gallery -->
<!-- footer -->
	
	<?php 
		include("footer.php");
	?>
