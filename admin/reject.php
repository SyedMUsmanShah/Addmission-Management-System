<?php

require_once './inc/sqlfunctions.php';

if(isset($_GET["id"])){
  $id = $_GET["id"];
}

$update = "UPDATE applications SET status = 'rejected' WHERE id = $id;";
$query = mysqli_query($connection,$update);
header("location:applications.php");

?>
