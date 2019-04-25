<?php

if (isset($no_auth_required) && $no_auth_required == 1) {
	# INI_SETs
	ini_set('session.gc_maxlifetime', 3600); // 1 Hour
	ini_set('session.cookie_lifetime', 3600); // 1 Hour

	# Set timezone
	date_default_timezone_set("America/Chicago");

	# Start the session
	session_start();
	$_SESSION['datetime'] = date('Y-m-d H:i:s');
	$_SESSION['user_id'] = 0;
	$_SESSION['auth'] = 0;

} else {

	# INI_SETs
	ini_set('session.gc_maxlifetime', 28800); // 8 Hours
	ini_set('session.cookie_lifetime', 28800); // 8 Hours

	# Set timezone
	date_default_timezone_set('America/Chicago');

	# Start the session

	session_start();

	# Did you timeout?
		// if (isset($_SESSION['LAST_ACTIVITY']) && ($_SERVER['REQUEST_TIME'] - $_SESSION['LAST_ACTIVITY']) > 14400) {
		// 	session_unset();
		// 	session_destroy();
		// 	session_start();
		// }
	$_SESSION['LAST_ACTIVITY'] = $_SERVER['REQUEST_TIME'];

	# Are you authorized?
	if (isset($_SESSION['user_id']) && isset($_SESSION['group_id']) && isset($_SESSION['user_name']) && isset($_SESSION['email']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name']) && $_SESSION['auth'] === 1) {

		// Are you allowed to view this page?
		if (
			# 1. Do you meet the minimum group level?
		(isset($max_group) && $max_group < $_SESSION['group_id'])
				// lower group_id value means greater access
				// user's group_id cannot be greater than max_group

			# 2. Are you in a specifically blocked group?
		|| (isset($blocked_groups) && in_array($_SESSION['group_id'], $blocked_groups))

			# 3. Are YOU specifically blocked??
		|| (isset($blocked_users) && in_array($_SESSION['user_id'], $blocked_users))) {
			# No auth, GTFO!
			session_unset();
			session_destroy();
			header('Location: ./login.php?e=auth');
			exit;
		}

	} else {
		# Not logged in
		header('Location: ./login.php?e=login_required&r=' . str_replace('&', '@', $_SERVER['REQUEST_URI']));
		exit;
	}

	// Datetime
	$_SESSION['datetime'] = date('Y-m-d H:i:s');

	// DB
	require_once 'connect-to-db.php';

	// close session late if you want

	# Good luck!
}
?>
