<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$currency			= 'Rs '; //currency symbol &#8377;

$mysqli_conn = new mysqli($server, $username, $password, $db);
if ($mysqli_conn->connect_error) {//Output any connection error
    die('Error : ('. $mysqli_conn->connect_errno .') '. $mysqli_conn->connect_error);
}