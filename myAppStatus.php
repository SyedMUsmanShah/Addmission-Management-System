<?php require_once './inc/connection.php' ?>
<?php
session_start();
if (!isset($_SESSION['id'])) {
  header("location:signin.php");
}
?>
<?php

if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    $student = "SELECT * FROM students WHERE id = '$id'";
    $result = mysqli_query($connection, $student);
    
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
      }
      $data = array_shift($data);
    }


  $status = "SELECT * FROM applications WHERE user_id = '$id'";
  $status_result = mysqli_query($connection, $status);

  if (mysqli_num_rows($status_result) > 0) {
    while ($status_row = mysqli_fetch_assoc($status_result)) {
      $status_data[] = $status_row;
    }
  }
}

?>
<?php require_once './inc/header.php' ?>
<?php require_once './inc/loggedinNav.php' ?>
<div class="col-12">
  <div class="row">
    <?php require_once './inc/sidebar.php' ?>
    <div class="col-9 pt-5">
      <div class="display-5 text-center text-primary">
        <?php foreach($status_data as $app_status){ ?>
        <h3>Your Applications For <?php echo $app_status["applied_subject"] . " is "?><?php if($app_status["status"] == "approved" ){
          echo "<span class='text-success'>" . $app_status["status"] . "</span>"; 
        }elseif($app_status["status"] == "rejected" ){
          echo "<span class='text-danger'>" . $app_status["status"] . "</span>"; 
        }else{
          echo "<span class='text-secondary'>" . $app_status["status"] . "</span>"; 
        } ?></h3>
        <?php } ?>
      </div>

    </div>
  </div>
</div>
<?php include './inc/loggedinFooter.php' ?>