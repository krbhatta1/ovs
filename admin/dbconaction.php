<?php
$servername="localhost";
$username="root";
$password="";
$dbname="ovs";

$con=mysqli_connect($servername,$username,$password,$dbname);

if (!$con) {
  die(" Database Connection failed: " . mysqli_connect_error());
}
?>