<?php
error_reporting(0);
include_once 'functions.php';
date_default_timezone_set('Europe/Dublin');

$username = ''; //your_name
$password = ''; //your_password
$hostname = 'localhost'; //host name
$database = 'sample_db';
    
$dbhandle = mysql_connect($hostname, $username, $password) or die('Unable to connect to MySQL : '.mysql_error());
mysql_select_db($database,$dbhandle) or die('Could not connect to database : '.mysql_error());

//Static Variables (Color Scheme)
define('SELECT_ROW_BG','#57D6FB');
define('SELECT_ROW_TEXT','white');
define('DEFAULT_ROW_BG','white');
define('DEFAULT_TEXT','black');
?>
