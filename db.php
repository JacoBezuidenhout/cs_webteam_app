<?php

include "var.php";
if (!isset($db)) {
    $db = mysql_connect("peoplesoft.co.za", "root", "thereisnov4rk");

    if (!$db) {
        die('Could not connect: ' . mysql_error());
    } else
        mysql_query("USE cswebapp", $db);
}
?>