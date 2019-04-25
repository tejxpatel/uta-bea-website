<?php
$eventsContents = file_get_contents('./mod/mock-events.json');
$events = json_decode($eventsContents);


?><!DOCTYPE html>
<html>
<!-- ==================== HEAD ==================== -->
<head>

<meta charset="utf-8">
<title>Events</title>


<?php require_once "css/css.php"; ?>

</head>


<!-- ============================================= BODY START =========================================== -->

<body>

<div class="container-fluid">



<!-- ==================== TOP HEADER + NAVIGATION BAR ==================== -->

<?php require_once "php-include/header.php"; ?>




<!-- ==================== HERO HEADER ==================== -->

<div class="jumbotron jumbotron-fluid events-jumbotron">
  <div class="container">
    <h1 class="jumbotron-text">EVENTS</h1>
  </div>
</div>



<!-- ==================== MAIN CONTENT ==================== -->
<!-- ====================================================== -->

<div class="container page-padding"> 

<?php foreach($events->events as $event){?>

	<div class="blog-post">
        <h2 class="blog-post-title"><?php echo strtoupper($event->title); ?></h2>
        <p class="blog-post-meta"><strong>Date: </strong><?php echo strtoupper($event->date); ?>, <small><?php echo strtoupper($event->time); ?></small></p>
        <p class="blog-post-meta"><strong>Location: </strong><?php echo strtoupper($event->location); ?></p>
        <p><?php echo strtoupper($event->description); ?></p>
	</div>

<?php } ?>


</div>

<!-- =========== PARALLAX SECTION =============== -->





<!-- ==================== FOOTER ==================== -->

<?php 

require_once "php-include/footer.php";
require_once "js/js.php";

?>

</body>


</html>
