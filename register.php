<?php require_once './inc/connection.php' ?>
<?php

if (isset($_POST['submit'])) {
  $fname = $_POST['fname'];
  $uname = $_POST['uname'];
  $age = $_POST['age'];
  $dateOfBirth = $_POST['date_of_birth'];
  $contactNumber = $_POST['contact_number'];
  $address = $_POST['address'];
  $cnic = $_POST['cnic'];
  $domicile = $_POST['domicile'];
  $fatherName = $_POST['father_name'];
  $fatherOccupation = $_POST['father_occupation'];
  $fatherCnic = $_POST['father_cnic'];
  $annualIncome = $_POST['annual_income'];
  $marksMatric = $_POST['marks_matric'];
  $totalMatric = $_POST['total_marks_matric'];
  $schoolName = $_POST['school_name'];
  $marksIntermediate = $_POST['marks_intermediate'];
  $totalIntermediate = $_POST['total_marks_intermediate'];
  $collegeName = $_POST['college_name'];
  $password = $_POST['password'];

  $image_name = $_FILES['image']['name'];

  $image_tmp = $_FILES['image']['tmp_name'];

  move_uploaded_file($image_tmp, './images/' . $image_name);



  $registerSql = "INSERT INTO students (fname, uname, age, date_of_birth, contact_number, `address`, cnic, domicile, father_name, father_occupation, father_cnic, annual_income, marks_matric, total_matric, school_name, marks_intermediate, total_intermediate, college_name, `password`, `image`) VALUES ('$fname', '$uname', $age, '$dateOfBirth', '$contactNumber', '$address', '$cnic', '$domicile', '$fatherName', '$fatherOccupation', '$fatherCnic', '$annualIncome', '$marksMatric', '$totalMatric', '$schoolName', '$marksIntermediate', '$totalIntermediate', '$collegeName', '$password', '$image_name')";

  $resultRegister = mysqli_query($connection, $registerSql);

  // Check if the query was executed successfully
  if ($resultRegister) {
    echo "Data inserted successfully.";
  } else {
    // Query execution failed
    // You can handle the error or display an error message here
    die();
  }
}
?>
<?php require_once './inc/header.php' ?>

<?php require_once './inc/navbar.php' ?>

<div class="col-10 mx-auto shadow mt-5 bg-light text-primary p-5">
  <div class="display-4 text-center ">
    Register
  </div>
  <form method="post" action="" enctype="multipart/form-data">
    <div class="row">

      <div class="col-6 my-2">
        <label for="full-name" class="">Full Name</label>
        <input type="text" class="form-control" id="full-name" name="fname" placeholder="Enter full name">
      </div>
      <div class="col-6 my-2">
        <label for="full-name" class="">User Name</label>
        <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter user name">
      </div>
      <div class="col-6 my-2">
        <label for="age" class="">Age</label>
        <input type="number" class="form-control" id="age" name="age" placeholder="Enter age">
      </div>
      <div class="col-6 my-2">
        <label for="date-of-birth" class="">Date of Birth</label>
        <input type="date" class="form-control" id="date-of-birth" name="date_of_birth">
      </div>
      <div class="col-6 my-2">
        <label for="contact-number" class="">Contact Number</label>
        <input type="tel" class="form-control" id="contact-number" name="contact_number" placeholder="Enter contact number">
      </div>
      <div class="col-6 my-2">
        <div class="form-group">
          <label for="password">Choose your Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="">
        </div>
      </div>
      <div class="col-12">
        <div class="form-group">
          <label for="">Picture</label>
          <input type="file" class="form-control-file" name="image" id="" placeholder="" aria-describedby="fileHelpId">
          <small id="fileHelpId" class="form-text text-muted">The picture should not be blur and should have blue background</small>
        </div>
      </div>
      <div class="col-12">
        <label for="address" class="">Address</label>
        <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter address"></textarea>
      </div>
      <div class="col-6 my-2">
        <label for="cnic" class="">CNIC</label>
        <input type="text" class="form-control" id="cnic" name="cnic" placeholder="Enter CNIC">
      </div>
      <div class="col-6 my-2">
        <label for="domicile" class="">Domicile</label>
        <input type="text" class="form-control" id="domicile" name="domicile" placeholder="Enter domicile">
      </div>
      <div class="col-6 my-2">
        <label for="father-name" class="">Father Name</label>
        <input type="text" class="form-control" id="father-name" name="father_name" placeholder="Enter father's name">
      </div>
      <div class="col-6 my-2">
        <label for="father-occupation" class="">Father Occupation</label>
        <input type="text" class="form-control" id="father-occupation" name="father_occupation" placeholder="Enter father's occupation">
      </div>
      <div class="col-6 my-2">
        <label for="father-cnic" class="">Father CNIC</label>
        <input type="text" class="form-control" id="father-cnic" name="father_cnic" placeholder="Enter father's CNIC">
      </div>
      <div class="col-6 my-2">
        <label for="annual-income" class="">Annual Income</label>
        <input type="text" class="form-control" id="annual-income" name="annual_income" placeholder="Enter annual income">
      </div>
      <div class="col-6 my-2">
        <label for="marks-matric" class="">Marks In Matric</label>
        <input type="text" class="form-control" id="marks-matric" name="marks_matric" placeholder="Enter marks in Matric">
      </div>
      <div class="col-6 my-2">
        <label for="total-marks-matric" class="">Total Marks In Matric</label>
        <input type="text" class="form-control" id="total-marks-matric" name="total_marks_matric" placeholder="Enter total marks in Matric">
      </div>

      <div class="col-12 my-2">
        <label for="school-name" class="">School Name</label>
        <input type="text" class="form-control" id="school-name" name="school_name" placeholder="Enter school name">
      </div>
      <div class="col-6 my-2">
        <label for="marks-intermediate" class="">Marks In Intermediate</label>
        <input type="text" class="form-control" id="marks-intermediate" name="marks_intermediate" placeholder="Enter marks in Intermediate">
      </div>
      <div class="col-6 my-2">
        <label for="total-marks-intermediate" class="">Total Marks In Intermediate</label>
        <input type="text" class="form-control" id="total-marks-intermediate" name="total_marks_intermediate" placeholder="Enter total marks in Intermediate">
      </div>
      <div class="col-12 my-2">
        <label for="college-name" class="">College Name</label>
        <input type="text" class="form-control" id="college-name" name="college_name" placeholder="Enter college name">
      </div>
    </div>
    <button type="submit" name="submit" class="btn btn-info">Register</button>
  </form>
</div>

<?php include './inc/footer.php' ?>