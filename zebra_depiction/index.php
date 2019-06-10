<?php

// Get all headers
$headers = getallheaders();

// Decode zebra package payload
$package = json_decode($headers['zebra']);

if (strcmp($package->{'identifier'}, "com.va2ron1.cydiatemplate") == 0) {
    header("Location: cydia.php");
} else if (strcmp($package->{'identifier'}, "com.va2ron1.sileotemplate") == 0) {
    header("Location: sileo.php");
}

?>