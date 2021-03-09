<?php
date_default_timezone_set("Asia/Manila");
$mysqli = new mysqli("localhost", "root", "", "bmis");
if ($mysqli->connect_errno) {
	echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}
?>
