<?php

//delete.php?type=[comment/user/post/cat]
if (!isset($db)) {
    include "db.php";
}

$data = sanitize($_REQUEST);

echo \print_r($data);

$type = $data['type'];

if ($type == "comment") {

    $comment_id = $data["id"];
    include 'sql.php';
    $sql = $_sql_del_comment;
}
if ($type == "user") {

    $user_id = $data["id"];
    include 'sql.php';
    $sql = $_sql_del_user;
}
if ($type == "post") {

    $user_id = $data["id"];
    include 'sql.php';
    $sql = $_sql_del_post;
}
if ($type == "cat") {

    $user_id = $data["id"];
    include 'sql.php';
    $sql = $_sql_del_cat;
}

$result = mysql_query($sql, $db);
echo $sql;

echo $result;
?>