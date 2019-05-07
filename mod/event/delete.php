<?php
require_once '../core/req_auth.php';

if (isset($_GET['id']) && !empty($_GET['id'])){
	$event_id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
} else {
	$_SESSION['alert'][]= array('message' => 'Sorry You can\'t delete something that doesn\'t exists', 'class' => 'danger', 'dismissible_off' => 0, 'autohide_off' => 1);
	header('Location: ../../admin.php');
}

$updated_by = $_SESSION['user_id'];
$query = "UPDATE ondzeuta_bea.event SET deleted = NOW(), deleted_by = $updated_by WHERE event_id = $event_id";
$db = pdoConnect();

if ($db->query($query)) {
	$_SESSION['alert'][]= array('message' => 'Event deleted Successfully', 'class' => 'success', 'dismissible_off' => 0, 'autohide_off' => 1);
	header('Location: ../../admin.php');
} else {
	$_SESSION['alert'][]= array('message' => 'Event could not be deleted, something went wrong, try again later', 'class' => 'danger', 'dismissible_off' => 0, 'autohide_off' => 1);
	header('Location: ../../admin.php');
}

?>