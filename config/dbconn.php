<?php
global  $ConnStrx;
require_once 'C:\xampp\htdocs\To-Do\utils\functions.php';

$dbHost = config('config', 'db_host');
$dbUsername = config('config', 'db_user');
$dbPassword = config('config', 'db_pass');
$dbName = config('config', 'db_name');
$dbPort = config('config', 'db_port');
$dbPort = (int)$dbPort;
$socket="";
// Use the retrieved values as needed
$ConnStrx = mysqli_connect($dbHost, $dbUsername, $dbPassword,$dbName,$dbPort,$socket);

if(!$ConnStrx)
{
    die("error: ".mysqli_connect_error($ConnStrx));
}

