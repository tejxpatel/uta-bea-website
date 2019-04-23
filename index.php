<?php
require_once './mod/core/connect-to-db.php';

$q = 'SELECT * FROM `ondzeuta_bea`.`event`';
$db = pdoConnect();
try {
  $db->query($q);
}catch (Exception $e) {
  var_dump($e);
}
?><!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<title>BEA UTA Home</title>

<?php require_once "php-include/head.php"; ?>

</head>

<body>

<div class="container-fluid">



<!-- ==================== TOP HEADER + NAVIGATION BAR ==================== -->

<?php require_once "php-include/header.php"; ?>




<!-- ==================== HERO HEADER ==================== -->


<div class="parallax-container home-hero" data-parallax="scroll" data-bleed="10" data-image-src="img/home-page/home-header.jpg">

<h1 class="parallax-text">Welcome to the UTA Chapter of the Broadcast Education Association!</h1>

</div>




<!-- ==================== MAIN CONTENT ==================== -->

<!-- =========== WHO WE ARE SECTION =============== -->
<div class="page-padding">
<h2 class="center-text">WHO ARE WE</h2>

<br>


<div class="container center-text who-we-are">

  <div class="row center-text">

  
    <div class="col-sm center-text">
    <i class="fas fa-flag"></i>

      <h3>Mission</h3>
      <p>

      The UTA Chapter of the Broadcast Education Association goal is to provide UTA students that are majoring in broadcasting with information on industry knowledge, intern opportunities, events, and social networking.

      </p>
    </div>
    <div class="col-sm center-text">

   <i class="fas fa-video"></i> 

    <h3>Members</h3>

    <p>
    We offer excellent leadership and  wonderful opportunities for students interested in a career in broadcasting. 




</p>
    </div>
    <div class="col-sm center-text">
    <i class="fas fa-users"></i>

    <h3>Get Involved</h3>

    <p>

   MAVS BEA Chapter is open to all students. The Broadcasting Education Association is a nationwide organization and the cost to join is  $10 annually.


</p>

    </div>
  </div>
</div>

</div>


<!-- =========== PARALLAX SECTION =============== -->


<div class="parallax-container" data-parallax="scroll" data-bleed="10" data-image-src="img/temp.jpg"></div>

<!-- =========== WHAT WE DO SECTION =============== -->





  <div class="row">
    <div class="col">
      <h2>WHAT WE DO</h2>
      <p>
BEA is the premiere international academic media organization, driving insights, excellence in media production, and career advancement for educators, students, and professionals. The association’s publications, annual convention, web-based programs, and regional district activities provide opportunities for juried production competition and presentation of current scholarly research related to aspects of the electronic media. These areas include media audiences, economics, law and policy, regulation, news, management, aesthetics, social effects, history, and criticism, among others.BEA is concerned with electronic media curricula, placing an emphasis on interactions among the purposes, developments, and practices of the industry and imparting this information to future professionals.  BEA serves as a forum for exposition, analysis and debate of issues of social importance to develop members’ awareness and sensitivity to these issues and to their ramifications, which will ultimately help students develop as more thoughtful practitioners.
</p>


    </div>
    <div class="col">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/home-page/18422432_217182558797808_3112332205953372463_o.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/home-page/18422432_217182558797808_3112332205953372463_o.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/home-page/18422432_217182558797808_3112332205953372463_o.jpg" class="d-block w-100" alt="...">
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
  </div>
</div>




<!-- =========== PARALLAX SECTION =============== -->



<div class="parallax-container" data-parallax="scroll" data-bleed="10" data-image-src="img/temp.jpg"></div>


</div>

<!-- ==================== FOOTER ==================== -->

<?php 

require_once "php-include/footer.php";
require_once "js/js.php";

 ?>

</body>


</html>
