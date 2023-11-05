<?php require_once './inc/connection.php' ?>
<?php
session_start();
if (!isset($_SESSION['id'])) {
  header("location:signin.php");
}
?>
<?php
if (isset($_SESSION['id'])) {
  $id = $_SESSION['id'];
  $student = "SELECT * FROM students WHERE id = '$id'";
  $result = mysqli_query($connection, $student);

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $data[] = $row;
    }
    $data = array_shift($data);
  }
}

if(isset($_POST["apply"])){
  $applied_subject = $_POST["applied_subject"];
  
  $application = "SELECT * FROM applications WHERE user_id = '$id' AND applied_subject = '$applied_subject'";
  $application_result = mysqli_query($connection, $application);

  if (mysqli_num_rows($application_result) > 0) {
    while ($application_row = mysqli_fetch_assoc($application_result)) {
      $application_data[] = $application_row;
    }
    $application_data = array_shift($application_data);
  }
if(empty($application_data)){

  $name = $data["fname"];
  $cnic = $data["cnic"];
  $contact_number = $data["contact_number"];
  $marks_matric = $data["marks_matric"];
  $marks_intermediate = $data["marks_intermediate"];
  $applied_subject = $_POST["applied_subject"];
  $status = "pending";
  $user_id = $data["id"];

  $applysql = "INSERT INTO applications (name, cnic, contact_number, matric_marks, inter_marks, applied_subject, status, user_id) VALUES ('$name', '$cnic', '$contact_number', '$marks_matric', '$marks_intermediate', '$applied_subject', '$status', '$user_id')";

  $resultApply = mysqli_query($connection, $applysql);

  // Check if the query was executed successfully
  if ($resultApply) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Applied Successfully!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
  } else {
    // Query execution failed
    // You can handle the error or display an error message here
    die();
  }
}else{
  echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>You Can't Apply more than 1 time for same course!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
}
}

?>
<?php require_once './inc/header.php' ?>
<?php require_once './inc/loggedinNav.php' ?>
<div class="col-12">
  <div class="row">
    <?php require_once './inc/sidebar.php' ?>
    <div class="col-9 pt-5">
      <div class="display-4 text-center text-primary">
        Apply Now!
      </div>
      <form method="post" action="">
        <div class="form-group">
          <label for="">Select Course</label>
          <select class="form-control" name="applied_subject" id="">
            <optgroup label="CS/IT Department">
              <option value="BS-CS">BS Computer Science</option>
              <option value="BS-IT">BS Information Technology</option>
              <option value="BS-SE">BS Software Engineering</option>
            </optgroup>

            <optgroup label="Chemistry Department">
              <option value="BS-Chemistry">BS Chemistry</option>
              <option value="Bio-Chemistry">Bio-Chemistry</option>
            </optgroup>
            <optgroup label="Physics Department">
              <option value="BS-Physics">BS Physics</option>
            </optgroup>
            <optgroup label="Mathematics Department">
              <option value="BS-Maths">BS Mathematics</option>
            </optgroup>
            <optgroup label="Bussiness Department">
              <option value="BBA">BBA</option>
              <option value="BS-Economics">BS Economics</option>
              <option value="BS-Management">BS Management</option>
            </optgroup>
          </select>
        </div>
        <button class="btn btn-primary d-block mx-auto w-50 p-2" name="apply" type="submit">Apply</button>
      </form>
    </div>
  </div>
</div>
<?php include './inc/loggedinFooter.php' ?>