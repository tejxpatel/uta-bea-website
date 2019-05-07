<?php
session_start();
require_once 'mod/core/connect-to-db.php';

$get_staff_pres = "SELECT user_id, first_name, last_name, title, image FROM ondzeuta_bea.user WHERE (title = 'President' || title = 'Advisor') AND deleted IS NULL;";
$get_offiers = "SELECT user_id, first_name, last_name, title, image FROM ondzeuta_bea.user WHERE (title != 'President' AND title != 'Advisor' AND title != 'Admin') AND deleted IS NULL;";

$db = pdoConnect();

?><!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<?php require_once "php-include/head.php"; ?>
<title>Officers</title>



</head>


<!-- ============================================= BODY START =========================================== -->

<body>

<div class="container-fluid">



<!-- ==================== TOP HEADER + NAVIGATION BAR ==================== -->

<?php require_once "php-include/header.php"; ?>




<!-- ==================== HERO HEADER ==================== -->


<div class="jumbotron jumbotron-fluid officers-jumbotron">
  <div class="container">
    <h1 class="jumbotron-text">OFFICERS</h1>
  </div>
</div>



<!-- ==================== MAIN CONTENT ==================== -->
<!-- ====================================================== -->


<div class="container">


<h1 class="py-3"> Staff & President</h1>
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

<h1 class="py-3"> Student Officers</h1>

<!-- Page Content -->
<div class="container py-5">
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

<!-- ==================== FOOTER ==================== -->

<?php 

require_once "php-include/footer.php";
require_once "js/js.php";

 ?>


</body>


</html>
