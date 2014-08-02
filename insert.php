<?php

//insert.php?type=[comment/user/post/cat]

include "db.php";

$data = sanitize($_REQUEST);

echo \print_r($data);

    $type = $data['type'];

    if ($type == "comment") {
        $user_id = getUserID();
        $post_id = $data['post_id'];
        $comment_body = $data['comment_body'];
        include 'sql.php';
        $sql = $sql_add_comment;
        $result = mysql_query($sql, $db);
    }
    if ($type == "user") {

        $user_id = $data["user_id"];
        $name = $data['name'];
        $surname = $data['surname'];
        $email = $data['email'];
        $country = $data['country'];
        include 'sql.php';
        $sql = $sql_add_user;
            $result = mysql_query($sql, $db);
            if ($result == 1)
            {
                $sql = $sql_select_user;
                $result1 = mysql_query($sql, $db);
                $result = mysql_fetch_array($result1);
                updateSessionInfo($result);
                    header("Location: index.php");
            }
            
        
    }
    if ($type == "post") {

        $user_id = $id = getUserID();
        if (isPermitted("post", $id)) {

            $post_title = $data["title"];
            $post_body = $data["body"];
            $post_cat = $data["cat"];
            include 'sql.php';
            echo $sql = $sql_add_post;
            $result = mysql_query($sql, $db);
        }
    }
    if ($type == "cat") {

        $cat_id = $data["id"];
        include 'sql.php';
        $sql = $sql_add_cat;
    }


header("Location: index.php");

?>
