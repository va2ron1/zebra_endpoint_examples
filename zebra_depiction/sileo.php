<?php

// Get all headers
$headers = getallheaders();

// Decode zebra package payload
$package = json_decode($headers['zebra']);

// Extract author data
preg_match_all('/([a-z0-9.@]+)[^ <>]/', $package->{'author'}, $matches);
$authorName = $matches[0][0];
$authorEmail = $matches[0][1];

?>

<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="sileo/css/bootstrap.min.css">
	<style>
		.topnav {
			overflow: hidden;
		}

		/* Style the links inside the navigation bar */
		.topnav a {
			float: left;
			display: block;
			color: #c1c1c1;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			font-size: 17px;
			border-bottom: 3px solid transparent;
			width: 100%
		}

		.topnav a:hover {
			border-bottom: 3px solid #7bc5c9;
		}

		.topnav a.active {
			color: #7bc5c9;
			border-bottom: 3px solid #7bc5c9;
		}
		#headerImage {
			background-image: linear-gradient(#315051, #7bc5c9);
		}
	</style>
</head>
<body>
	<div id="headerImage" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100" height="150px">
			</div>
		</div>
	</div>
	<div class="container pt-3">
		<div class="row align-items-center">
			<div class="col-2">
				<img id="package-icon" height="64" width="64">
			</div>
			<div class="col-10">
				<p class="p-0 m-0"><b><?php echo $package->{'name'};?></b></p>
				<p class="p-0 m-0" style="color: #c1c1c1;"><?php echo $authorName;?></p>
			</div>
		</div>
	</div>
	<div class="topnav nav nav-pills" id="pills-tab" role="tablist">
		<a class="col-6 active" id="pills-details-tab" data-toggle="pill" href="#pills-details" role="tab" aria-controls="pills-details" aria-selected="true">Details</a>
		<a class="col-6" id="pills-changelog-tab" data-toggle="pill" href="#pills-changelog" role="tab" aria-controls="pills-changelog" aria-selected="true">Changelog</a>
	</div>
	<div class="tab-content" id="pills-tabContent">
		<div class="tab-pane fade show active" id="pills-details" role="tabpanel" aria-labelledby="pills-details-tab">
			<div id="screenshotsImages" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner p-5">
					<div class="carousel-item active">
						<img src="img/screen1.png" class="mx-auto d-block w-50">
					</div>
					<div class="carousel-item">
						<img src="img/screen2.png" class="mx-auto d-block w-50">
					</div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#screenshotsImages" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#screenshotsImages" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
			<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">              
			      <div class="modal-body">
			      	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			        <img src="" class="screenshotPreview" style="width: 100%;" >
			      </div>
			    </div>
			  </div>
			</div>
			<hr>
			<p class="px-3"><?php echo $package->{'longDescription'};?></p>
			<p class="pt-2 text-center" style="color: #c1c1c1;"><small><?php echo $package->{'identifier'} . ' (' . $package->{'version'} . ')';?></small></p>
		</div>
		<div class="tab-pane fade" id="pills-changelog" role="tabpanel" aria-labelledby="pills-changelog-tab">
			<div class="container">
				<div class="row">
					<div class="col-1 text-left">
						<b>1.0.0</b>
					</div>
					<div class="col-12">
						<div class="col-10">
							<ul class="list-unstyled">
								<li>1) First experiment</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="sileo/js/jquery-3.3.1.slim.min.js"></script>
	<script src="sileo/js/popper.min.js"></script>
	<script src="sileo/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		$(function() {
			$('#screenshotsImages .carousel-item').on('click', function() {
				$('.screenshotPreview').attr('src', $(this).find('img').attr('src'));
				$('#imagemodal').modal('show');   
			});		
		});
	</script>

</body>
</html>