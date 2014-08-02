<?php

//update.php?type=[comment/user/post/cat]

    include "db.php";

$data = sanitize($_REQUEST);

echo print_r($data);

$id = getUserID();

if (isPermitted("update", $id)) {

    $type = $data['type'];

    if ($type == "comment") {

        $comment_id = $data["id"];
        include 'sql.php';
        $sql = $_sql_update_comment;
    }
    if ($type == "user") {

        $user_id = $data["user_id"];
        $name = $data['name'];
        $surname = $data['surname'];
        $email = $data['email'];
        if (getUserType() == 2)
            $user_type = $data['user_type'];
        $country = $data['country'];
        include 'sql.php';
        if (getUserType() == 2)
            $sql = $sql_update_user_admin;
        elseif (getUserType() == 1 AND getUserID() == $user_id)
            $sql = $sql_update_user;
            
            $result = mysql_query($sql, $db);
            if ($result == 1 && $user_id == getUserID())
            {
                $sql = $sql_select_user;
                $result1 = mysql_query($sql, $db);
                $result = mysql_fetch_array($result1);
                updateSessionInfo($result);
                    
            }
            header("Location: index.php");
        
    }
    if ($type == "post") {

        $post_id = $data["post_id"];
        $post_title = $data["post_title"];
        $post_body = $data["post_body"];
        $cat_id = $data["cat_id"];
        include 'sql.php';
            echo $sql = $sql_update_post;
        $result = mysql_query($sql, $db);    
        header("Location: index.php");
    }
    if ($type == "cat") {

        $cat_id = $data["id"];
        include 'sql.php';
        $sql = $sql_update_cat;
    }


}



?>