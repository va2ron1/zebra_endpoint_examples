<?php

// Get all headers
$headers = getallheaders();

// Decode zebra package payload
$package = json_decode($headers['zebra']);

echo "<h2>" . $package->{'identifier'} . "</h2>"

?>