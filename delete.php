<?php

//delete.php?type=[comment/user/post/cat]
if (!isset($db)) {
    include "db.php";
}

$data = sanitize($_REQUEST);

echo \print_r($data);

$type = $data['type'];

if ($type == "comment") {
    $comment_id = $data["comment_id"];
    if (getUserType() == 2) {
        include 'sql.php';
        $sql = $_sql_del_comment_admin;
    } elseif (getUserType() == 1) {
        $user_id = getUserID();
        include 'sql.php';
        echo $sql = $_sql_del_comment;
    }
    $result = mysql_query($sql, $GLOBALS['db']);
}

if ($type == "user") {

    $user_id = $data['user_id'];

    include 'sql.php';
    if (getUserType() == 2) {
        echo $sql = $_sql_del_user;
    }

    $result = mysql_query($sql, $GLOBALS['db']);
    if ($user_id == getUserID())
        header("Location: logout.php");
}
if ($type == "post") {

    $user_id = getUserID();
    $post_id = $data["post_id"];

    include 'sql.php';
    if (getUserType() == 1)
        $sql = $_sql_del_post;
    elseif (getUserType() == 2)
        $sql = $_sql_del_post_admin;

    $result = mysql_query($sql, $GLOBALS['db']);
}
if ($type == "cat") {

    $user_id = $data["id"];
    include 'sql.php';
    $sql = $_sql_del_cat;
}

header("Location: index.php");
?>