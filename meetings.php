<?php
session_start();

require_once 'mod/core/connect-to-db.php';

$get_meetings = "SELECT * FROM ondzeuta_bea.event WHERE type = 'meeting' AND deleted IS NULL AND date >= NOW();";

$db = pdoConnect();


?><!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<title>Meetings</title>


<?php require_once "css/css.php"; ?>


</head>

<body>

<div class="container-fluid">
 

<!-- ==================== TOP HEADER + NAVIGATION BAR ==================== -->

<?php require_once "php-include/header.php"; ?>


<!-- ==================== HERO HEADER ==================== -->

<div class="jumbotron jumbotron-fluid meetings-jumbotron">
  <div class="container">
    <h1 class="jumbotron-text">MEETINGS</h1>
  </div>
</div>



<!-- ==================== MAIN CONTENT ==================== -->

<div class="container meeting-agenda page-padding">
	<div class="row">
		<?php foreach ($db->query($get_meetings) as $row){ ?>
		<div class="col-12">
			<?php if (!empty($row['image'])){ ?>
			<img src="img/events/<?php echo $row['image']; ?>" alt="<?php $row['title']; ?> Image" class="img-thumbnail img-responsive" />
			<?php } else { ?>
			<img src="img/events/header.jpg" alt="<?php $row['title']; ?> Image" class="img-thumbnail img-responsive" />
			<?php } ?>
			<h1><?php echo $row['title']; ?></h1>
			<h2><?php echo Date('M d, Y', strtotime($row['date'])); ?> From <small><?php echo $row['time']; ?></small></h2>
			<p class="lead"><?php echo $row['description']; ?></p>
		</div>
		<?php } ?>
		<?php if (count($db->query($get_meetings)) <= 0){ ?>
		<div class="col-12">
			<h1 class="display-1">No upcoming meetings, please come back later</h1>
		</div>
		<?php } ?>
	</div>
</div>
<!-- ===== MAIN CONTENT ===== -->


<!-- ==================== FOOTER ==================== -->

<?php 

require_once "php-include/footer.php";
require_once "js/js.php";
 ?>


</body>


</html>
