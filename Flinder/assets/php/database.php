<?php

$servername = 'localhost';
$dbname = 'flinder';
$dsn = "mysql:host=$servername;dbname=$dbname";
$user = 'root';
$passw = '';
$conn = new PDO($dsn, $user, $passw);

?>