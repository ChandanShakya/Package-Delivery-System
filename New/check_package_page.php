<?php
$cssFiles = ['index.css']; // Specify the CSS file names here dynamically as an array ['', '']
$disableBootstrap = true; // Disable Bootstrap CSS
include 'php/connection.php';
include 'php/page_header.php';

include 'php/check_package.php';

$jsFiles = ['index.js']; // Specify the JavaScript file names here dynamically as an array ['', '']
include 'php/page_footer.php';
?>