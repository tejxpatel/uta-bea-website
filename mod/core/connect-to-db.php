<?php
/*
* Author:	Jefferson Ondze Mangha
* Updated:	2019-04-11
* Description:	database connections
*/

// production
function pdoConnect() {

	// credentials
	$db_host = '167.99.105.36';
	$db_user = 'ondzeuta_bea';
	$db_pass = 'J3ff3rs0n!';

	// connect
	$db = new PDO('mysql:host='.$db_host.';charset=utf8', $db_user, $db_pass);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ERRMODE_EXCEPTION
	return $db;

}

// example
	// $query_name = 'SELECT tempi FROM `weather`.`ny_new_york` LIMIT 25;';
	// $replica_db = pdoConnectReplica();
	// $result = $db->query($query_name);
	// foreach($result as $row) {
	// 	echo $row['tempi'],', ';
	// }
	// unset($query_name);
	// unset($result);

?>