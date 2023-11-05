<?php

require_once './inc/sqlfunctions.php';

session_start();

if (!isset($_SESSION['loggedIn'])) {
  header("location:signin.php");
}

// students

$members = "SELECT COUNT(*) AS members FROM students";
$members_result = mysqli_query($connection, $members);

if (!$members_result) {
    die('Query error: ' . mysqli_error($connection));
}

$members_row = mysqli_fetch_assoc($members_result);
$total_members = $members_row['members'];

// Applications

$application = "SELECT COUNT(*) AS application FROM applications WHERE status = 'pending'";
$application_result = mysqli_query($connection, $application);

if (!$application_result) {
    die('Query error: ' . mysqli_error($connection));
}

$application_row = mysqli_fetch_assoc($application_result);
$total_application = $application_row['application'];

// Applications

$pending_application = "SELECT COUNT(*) AS pending_application FROM applications WHERE status = 'rejected'";
$pending_application_result = mysqli_query($connection, $pending_application);

if (!$pending_application_result) {
    die('Query error: ' . mysqli_error($connection));
}

$pending_application_row = mysqli_fetch_assoc($pending_application_result);
$total_pending_application = $pending_application_row['pending_application'];

// Applications

$approved_application = "SELECT COUNT(*) AS approved_application FROM applications  WHERE status = 'approved'";
$approved_application_result = mysqli_query($connection, $approved_application);

if (!$approved_application_result) {
    die('Query error: ' . mysqli_error($connection));
}

$approved_application_row = mysqli_fetch_assoc($approved_application_result);
$total_approved_application = $approved_application_row['approved_application'];

?>
<?php require_once './inc/header.php' ?>
<?php require_once './inc/navbar.php' ?>
<?php require_once './inc/sidebar.php' ?>
<div class="content-wrapper">
  <!-- Main content -->
  <div class="col-12">
  <div class="container py-4">
      <div class="">
        <div class="row col-12 m-0 p-2">
          <div class="card p-2 m-2 col-sm-6 col-md-4" style="background-color: aquamarine;">
            <a class="card-block stretched-link text-decoration-none text-dark" href="members.php">
              <h2 class="card-title">Registered Students</h2>
              <div class="card-body">
                <h1 class="mt-4"><span class="mr-3"><?php echo $total_members; ?></span><span><i class="fa fa-user"></i></span></h1>
              </div>
            </a>
          </div>
          <div class="card p-2 m-2 col-sm-6 col-md-4" style="background-color: #81dee7;">
            <a class="card-block stretched-link text-decoration-none text-dark" href="applications.php">
              <h2 class="card-title">Pending Applications</h2>
              <div class="card-body">
                <h1 class="mt-4"><span class="mr-3"><?php echo $total_application; ?></span><span><i class="fa fa-address-card"></i></span></h1>
              </div>
            </a>
          </div>
          <div class="card p-2 m-2 col-sm-6 col-md-4" style="background-color: #ff5757;">
            <a class="card-block stretched-link text-decoration-none text-dark" href="rejectedApplications.php">
              <h2 class="card-title">Rejected Applications</h2>
              <div class="card-body">
                <h1 class="mt-4"><span class="mr-3"><?php echo $total_pending_application; ?></span><span><i class="fa fa-address-card"></i></span></h1>
              </div>
            </a>
          </div>
          <div class="card p-2 m-2 col-sm-6 col-md-4" style="background-color: #46ff3a;">
            <a class="card-block stretched-link text-decoration-none text-dark" href="approvedApplications.php">
              <h2 class="card-title">Approved Applications</h2>
              <div class="card-body">
                <h1 class="mt-4"><span class="mr-3"><?php echo $total_approved_application; ?></span><span><i class="fa fa-address-card"></i></span></h1>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- /.content -->
</div>

<?php require_once './inc/footer.php' ?>
