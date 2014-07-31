<?php

include "db.php";

$data = sanitize($_REQUEST);

if (($data["email"] <> "") && ($data["password"] <> ""))
{
    
    $email = $data["email"];
    include "sql.php";
    $sql = $sql_select_login;
    
    $result = mysql_query($sql, $db);
    $result = mysql_fetch_array($result);
    
    if (mysql_affected_rows($db) == 1)
    {
        
        if ($result["user_password"] == $data["password"])
        {
            $_SESSION['login'] = true;
            $_SESSION['name'] = $result['user_name'];
            $_SESSION['email'] = $result['user_email'];
            $_SESSION['surname'] = $result['user_surname'];
            $_SESSION['user_id'] = $result['user_id'];
            $_SESSION['type'] = $result['user_type'];
            $_SESSION['country'] = $result['user_country'];
            $_SESSION['hash'] = sha1($_SESSION["user_id"].$_SESSION["type"].$_SESSION["email"] . $_SESSION["name"] . $_SESSION["surname"] . "thisismymagicstr");
        
            if ($data['cookie'] == "on")
            {
                setcookie("session", $_SESSION, $expire);
            }
        }
        
    }
        
    //header("Location: index.php");
    
}



?>

