<?php

	$db = mysql_connect("localhost","root","5226");

	if (!$db) {
    		die('Could not connect: ' . mysql_error());
	}

	mysql_query("USE cswebapp",$db);

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>CSWeb App</title>

	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

</head>
<body class=>
