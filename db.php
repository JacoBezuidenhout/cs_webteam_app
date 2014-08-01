<?php

$db = 0;

if (!$db) {
    $db = mysql_connect("localhost", "root", "");

    if (!$db) {
        die('Could not connect: ' . mysql_error());
    } else
        mysql_query("USE cswebapp", $db);
}

include "var.php";
?>