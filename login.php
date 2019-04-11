<?php
date_default_timezone_set("America/Chicago");

// Start the session
session_start();

// Are you already logged in?
// if (isset($_SESSION['user_id']) && isset($_SESSION['group_id']) && isset($_SESSION['username']) && isset($_SESSION['email']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name']) && isset($_SESSION['theme']) && $_SESSION['auth']==1) {
// 	header ('Location: /');
// }

// Generate an auth token, store it in current session
$_SESSION['form_token'] = $form_token = md5(uniqid('auth', true));

// Fetch return URL
$_SESSION['return_url'] = filter_var($_GET['r'], FILTER_SANITIZE_STRING);

// randomize bg color
$bg = array('0C0CF6', '8A8A8A', '3C5ECC', 'E7363E', '682781', '00C937', 'FB7E00', '222222');
$bg = $bg[array_rand($bg)];

$logo = 'img/team/team-logo/color-png.png';

$error_list = array(
	 'invalid' => array(
	 	'text' =>'<strong>Holy Guacamole!</strong> You entered an invalid email or password!',
		'status' => 'danger'
	)
	,'incomplete' => array(
		'text' =>'<strong>Incomplete!</strong> Please fill out all the required fields.',
		'status' => 'danger'
	)
	,'auth' => array(
		'text' =>'<strong>Unauthorized!</strong> You have been logged out. Please try again or contact support.',
		'status' => 'danger'
	)
	, 'password_changed' => array(
		'text' =>'<strong>Password successfully changed!</strong>',
		'status' => 'success fade-away'
	)
);
?><!doctype html>
<html lang="en">
<head>
	<title>Login Page</title>
	<style type="text/css">
		body { background-color:#<?php echo $bg ?>; }
	</style>
</head>
<body>
<div class="container mt-5 py-5">
	<?php if(!empty($_GET['e']) && isset($error_list[$_GET['e']])): ?>
		<div class="alert alert-<?php print_r($error_list[$_GET['e']]['status']); ?> alert-dismissible" role="alert">
			<?php print_r($error_list[$_GET['e']]['text']); ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php endif; ?>
	<?php
		if (isset($_SESSION['alert'])) {
			if ($_SESSION['alert'] == 'email_sent') {
				echo '<div class="row"><div class="col-12">';
					echo '<div class="alert alert-info alert-dismissible fade-away" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Sent! Please check your email.</strong></div>';
				echo '</div></div>';
			}
			unset($_SESSION['alert']);
		}
	?>
	<div class="text-center">
		<a href="/"><img src="<?php echo $logo; ?>" alt="BEA LOGO" width="99" height="80"></a>
	</div>
	<form role="form" action="../mod/core/auth.php" class="form auth_form" method="post" >
		<div class="form-group">
			<input type="hidden" name="form_token" value="<?php echo $form_token; ?>" hidden>
			<input type="hidden" name="http_referer" value="<? echo $http_referer; ?>" hidden>
		</div>

		<div class="form-group">
			<label for="login_name" class="sr-only">Username or Email</label>
			<input type="text" name="login_name" id="login_name" class="form-control" placeholder="Username or Email" minlength="6" maxlength="100" required autofocus>
		</div>

		<div class="form-group">
			<label for="password" class="sr-only">Password</label>
			<input type="password" id="password" name="password" class="form-control" placeholder="Password"  minlength="6" maxlength="100" required>
		</div>

		<div class="form-group">
			<button class="btn btn-primary btn-block" type="submit">Sign in</button>
		</div>
	</form>
	<div class="text-center auth_btn mb-3">
		<a href="/" class="btn btn-sm btn-outline-light justify-content-start">Go to Homepage</a>
		<a href="reset.php" class="btn btn-sm btn-outline-light">Reset Password</a>
	</div>
	<div class="text-center">
		<small class="text-light">
			&copy; <?php echo date('Y'); ?> BEA
		</small>
	</div>
</div>
<?php require_once 'js/js.php'; ?>
<script>
	window.onload = setTimeout(function(){ $(".fade-away").fadeOut(); }, 3000);
</script>
</body>
</html>