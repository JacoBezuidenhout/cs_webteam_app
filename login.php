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
            updateSessionInfo($result);
        
            if ($data['cookie'] == "on")
            {
                $_COOKIE = $_SESSION;
            }
        }
        
    }
        
    header("Location: index.php");
    
}



?>

