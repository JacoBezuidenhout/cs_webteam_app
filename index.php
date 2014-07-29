<?php include "header.php"; 

$type = 0;

if ($type == 0)
{
	
	include "guest.php";
	
}

if ($type == 1)
{

	include "user.php";

}

if ($type == 2)
{

	include "admin.php";

}

include "footer.php"; ?>
