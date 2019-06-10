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

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=0">

	<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
	<link rel="stylesheet" href="cydia/css/ios7.min.css">
	<script src="cydia/js/ios7.min.js"></script>
	<style>
		.d-flex {
			display: flex;
		}
		.d-flex p {
			margin: 0;
		}
		.row {
		  display: flex;
		  padding: 0 4px;
		}

		/* Create two equal columns that sits next to each other */
		.column {
		  flex: 50%;
		  padding: 0 4px;
		}

		.column img {
		  margin-top: 8px;
		  vertical-align: middle;
		  width: 100%;
		}

	</style>
</head>
<body>
	<main id="content">
		<div class="d-flex">
	        <img style="margin:left; padding-left: 10px; border-radius: 15px;" id="package-icon" width="64" height="64"/>
	        <span style="margin-top: auto; margin-bottom: auto;padding-left: 10px;">
	        	<p><b><?php echo $package->{'name'};?></b></p>
	        	<p style="color: #3c6891;"><?php echo $package->{'version'};?></p>
	        </span>
	       	<span style="margin-top: auto; margin-bottom: auto; margin-left:auto; padding-right: 10px; float: right;">
	        	<p>&nbsp;</p>
	        	<p><small><?php echo $package->{'size'};?></small></p>
	        </span>
	    </div>
		<ul id="main-holder">
			<li>
				<a href="mailto:<?php echo $authorEmail;?>" target="_blank" role="button"><span><i data-feather="mail"></i></span><span style="float: right;"><?php echo $authorName;?></span></a>
			</li>
		</ul>
		<ul id="main-holder">
			<li>
				<p><?php echo $package->{'longDescription'};?></p>
			</li>
		</ul>
		<ul id="main-holder" style="margin-bottom: 10px;">
			<li>
				<div class="row"> 
  <div class="column">
				<img src="img/screen1.png">
			</div>
			  <div class="column">
				<img src="img/screen2.png">
  </div>
</div>

			</li>
		</ul>
		<p role="footer" style="text-align: center; margin: 0;">
			<?php echo $package->{'identifier'};?>
			
		</p>
		<p role="footer" style="text-align: center; margin: 0;">
			va2ron1 • <?php echo $package->{'section'};?>
		</p>
	</main>
	<script>
	  feather.replace()
	</script>
</body>
</html>
