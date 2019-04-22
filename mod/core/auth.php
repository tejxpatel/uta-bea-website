<?php
# Start session
session_start();

date_default_timezone_set('America/New_York');

# Check login form
if (!empty($_POST['login_name']) && !empty($_POST['password']) && !empty($_POST['form_token'])) {
	if ($_POST['form_token'] !== $_SESSION['form_token']) {
		// failure
		header('Location: ../../login.php?e=token');
		exit;
	} else {
		require_once 'connect-to-db.php';
		//unset($_SESSION['form_token']);
		$login_name = filter_var($_POST['login_name'], FILTER_SANITIZE_STRING);
		$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

		$get_user_password = "SELECT password, user_id FROM ondzeuta_bea.user WHERE (email = '" . $login_name . "' || user_name = '" . $login_name . "') AND deleted IS NULL LIMIT 1;";
		$db = pdoConnect();
		
		$db->query($get_user_password);

		foreach ($db->query($get_user_password) as $row) {
			$uid = $row['user_id'];
			$pw_from_db = $row['password'];
		}

		if ((!empty($uid) || $uid == 0) && password_verify($password, $pw_from_db)) {
			$get_user = "SELECT user_id, group_id, user_name, email, first_name, last_name, start_date, end_date, title
				FROM ondzeuta_bea.user
				WHERE user_id = $uid
				LIMIT 1;";
			$db = pdoConnect();
			foreach ($db->query($get_user) as $row) {
					$_SESSION['user_id'] = $row['user_id'];
					$_SESSION['group_id'] = $row['group_id'];
					$_SESSION['user_name'] = $row['user_name'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['first_name'] = $row['first_name'];
					$_SESSION['last_name'] = $row['last_name'];
					$_SESSION['start_date'] = $row['start_date'];
					$_SESSION['end_date'] = $row['end_date'];
					$_SESSION['title'] = $row['title'];
			}
		}

		if (isset($_SESSION['user_id']) && !empty($_SESSION['group_id']) && !empty($_SESSION['user_name']) && !empty($_SESSION['email']) && !empty($_SESSION['first_name']) && !empty($_SESSION['last_name']) && empty($_SESSION['end_date'])) {
			// Set auth
			$_SESSION['auth'] = 1;

			// Set datetime
			$_SESSION['datetime'] = date('Y-m-d H:i:s');

			// If there is a return URL, go there
			if (!empty($_SESSION['return_url'])) {
				header('Location: ' . str_replace('@', '&', $_SESSION['return_url']));
				exit;
			} else {
				header('Location: ../../admin.php');
				exit;
			}

		} else {
			// log in user.fail
			header('Location: ../../login.php?e=invalid');
			exit;
		}
	}
} else {
	header('Location: ../../login.php?e=incomplete');
	exit;
}

# ssh -i "/Users/mbs/Dropbox/Documents/Career/5/keychain/5pitcrew.pem" ubuntu@ec2-54-175-205-70.compute-1.amazonaws.com
?>
