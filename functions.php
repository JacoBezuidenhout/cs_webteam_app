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
        
        $query = "SELECT * FROM post";
        $res = mysql_query($query, $GLOBALS['db']);
        while ($result = mysql_fetch_assoc($res)) {
            $output[$result['post_id']] = $result;
        }
        
        return $output;
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

function getUserID() {
    if (isValidSession())
        return $_SESSION["user_id"];
}

function getUserFullName($id) {
    
    $query = "SELECT user_name, user_surname FROM user WHERE user_id={$id}";
    $result = mysql_query($query, $GLOBALS['db']);
    $result = mysql_fetch_array($result);
    
    return $result[0]. " " . $result[1];
    
}

function getUserType() {
    if (isValidSession())
        return $_SESSION["type"];
    else
        return 0;
}

function getPostCount($id) {
    
    $query = "SELECT COUNT(user_id) FROM post WHERE user_id={$id}";
    $result = mysql_query($query, $GLOBALS['db']);
    $result = mysql_fetch_array($result);
    
    return $result[0];
    
}

function isPermitted($action,$id) {

    $user_id = getUserID();

    switch ($action) {
        case "select": return TRUE;
            break;
        case "delete": if (getUserType() == 2) return TRUE;
                        elseif (getUserID() == 1)
                        {
                            if (getUserID() == $id)
                                return TRUE;
                        }
                        else
                            return FALSE;
            break;
        case "update": $query = "";
            break;
        case "insert": $query = "";
            break;
    }

    $result = mysql_query($query, $GLOBALS['db']);
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