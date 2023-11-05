<?php

require_once './inc/sqlfunctions.php';

if(isset($_GET["id"])){
  $id = $_GET["id"];


  $user = select_where("students","id",$id,$connection,1);
  if(unlink("../images/" . $user["image"])){
    delete_where_fun("students","id",$id,$connection);
    delete_where_fun("applications","user_id",$id,$connection);
  }
  header("location:members.php");
}

?>
