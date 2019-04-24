<?php
$eventsContents = file_get_contents('./mod/mock-events.json');
$events = json_decode($eventsContents);


?><!DOCTYPE html>
<html>
<!-- ==================== HEAD ==================== -->
<head>

<meta charset="utf-8">
<title>Events</title>

<?php require_once "php-include/head.php"; ?>

</head>


<!-- ============================================= BODY START =========================================== -->

<body>

<div class="container-fluid">



<!-- ==================== TOP HEADER + NAVIGATION BAR ==================== -->

<?php require_once "php-include/header.php"; ?>




<!-- ==================== HERO HEADER ==================== -->


<div class="parallax-container" data-parallax="scroll" data-bleed="10" data-image-src="img/events-page/hero-header.jpeg">

<h1 class="parallax-text">Upcoming Events</h1>

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


<div class="parallax-container" data-parallax="scroll" data-bleed="10" data-image-src="img/temp.jpg"></div>




<!-- ==================== FOOTER ==================== -->

<?php 

require_once "php-include/footer.php";

require_once "js/js.php";

?>

</body>


</html>
