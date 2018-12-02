<?php
require_once('functions.php');
$db = config('db');

$con = mysqli_connect($db['host'], $db['user'], $db['pass'], $db['name']);
mysqli_set_charset($con, "utf8");
?>