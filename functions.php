<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function isValidSession() {
    if (isset($_SESSION['hash'])) {
        $session_hash = $_SESSION["hash"];
        $session_hash2 = sha1($_SESSION["user_id"].$_SESSION["type"].$_SESSION["email"] . $_SESSION["name"] . $_SESSION["surname"] . "thisismymagicstr");

        if ($session_hash == $session_hash2) {

            return true;
        } else {
            return false;
        }
    } else
        return false;
}

function getUserID() {
    if (isValidSession())
        return $_SESSION["user_id"];
}
function getUserType() {
    if (isValidSession())
        return $_SESSION["type"];
}

function isPermitted($action) {
    if (!isset($db))
        include "db.php";

    $user_id = getUserID();

    switch ($action) {
        case "select": $query = "";
            break;
        case "delete": $query = "";
            break;
        case "update": $query = "";
            break;
        case "insert": $query = "";
            break;
    }

    $result = mysql_query($query, $db);
}

function cleanInput($input) {

    $search = array(
        '@<script[^>]*?>.*?</script>@si', // Strip out javascript
        '@<[\/\!]*?[^<>]*?>@si', // Strip out HTML tags
        '@<style[^>]*?>.*?</style>@siU', // Strip style tags properly
        '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
    );

    $output = preg_replace($search, '', $input);
    return $output;
}

function sanitize($input) {
    $output = "";
    echo print_r($input);
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