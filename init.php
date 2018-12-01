<?php
require_once('functions.php');
$db = require_once('schema.sql');

$con = mysqli_connect($db['localhost'], $db['root'], $db[''], $db['yeticave']);
mysqli_set_charset($con, "utf8");

?>