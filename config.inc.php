<?php
$db_username        = 'viyabiz_vinz'; //MySql database username
$db_password        = 'viyaSmart$6'; //MySql dataabse password
$db_name            = 'viyabiz_hns'; //MySql database name
$db_host            = 'localhost'; //MySql hostname or IP

$currency			= 'Rs '; //currency symbol &#8377;

$mysqli_conn = new mysqli($db_host, $db_username, $db_password,$db_name); //connect to MySql
if ($mysqli_conn->connect_error) {//Output any connection error
    die('Error : ('. $mysqli_conn->connect_errno .') '. $mysqli_conn->connect_error);
}