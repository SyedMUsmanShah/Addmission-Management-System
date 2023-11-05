<?php require_once './inc/connection.php' ?>
<?php
session_start();
if(!isset($_SESSION['id'])){
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
}

 ?>
<?php require_once './inc/header.php' ?>
<?php require_once './inc/loggedinNav.php' ?>
    <div class="col-12">
      <div class="row">
        <?php require_once './inc/sidebar.php' ?>
        <div class="col-9">
          <div class="display-4 text-center">
            Personal Information
          </div>
          <div class="col-11 mx-auto border-top shadow p-5">
            <div class="row pt-3">
              <div class="col-6 border  text-center p-4">
                <h5 class="border-bottom pb-3" >Full Name</h1>
                <div><?php echo $data['fname']; ?></div>
              </div>
              <div class="col-6 border  text-center p-4">
                <h5 class="border-bottom pb-3" >Age</h1>
                <div><?php echo $data['age'] ?></div>
              </div>
              <div class="col-6 border  text-center p-4">
                <h5 class="border-bottom pb-3" >Date of Birth</h1>
                <div><?php echo $data['date_of_birth'] ?></div>
              </div>
              <div class="col-6 border  text-center p-4">
                <h5 class="border-bottom pb-3" >Contact Number</h1>
                <div><?php echo $data['contact_number'] ?></div>
              </div>
              <div class="col-12 border  text-center p-4">
                <h5 class="border-bottom pb-3" >Address</h1>
                <div><?php echo $data['address'] ?> </div>
              </div>

              <div class="col-6 border  text-center p-4">
                <h5 class="border-bottom pb-3" >CNIC</h1>
                <div><?php echo $data['cnic'] ?></div>
              </div>
              <div class="col-6 border  text-center p-4">
                <h5 class="border-bottom pb-3" >Domicile</h1>
                <div><?php echo $data['domicile'] ?></div>
              </div>
              <div class="col-6 border  text-center p-4">
                <h5 class="border-bottom pb-3" >Father Name</h1>
                <div><?php echo $data['father_name'] ?></div>
              </div>
              <div class="col-6 border  text-center p-4">
                <h5 class="border-bottom pb-3" >Father Occupation</h1>
                <div><?php echo $data['father_occupation'] ?></div>
              </div>
              <div class="col-6 border  text-center p-4">
                <h5 class="border-bottom pb-3" >Father CNIC</h1>
                <div><?php echo $data['father_cnic'] ?></div>
              </div>
              <div class="col-6 border  text-center p-4">
                <h5 class="border-bottom pb-3" >Annual Income</h1>
                <div><?php echo $data['annual_income'] ?> PKR</div>
              </div>
              <div class="col-6 border  text-center p-4">
                <h5 class="border-bottom pb-3" >Marks In Matric</h1>
                <div><?php echo $data['marks_matric'] ?>/<?php echo $data['total_matric'] ?></div>
              </div>
              <div class="col-6 border  text-center p-4">
                <h5 class="border-bottom pb-3" >Percentage</h1>
                <div><?php echo round(($data['marks_matric']/$data['total_matric'])*100 )?>%</div>
              </div>
              <div class="col-12 border  text-center p-4">
                <h5 class="border-bottom pb-3" >School Name</h1>
                <div><?php echo $data['school_name'] ?></div>
              </div>
              <div class="col-6 border  text-center p-4">
                <h5 class="border-bottom pb-3" >Marks In Intermediate</h1>
                <div><?php echo $data['marks_intermediate'] ?>/<?php echo $data['total_intermediate'] ?></div>
              </div>
              <div class="col-6 border  text-center p-4">
                <h5 class="border-bottom pb-3" >Percentage</h1>
                <div><?php echo round(($data['marks_intermediate']/$data['total_intermediate'])*100 )?>%</div>
              </div>
              <div class="col-12 border  text-center p-4">
                <h5 class="border-bottom pb-3" >College Name</h1>
                <div><?php echo $data['college_name'] ?></div>
              </div>
             
            </div>
          </div>
          <div class="text-center my-3">
            Something wrong?
            <a href="./updateStudent.php?id=<?php echo $id ?>" class="text-primary" >Update your Infomation</a>
          </div>
        </div>
        </div>
      </div>
<?php include './inc/loggedinFooter.php' ?>
  