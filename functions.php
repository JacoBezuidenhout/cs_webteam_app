<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function isValidSession() {
    if (isset($_SESSION['hash'])) {
        $session_hash = $_SESSION["hash"];
        $session_hash2 = sha1($_SESSION["user_id"] . $_SESSION["type"] . $_SESSION["email"] . $_SESSION["name"] . $_SESSION["surname"] . "thisismymagicstr");

        if ($session_hash == $session_hash2) {
            return true;
        } else {
            return false;
        }
    } else
        return false;
}

function getPosts() {

    $output = [];

    if (isset($_REQUEST['cat']) && $_REQUEST['cat'] <> -1)
        $query = "SELECT * FROM post WHERE cat_id=" . sanitize($_REQUEST['cat'] . " ORDER BY timestamp DESC");
    else
        $query = "SELECT * FROM post ORDER BY timestamp DESC";
    $res = mysql_query($query, $GLOBALS['db']);
    while ($result = mysql_fetch_assoc($res)) {
        $output[$result['post_id']] = $result;
    }

    return $output;
}

function isUserPost($id) {


    $query = "SELECT user_id FROM post WHERE post_id={$id}";
    $result = mysql_query($query, $GLOBALS['db']);
    $res = mysql_fetch_array($result);

    if ($res[0] == getUserID())
        return TRUE;
    else
        return FALSE;
}

function isUserComment($id) {


    $query = "SELECT user_id FROM comment WHERE comment_id={$id}";
    $result = mysql_query($query, $GLOBALS['db']);
    $res = mysql_fetch_array($result);

    if ($res[0] == getUserID())
        return TRUE;
    else
        return FALSE;
}

function getPostComments($id) {

    $output = [];

    $query = "SELECT * FROM comment WHERE post_id={$id}";
    $res = mysql_query($query, $GLOBALS['db']);
    while ($result = mysql_fetch_assoc($res)) {
        $output[$result['comment_id']] = $result;
    }

    return $output;
}

function getPostCommentCount($id) {

    $output = [];

    $query = "SELECT COUNT(post_id) FROM comment WHERE post_id={$id}";
    $res = mysql_query($query, $GLOBALS['db']);
    $result = mysql_fetch_array($res);
    //echo print_r($result);
    return $result[0];
}

function getUsers() {

    $output = [];

    $query = "SELECT * FROM user";
    $res = mysql_query($query, $GLOBALS['db']);
    while ($result = mysql_fetch_assoc($res)) {
        $output[$result['user_id']] = $result;
    }

    return $output;
}

function getUserID() {
    if (isValidSession())
        return $_SESSION["user_id"];
}

function getUserFullName($id) {

    $query = "SELECT user_name, user_surname FROM user WHERE user_id={$id}";
    $result = mysql_query($query, $GLOBALS['db']);
    $result = mysql_fetch_array($result);

    return $result[0] . " " . $result[1];
}

function getCat() {
    $output = [];

    $query = "SELECT * FROM cat";
    $res = mysql_query($query, $GLOBALS['db']);
    while ($result = mysql_fetch_assoc($res)) {
        $output[$result['cat_id']] = $result;
    }

    return $output;
}

function getCatDesc($id) {

    $query = "SELECT cat_desc FROM cat where cat_id={$id}";
    $res = mysql_query($query, $GLOBALS['db']);
    $output = mysql_fetch_array($res);

    return $output[0];
}

function updateSessionInfo($result) {

    $_SESSION['login'] = true;
    $_SESSION['name'] = $result['user_name'];
    $_SESSION['email'] = $result['user_email'];
    $_SESSION['surname'] = $result['user_surname'];
    $_SESSION['user_id'] = $result['user_id'];
    $_SESSION['type'] = $result['user_type'];
    $_SESSION['country'] = $result['user_country'];
    $_SESSION['hash'] = sha1($_SESSION["user_id"] . $_SESSION["type"] . $_SESSION["email"] . $_SESSION["name"] . $_SESSION["surname"] . "thisismymagicstr");
}

function getUserType() {
    if (isValidSession())
        return $_SESSION["type"];
    else
        return 0;
}

function getUserTypeFromID($id) {

    $query = "SELECT user_type FROM user WHERE user_id={$id}";
    $result = mysql_query($query, $GLOBALS['db']);
    $result = mysql_fetch_array($result);

    return $result[0];
}

function getPostCount($id) {

    $query = "SELECT COUNT(user_id) FROM post WHERE user_id={$id}";
    $result = mysql_query($query, $GLOBALS['db']);
    $result = mysql_fetch_array($result);

    return $result[0];
}

function isPermitted($action, $id) {

    //$user_id = getUserID();

    switch ($action) {
        case "select": return TRUE;
            break;
        case "post": if (isValidSession() && getUserType())
                return TRUE;
            break;
        case "delete": if (getUserType() == 2)
                return TRUE;
            elseif (getUserID() == 1) {
                if (getUserID() == $id)
                    return TRUE;
            } else
                return FALSE;
            break;
        case "update": if (getUserType() == 2)
                return TRUE;
            elseif (getUserType() == 1) {
                if (getUserID() == $id)
                    return TRUE;
            } else
                return FALSE;
            break;
    }

    return FALSE;
}

function cleanInput($input) {

    //'@<[\/\!]*?[^<>]*@si', // Strip out HTML tags
    
    $search = array(
        '@<script[^>]*?>.*?</script>@si', // Strip out javascript 
        '@<style[^>]*?>.*?</style>@siU', // Strip style tags properly
        '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
    );

    $output = preg_replace($search, '', $input);
    return $output;
}

function sanitize($input) {
    $output = "";
    //echo print_r($input);
    if (is_array($input)) {
        foreach ($input as $var => $val) {
            $output[$var] = sanitize($val);
        }
    } else {
        if (get_magic_quotes_gpc()) {
            $input = stripslashes($input);
        }
        $input = cleanInput($input);
        $output = mysql_real_escape_string($input);
    }
    return $output;
}

?>