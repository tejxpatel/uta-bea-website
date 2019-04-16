<?php
# Start session
session_start();

date_default_timezone_set('America/New_York');

# Check login form
if (!empty($_POST['login_name']) && !empty($_POST['password']) && !empty($_POST['form_token'])) {
	if ($_POST['form_token'] !== $_SESSION['form_token']) {
		// failure
		header('Location: ../login.php?e=token');
		exit;
	} else {
		require_once 'connect-to-db.php';
		unset($_SESSION['form_token']);
		$login_name = filter_var($_POST['login_name'], FILTER_SANITIZE_STRING);
		$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

		$get_user_password = "SELECT password, user_id
			FROM user.user
			WHERE (email = '" . $login_name . "' || username = '" . $login_name . "')
				&& deleted IS NULL LIMIT 1;";
		$db = pdoConnect();
		foreach ($db->query($get_user_password) as $row) {
			$uid = $row['user_id'];
			$pw_from_db = $row['password'];
		}
		if ((!empty($uid) || $uid == 0) && password_verify($password, $pw_from_db)) {
			$get_user = "SELECT user_id, user.group_id as 'group_id', group.name as 'group', in_directory, username, email, first_name, middle_name, last_name, nick_name, gender, linkedin, cell_phone, start_date, end_date, birthday, address, city, state, zip, iso, zone, market_id, weather_station, lat, lng, theme, im, personal_email, first_login, title, trl, date_format, client_id, company_name
				FROM user.user LEFT JOIN user.group ON user.group_id = group.group_id
				WHERE user_id = $uid
				LIMIT 1;";
			$db = pdoConnect();
			foreach ($db->query($get_user) as $row) {
				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['group_id'] = $row['group_id'];
				$_SESSION['group'] = strtolower($row['group']);
				// $_SESSION['in_directory'] = $row['in_directory'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['first_name'] = $row['first_name'];
				$_SESSION['middle_name'] = $row['middle_name'];
				$_SESSION['last_name'] = $row['last_name'];
				// $_SESSION['nick_name'] = $row['nick_name'];
				// $_SESSION['gender'] = $row['gender'];
				$_SESSION['linkedin'] = $row['linkedin'];
				$_SESSION['cell_phone'] = $row['cell_phone'];
				$_SESSION['start_date'] = $row['start_date'];
				$_SESSION['birthday'] = $row['birthday'];
				$_SESSION['address'] = $row['address'];
				$_SESSION['city'] = $row['city'];
				$_SESSION['state'] = $row['state'];
				$_SESSION['zip'] = $row['zip'];
				$_SESSION['trl'] = $row['trl'];
				$_SESSION['region_iso'] = $row['iso'];
				$_SESSION['del_location'] = $row['zone'];
				$_SESSION['market_id'] = $row['market_id'];
				$_SESSION['weather_station'] = $row['weather_station'];
				// $_SESSION['lat'] = $row['lat'];
				// $_SESSION['lng'] = $row['lng'];
				$_SESSION['theme'] = $row['theme'];
				// $_SESSION['im'] = $row['im'];
				$_SESSION['first_login'] = $row['first_login'];
				$_SESSION['title'] = $row['title'];
				$_SESSION['company_name'] = $row['company_name'];
				if (isset($row['date_format'])) {
					$_SESSION['date_format'] = $row['date_format'];
				} else {
					$_SESSION['date_format'] = 'Y-m-d';
				}
				if (isset($row['client_id'])) {
					$_SESSION['client_id'] = $row['client_id'];
				}
			}
		}

		if (isset($_SESSION['user_id']) && !empty($_SESSION['group_id']) && !empty($_SESSION['username']) && !empty($_SESSION['email']) && !empty($_SESSION['first_name']) && !empty($_SESSION['last_name']) && empty($_SESSION['end_date'])) {
			// Set auth
			$_SESSION['auth'] = 1;

			// Set datetime
			$_SESSION['datetime'] = date('Y-m-d H:i:s');

			// If there is a return URL, go there
			if (!empty($_SESSION['return_url'])) {
				header('Location: ' . str_replace('@', '&', $_SESSION['return_url']));
				exit;
			}

			// If nothing is set, something is wrong with this user... log out
			else {
				// log in user.fail
				failure('invalid');
				header('Location: ../login.php?e=invalid');
				exit;
			}

		} else {
			// log in user.fail
			failure('invalid');
			header('Location: ../../l5/login.php?e=invalid');
			exit;
		}
	}
} else {
	failure('incomplete');
	header('Location: ../../l5/login.php?e=incomplete');
	exit;
}
# ssh -i "/Users/mbs/Dropbox/Documents/Career/5/keychain/5pitcrew.pem" ubuntu@ec2-54-175-205-70.compute-1.amazonaws.com
?>
