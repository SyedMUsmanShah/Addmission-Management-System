<?php
session_start();
?>

<?php require_once './inc/header.php' ?>
  <?php
  if(!isset($_SESSION['id'])){
    require_once './inc/navbar.php';
  }else{
    require_once './inc/loggedinNav.php';
  }
   ?>
  <div class="col-12 px-5 mx-auto bg-primary">

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="./images/slider-demo.png" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="./images/bus_banner.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="./images/erozgaar.png" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>

  <div class="col-12 bg-light my-4 py-3">
    <div class="col-10 mx-auto">
      <div class="row">
        <div class="col-3 shadow p-4 scale">
          <span class="fa fa-building fa-3x blue-color"></span>
          <span class="blue-color vertical-center font-24 font-weight-bold ml-3">Affiliations</span>
        </div>
        <div class="col-3 shadow p-4 scale">
          <span class="fa fa-file fa-3x blue-color"></span>
          <span class="blue-color vertical-center font-22 font-weight-bold ml-3">Online Challan</span>
        </div>
        <div class="col-3 shadow p-4 scale">
          <span class="fa fa-cloud-arrow-up fa-3x blue-color"></span>
          <span class="blue-color vertical-center font-22 font-weight-bold ml-3">Downloads</span>
        </div>
        <div class="col-3 shadow p-4 scale">
          <span class="fa fa-bus fa-3x blue-color"></span>
          <span class="blue-color vertical-center font-22 font-weight-bold ml-3">Transport</span>
        </div>
      </div>
    </div>
  </div>

  <div class="col-12"
    style="background-image: url(https://su.edu.pk/images/bg/dots-background-2.png);background-repeat: no-repeat;background-position: bottom center;">
    <div class="col-8 mx-auto">
      <div class="font-46 font-weight-bold blue-color text-center">
        FACULTIES
      </div>
      <p class="text-center">UOS proudly offers Degree programs in seven Faculties to cope with the academic needs as
        well as the economic growth of the country.</p>
    </div>
    <div class="owl-carousel owl-theme col-10 mx-auto">
      <div class="item"><img src="./images/1.png" alt=""></div>
      <div class="item"><img src="./images/3.png" alt=""></div>
      <div class="item"><img src="./images/4.png" alt=""></div>
      <div class="item"><img src="./images/5.png" alt=""></div>
      <div class="item"><img src="./images/6.png" alt=""></div>
      <div class="item"><img src="./images/7.png" alt=""></div>
    </div>
  </div>


  <?php require_once './inc/footer.php' ?>
</body>

</html>