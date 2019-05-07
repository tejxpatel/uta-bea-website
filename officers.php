<?php
session_start();
require_once 'mod/core/connect-to-db.php';

$get_staff_pres = "SELECT user_id, first_name, last_name, title, image FROM ondzeuta_bea.user WHERE (title LIKE '%President%' || title LIKE '%Advisor%') AND deleted IS NULL;";
$get_offiers = "SELECT user_id, first_name, last_name, title, image FROM ondzeuta_bea.user WHERE (title NOT LIKE '%President%' AND title NOT LIKE '%Advisor%') AND deleted IS NULL;";

$db = pdoConnect();

?><!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<title>Officers</title>

<?php require_once "php-include/head.php"; ?>

</head>


<!-- ============================================= BODY START =========================================== -->

<body>

<div class="container-fluid">



<!-- ==================== TOP HEADER + NAVIGATION BAR ==================== -->

<?php require_once "php-include/header.php"; ?>




<!-- ==================== HERO HEADER ==================== -->


<div class="parallax-container home-hero" data-parallax="scroll" data-bleed="10" data-image-src="https://images.pexels.com/photos/257904/pexels-photo-257904.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">

<h1 class="parallax-text officer-hero-header">Our Officers</h1>

</div>



<!-- ==================== MAIN CONTENT ==================== -->
<!-- ====================================================== -->


<div class="container page-padding">


<h1> Staff & President</h1>
<br><br><br><br>
<div class="container-fluid mb-5">
  <div class="row">
    <!-- Team Member 1 -->
    <?php foreach ($db->query($get_staff_pres) as $row) { ?>
    <div class="col-12 col-md-6 col-xl-3  mb-3">
      <div class="card-header bg-primary text-center text-warning"><h4></h4></div>
      <div class="card border-0 shadow">
        <?php if (!empty($row['image'])){ ?>
        <img src="img/user/<?php echo $row['image']; ?>" class="card-img-top" alt="...">
        <?php } else { ?>
        <img src="img/user/user.jpg" class="card-img-top" alt="...">
        <?php } ?>
        <div class="card-body text-center">
          <h5 class="card-title mb-0"><?php echo $row['first_name'],' ',$row['last_name']; ?></h5>
          <div class="card-text text-black-50"><?php echo $row['title']; ?></div>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
  <!-- /.row -->

</div>
<!-- /.container -->

<h1> STUDENT OFFICERS</h1>

<!-- Page Content -->
<div class="container-fluid">
  <div class="row">
    <!-- Team Member 1 -->
    <?php foreach ($db->query($get_offiers) as $row) { ?>
    <div class="col-12 col-md-6 col-xl-3  mb-3">
      <div class="card-header bg-primary text-center text-warning"><h4></h4></div>
      <div class="card border-0 shadow">
        <?php if (!empty($row['image'])){ ?>
        <img src="img/user/<?php echo $row['image']; ?>" class="card-img-top" alt="...">
        <?php } else { ?>
        <img src="img/user/user.jpg" class="card-img-top" alt="...">
        <?php } ?>
        <div class="card-body text-center">
          <h5 class="card-title mb-0"><?php echo $row['first_name'],' ',$row['last_name']; ?></h5>
          <div class="card-text text-black-50"><?php echo $row['title']; ?></div>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
  <!-- /.row -->

</div>
<!-- /.container -->
 </div>

<!-- =========== PARALLAX SECTION =============== -->


<div class="parallax-container" data-parallax="scroll" data-bleed="10" data-image-src="img/temp.jpg"></div>


<!-- ==================== FOOTER ==================== -->

<?php 

require_once "php-include/footer.php";
require_once "js/js.php";

 ?>


</body>


</html>
