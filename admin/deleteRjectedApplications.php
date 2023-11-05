<?php

require_once './inc/sqlfunctions.php';

if(isset($_GET["id"])){
  $id = $_GET["id"];
  delete_where_fun("applications","id",$id,$connection);
  header("location:rejectedApplications.php");
}

?>
