<?php
        $sql = ""; 
//////////INSERT
	$sql_add_user = "INSERT INTO `cswebapp`.`user` (`user_id`, `user_email`, `user_password`,
	`user_name`, `user_surname`, `user_country`, `user_type`, `timestamp`) VALUES (NULL,
	'{$email}', '{$password}', '{$name}', '$surname', '$country', '1', CURRENT_TIMESTAMP);";
	$sql_add_cat = "INSERT INTO `cswebapp`.`cat` (`cat_id`, `cat_desc`, `timestamp`) VALUES 
	(NULL, '{$cat_desc}', CURRENT_TIMESTAMP);";
	$sql_add_post = "INSERT INTO `cswebapp`.`post` (`post_id`, `user_id`, `post_title`, 
	`post_body`, `cat_id`, `timestamp`) VALUES (NULL, '{$user_id}', '{$post_title}', 
	'{$post_body}', '{$post_cat}', CURRENT_TIMESTAMP);";
	$sql_add_comment = "INSERT INTO `cswebapp`.`comment` (`comment_id`, `post_id`, `user_id`, 
	`comment_body`, `timestamp`) VALUES (NULL, '{$post_id}', '{$user_id}', '{$comment_body}', CURRENT_TIMESTAMP);";
/////////DELETE
	$_sql_del_user = "DELETE FROM `user` WHERE `user_id`={$user_id};";
	$_sql_del_comment = "DELETE FROM `comment` WHERE `comment_id`={$comment_id} AND user_id={$user_id};";
	$_sql_del_comment_admin = "DELETE FROM `comment` WHERE `comment_id`={$comment_id};";
	$_sql_del_cat = "DELETE FROM `cat` WHERE `cat_id`={$cat_id};";
	$_sql_del_post = "DELETE FROM `post` WHERE `post_id`={$post_id} AND `user_id`={$user_id};";// DELETE FROM `comment` WHERE `post_id`={$post_id} AND `user_id`={$user_id};";
	$_sql_del_post_admin = "DELETE FROM `post` WHERE `post_id`={$post_id};";// DELETE FROM `comment` WHERE `post_id`={$post_id};";
/////////UPDATE
        $sql_update_user = "UPDATE `cswebapp`.`user` "
                . "SET `user_email` = '{$email}', `user_name` = '{$name}', "
                . "`user_surname` = '{$surname}', `user_country` = '{$country}'"
                . "WHERE `user`.`user_id` = '{$user_id}';";
        $sql_update_user_admin = "UPDATE `cswebapp`.`user` "
                . "SET `user_email` = '{$email}', `user_name` = '{$name}', `user_type` = '{$user_type}', "
                . "`user_surname` = '{$surname}', `user_country` = '{$country}'"
                . "WHERE `user`.`user_id` = '{$user_id}';";
        $sql_update_post = "UPDATE `cswebapp`.`post` SET `post_title` = '{$post_title}', `post_body` = '{$post_body}', `cat_id` = '{$cat_id}' WHERE `post`.`post_id` = {$post_id};";        
/////////SELECT
        $sql_select_login = "SELECT * FROM `user` WHERE user_email = '{$email}'";
        $sql_select_user = "SELECT * FROM `user` WHERE user_id = '{$user_id}'";
        
        
?>