<?php
	//delete.php?type=[comment/user/post/cat]

include "db.php";

if (isset($_REQUEST))
	$_REQUEST = sanitize($_REQUEST);
	
	echo print_r($_REQUEST);
	
$type = $_REQUEST['type'];

if ($type == "comment") {

	$sql = $_sql_del_user;

}
if ($type == "user") {}
if ($type == "post") {}
if ($type == "cat") {}



?>