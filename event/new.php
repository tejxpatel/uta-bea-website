<?php
require_once '../core/req_auth.php';
$db = pdoConnect();
// Get Data from the post request
$image_dir = '../../img/user/';
$image_url = 'user.jpg';

$allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
$allowed_type = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif', 'image/x-png', 'image/pjpeg'];

$data = $_POST;

$safe_attributes = [
	'first_name'
	,'last_name'
	,'bio'
	,'major'
	,'user_name'
	,'password'
	,'email'
	,'title'
];

$group_id = 2;
$created_by = $_SESSION['user_id'];
$end_date = Date('Y-m-d', strtotime('today +6 months'));

$query = "INSERT INTO ondzeuta_bea.user (group_id, created_by, end_date, first_name, last_name, bio, major, user_name, password, email, title, image) VALUES (".$group_id.",".$created_by.",'".$end_date."',";
$values = [];

if (isset($data) && !empty($data) && is_array($data)) {
	// set the attributes to be added to the database and sanitize
	foreach ($safe_attributes as $attribute) {
		if ($attribute != 'password'){
			${$attribute} = str_replace("'", "\'",filter_var($_POST[$attribute], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
		} else {
			${$attribute} = password_hash(filter_var($_POST[$attribute], FILTER_SANITIZE_STRING), PASSWORD_BCRYPT);
		}

		$query .= "'".${$attribute}."'".",";
	}

	// process the image file
	if (isset($_FILES['image'])) {
		$ext = end(explode('.', $_FILES['image']['name']));
		if (in_array($_FILES['image']['type'], $allowed_type) && in_array($ext, $allowed_ext)){
			$new_file_name = preg_replace(' ', '_', $first_name.' '.$last_name);
			$new_file_name = $new_file_name.'_'.round(microtime(true)).'.'.$ext;
			move_uploaded_file($_FILES["image"]["tmp_name"], $image_dir.$new_file_name);
			$image_url = $new_file_name;
		} else {
			$_SESSION['alert'][]= array('message' => 'The file you uploaded is not allowed we used the default image instead', 'class' => 'danger', 'dismissible_off' => 0, 'autohide_off' => 1);
		}
	}

	$query .= "'".$image_url."'".');';

	try {
		$db->query($query);
		$_SESSION['alert'][]= array('message' => $first_name.' '.$last_name.' has been added successfully please contact them and give them their credentials', 'class' => 'success', 'dismissible_off' => 0, 'autohide_off' => 1);
		header('Location: ../../admin.php');
	} catch(Exception $e){
		var_dump($e);
	}

} else {
	$_SESSION['alert'][]= array('message' => 'Something went wrong, the data you entered was corrupt', 'class' => 'danger', 'dismissible_off' => 0, 'autohide_off' => 1);
	header('Location: ../../admin.php');
	return false;
}

?>