<?php
require_once '../core/req_auth.php';
$db = pdoConnect();
// Get Data from the post request
$image_dir = '../../img/events/';
$image_url = 'header.jpg';

$allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
$allowed_type = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif', 'image/x-png', 'image/pjpeg'];

$data = $_POST;

$safe_attributes = [
	'name'
	,'date'
	,'time'
	,'location'
	,'type'
	,'description'
];

$updated_by = $_SESSION['user_id'];
$event_id = $data['event_id'];
$query = "UPDATE ondzeuta_bea.event SET ";

$get_event = "SELECT image FROM ondzeuta_bea.event WHERE event_id = ".$data['event_id']."";

$db = pdoConnect();

foreach ($db->query($get_event) as $row) {
	if (!empty($row['image']) && $row['image'] != 'user.jpg'){
		$image_url = $row['image'];
	}
}



if (isset($data) && !empty($data) && is_array($data)) {
	// set the attributes to be added to the database and sanitize
	foreach ($safe_attributes as $attribute) {
		if (!empty(trim($data[$attribute]))) {
			if ($attribute != 'date'){
				${$attribute} = str_replace("'", "\'",filter_var($data[$attribute], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
			} else {
				${$attribute} = Date('Y-m-d', strtotime($data[$attribute]));
			}
			$query .= "$attribute = '".${$attribute}."'".", ";
		}
	}

	// process the image file
	if (isset($_FILES['banner']) && !empty($_FILES['banner'])) {
		$ext = end(explode('.', $_FILES['banner']['name']));
		if (in_array($_FILES['banner']['type'], $allowed_type) && in_array($ext, $allowed_ext)){
			$new_file_name = str_replace(" ", "_", $first_name.' '.$last_name);
			$new_file_name = $new_file_name.'_'.round(microtime(true)).'.'.$ext;
			move_uploaded_file($_FILES["banner"]["tmp_name"], $image_dir.$new_file_name);
			$image_url = $new_file_name;
		} else {
			$_SESSION['alert'][]= array('message' => 'The file you uploaded is not allowed we used the default image instead', 'class' => 'danger', 'dismissible_off' => 0, 'autohide_off' => 1);
		}
	}

	$query .= "image = '".$image_url."', updated_by = ".$updated_by.' WHERE event_id = '.$event_id.';';

	try {
		$db->query($query);
		$_SESSION['alert'][]= array('message' => $name.' event has been added successfully', 'class' => 'success', 'dismissible_off' => 0, 'autohide_off' => 1);
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