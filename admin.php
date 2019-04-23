<?php
require_once 'mod/core/req_auth.php';

//var_dump($_SESSION);
//$animate_css = 1;
?><!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Jefferson Ondze Mangha">
	<title>Page title</title>
	<?php require_once 'css/css.php'; ?>
</head>
<body>
	<div class="container-fluid">
		<?php require_once 'mod/template/admin-nav.php'; ?>
		<div class="row p-2">
			<div class="col-12">
				<div class="card mb-3">
				  <div class="card-header bg-primary text-white">Officers</div>
				  <div class="card-body max-height p-0">
				  	<div class="row p-0">
				  		<div class="col-xs-12 col-md-6">
				  			<div class="card-body">
						  	<div class="card" style="width: 18rem;">
							  <img class="card-img-top" src="./img/user/user.jpg" alt="Card image cap">
							  <div class="card-body">
							    <h5 class="card-title">Card title</h5>
							    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							    <a href="#" class="btn btn-warning">Edit</a>
							    <a href="#" class="btn btn-danger">Delete</a>
							  </div>
							</div>
						  </div>
				  		</div>
				  	</div>
				  </div>
				</div>
			</div>

			<div class="col-12 col-lg-6">
				<div class="card mb-3">
				  <div class="card-header bg-primary text-white">Events</div>
				  <div class="card-body max-height p-0">
				  	<div class="row p-0">
				  		<div class="col-xs-12 col-md-6">
				  			<div class="card-body">
						  	<div class="card" style="width: 18rem;">
							  <img class="card-img-top" src="./img/user/user.jpg" alt="Card image cap">
							  <div class="card-body">
							    <h5 class="card-title">Card title</h5>
							    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							    <a href="#" class="btn btn-warning">Edit</a>
							    <a href="#" class="btn btn-danger">Delete</a>
							  </div>
							</div>
						  </div>
				  		</div>
				  	</div>
				  </div>
				</div>
			</div>

			<div class="col-12 col-lg-6">
				<div class="card mb-3">
				  <div class="card-header bg-primary text-white">Meetings</div>
				  <div class="card-body max-height p-0">
				  	<div class="row p-0">
				  		<div class="col-xs-12 col-md-6">
				  			<div class="card-body">
						  	<div class="card" style="width: 18rem;">
							  <div class="card-body">
							    <h5 class="card-title">Card title</h5>
							    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							    <a href="#" class="btn btn-warning">Edit</a>
							    <a href="#" class="btn btn-danger">Delete</a>
							  </div>
							</div>
						  </div>
				  		</div>
				  	</div>
				  </div>
				</div>
			</div>
		</div>



		<?php require_once 'php-include/footer.php'; ?>
	</div>
<?php require_once 'js/js.php'; ?>
</body>
</html>
