<?php
//require_once '../core/req_auth.php';
?>
<nav class="container-fluid navbar navbar-expand-sm navbar-dark bg-primary shadow-none">
	<a class="navbar-brand pl-0 ml-0" href="../login.php" id="level5">Level5</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavCollapse" aria-controls="mainNavCollapse" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="mainNavCollapse">
		<ul class="nav justify-content-end">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle p-0" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php
					if (file_exists('../../img/user/'.$_SESSION['first_name'].'_'.str_replace(' ','_',$_SESSION['last_name']).'.jpg')) {
						echo '<img src="../../img/user/',$_SESSION['first_name'],'_',str_replace(' ','_',$_SESSION['last_name']),'.jpg" width="30" height="30" alt="',$_SESSION['first_name'],' ',$_SESSION['last_name'],'" class="rounded-circle border">';
					} else {
						echo '<img src="../../img/user/user.jpg" width="30" height="30" alt="User" class="rounded-circle border">';
					}
				?></a>
				<div class="dropdown-menu dropdown-menu-right">
					<span class="dropdown-item-text"><small>Signed in as</small></span>
					<span class="dropdown-item-text text-nowrap"><strong><?php echo $_SESSION['first_name'],' ',$_SESSION['last_name']; ?></strong></span>
					<?php if ($_SESSION['group_id'] <= 6) { // referral partner and up?>
						<div class="dropdown-divider"></div>
						<?php if ($_SESSION['group_id'] <= 5) { // advisor and up ?>
						<a href="../5/directory.php" class="dropdown-item">Directory</a>
						<?php } ?>
						<a href="../5/marketing.php" class="dropdown-item">Marketing</a>
						<a href="../tool/" class="dropdown-item">Tools</a>
						<a href="../tool/search.php" class="dropdown-item">Search</a>
					<?php } ?>
					<div class="dropdown-divider"></div>
					<a href="../user/settings.php" class="dropdown-item">Settings</a>
					<a href="../logout.php" class="dropdown-item">Logout</a>
				</div>
			</li>
		</ul>
	</div>
</nav>
<?php
// navbar alert function
// outputs bootstrap alert
function displayAlert($message, $class, $dismissible_off, $autohide_off) {
	// by default an alert is alert-info, alert-dismissible, and alert-autohide
	if(empty($class)) { $class = 'info'; }
	if(empty($autohide_off)) {
		$class .= ' fade-away';
	}
	echo '<div class="alert alert-'.$class.' alert-dismissible';
		if (empty($autohide_off)) {
			echo ' alert-autohide';
		}
		echo '" role="alert">';
		if (empty($dismissible_off)) {
			echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span>&times;</span></button>';
		}
		echo $message;
	echo '</div>';
}

// example alert setting
	// $_SESSION['alert'][]= array('message' => 'Your new something was updated');
	// $_SESSION['alert'][]= array('message' => 'Your new green alert is not dismissable', 'dismissible_off' => 1, 'class' => 'success');
	// $_SESSION['alert'][]= array('message' => 'Your new something had an error', 'class' => 'danger', 'dismissible_off' => 1, 'autohide_off' => 1);
	// $_SESSION['alert'][]= array('message' => 'Your new cant dismiss this be warned', 'class' => 'warning', 'dismissible_off' => 0, 'autohide_off' => 1);


// open main page container function
function mainOpen() {
	// open container
	echo '<main class="container-fluid mt-3">';
	// output any alerts
	if (isset($_SESSION['alert']) && is_array($_SESSION['alert']) && count($_SESSION['alert']) > 0) {
		echo '<div class="row"><div class="col-12">';
		foreach ($_SESSION['alert'] as $a) {
			displayAlert($a['message'], $a['class'], $a['dismissible_off'], $a['autohide_off']);
		}
		unset($_SESSION['alert']);
		echo '</div></div>';
	}
	// turns off session
	// session_write_close();
}

// open now unless expressly told not to
if (!isset($nav_no_main_open) || $nav_no_main_open !== 1) {
	mainOpen();
	unset($nav_no_main_open);
}
unset($num_expired_deals);
?>