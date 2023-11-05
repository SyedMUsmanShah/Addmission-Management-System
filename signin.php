<?php
session_start();
if(isset($_SESSION['id'])){
  header("location:index.php");
}
?>
<?php require_once './inc/connection.php' ?>
<?php
if (isset($_POST['submit'])) {
  $uname = $_POST['uname'];
  $password = $_POST['password'];
  $signSql = "SELECT * FROM students WHERE uname = '$uname' AND `password` = '$password'";
  $result = mysqli_query($connection, $signSql);
  if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    $_SESSION["id"] = $user['id']; // Assuming the column name in the students table is 'id'
    // Redirect to a new page or perform any additional actions after successful sign-in
    header("Location: index.php");
  } else {
    echo "Wrong Credientials";
  }
}
?>
<?php require_once './inc/header.php' ?>

<?php require_once './inc/navbar.php' ?>
<div class="col-7 mx-auto shadow my-5 p-5" style="background-color: black;">
  <div class="display-4 text-center text-white">
    Sign In
  </div>
  <form action="" method="post">
    <div class="form-group">
      <label for="" class="text-white">User Name</label>
      <input type="text" name="uname" id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>
    <div class="form-group">
      <label for="" class="text-white">Password</label>
      <input type="password" class="form-control" name="password" id="" placeholder="">
    </div>
    <div class="mb-3">
      <span class="text-info">Not a memeber yet? <a href="./register.php" class="text-danger">Register Now</a></span>
    </div>
    <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
  </form>
</div>
<?php include './inc/footer.php' ?>