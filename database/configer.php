<?php
$server = 'localhost';
$user = 'root';
$password = "";
$db = 'blog';

$conn = mysqli_connect($server, $user, $password, $db);
if(!$conn){
    die("DB connection failed" . mysqli_connect_error());
  }
?>