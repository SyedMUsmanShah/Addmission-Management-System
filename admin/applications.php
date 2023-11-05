<?php

require_once './inc/sqlfunctions.php';

session_start();

if (!isset($_SESSION['loggedIn'])) {
  header("location:signin.php");
}

  $applications = "SELECT * FROM applications WHERE status = 'pending'";
  $result = mysqli_query($connection, $applications);

  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
      $data[] = $row;
    }
}

?>
<?php require_once './inc/header.php' ?>
<?php require_once './inc/navbar.php' ?>
<?php require_once './inc/sidebar.php' ?>
<div class="content-wrapper">
  <!-- Main content -->
  <div class="col-12">
    <div class="container py-4">
      <table class="table table-light">
        <thead class="thead-dark">
          <tr>
            <th class="font-12">id</th>
            <th class="font-12">Applicant Name</th>
            <th class="font-12">Applicat CNIC</th>
            <th class="font-12">Applicat Contact Number</th>
            <th class="font-12">Matric Marks</th>
            <th class="font-12">Intermediate Marks</th>
            <th class="font-12">Applied Course</th>
            <th class="font-12">Application Status</th>
            <th class="font-12 text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (!empty($data)) {
            foreach ($data as $applications) {
          ?>
              <tr>
                <td class="font-12"><?php echo $applications["id"] ?></td>
                <td class="font-12"><?php echo $applications["name"] ?></td>
                <td class="font-12"><?php echo $applications["cnic"] ?></td>
                <td class="font-12"><?php echo $applications["contact_number"] ?></td>
                <td class="font-12"><?php echo $applications["matric_marks"] ?> (<?php echo round(($applications["matric_marks"]/1100)*100); ?>%)</td>
                <td class="font-12"><?php echo $applications["inter_marks"] ?> (<?php echo round(($applications["inter_marks"]/1100)*100); ?>%)</td>
                <td class="font-12"><?php echo $applications["applied_subject"] ?></td>
                <td class="font-12 text-danger"><?php echo $applications["status"] ?></td>
                <td class="font-12 text-center"><a href="approve.php?id=<?php echo $applications["id"] ?>" class="btn btn-success font-12 mx-2">Approve</a><a href="reject.php?id=<?php echo $applications["id"] ?>" class="btn btn-danger font-12 mx-2">Reject</a></td>
              </tr>
          <?php
            }
          } else {
            echo "<h1>No applications Available Here..!</h1>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- /.content -->
</div>

<?php require_once './inc/footer.php' ?>
