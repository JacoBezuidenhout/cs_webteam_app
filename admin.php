<div class="row">
    <div class="col-lg-12">
        <h1 align="center">Admin Panel</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-6" >
        <table class="table table-hover">
            <tr style="text-align:center; background-color:lightgrey"><td><strong>Name</strong></td><td><strong>Surname</strong></td><td><strong>Email</strong></td><td><strong>Preferred Country</strong></td><td><strong>Plan Count</strong></td><td><strong>User Type</strong></td><td colspan=3><strong>Tools</strong></td></tr>
            <?php
            $users = getUsers();
            //echo print_r($posts);
            foreach ($users as $user) {
                ?>

                <div class="modal fade" id="editprofile<?php echo $user['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">	
                            <div class="modal-header">
                                <h1 class="modal-title">Edit Profile</h1>
                            </div>
                            <div class="modal-body">
                                <form action="update.php" method="post">
                                    <input type="hidden" name="type" value="user" />
                                    <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>" />
                                    <input type="text" name="name" value="<?php echo $user['user_name']; ?>" class="form-control"/>
                                    <input type="text" name="surname" value="<?php echo $user['user_surname']; ?>" class="form-control"/>
                                    <input type="email" name="email" value="<?php echo $user['user_email']; ?>" class="form-control"/>
                                    <input type="text" name="country" value="<?php echo $user['user_country']; ?>" class="form-control"/>
                                    <input type="number" name="user_type" value="<?php echo $user['user_type']; ?>" class="form-control"/>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



                <tr><td><?php echo $user['user_name']; ?></td><td><?php echo $user['user_surname']; ?></td><td><?php echo $user['user_country']; ?></td>
                    <td><?php echo $user['user_email']; ?></td>
                    <td><?php echo getPostCount($user['user_id']); ?></td>
                    <td><?php echo getUserTypeFromID($user['user_id']); ?></td>
                    <td>
                        <button class="btn btn-sm btn-warning pull-right" data-toggle="modal" data-target="#editprofile<?php echo $user['user_id']; ?>"><span class="glyphicon glyphicon-edit"></span></button>
                    </td>
                    <td>
                        <form action="delete.php" method="post">
                            <input name="type" type="hidden" value="user">
                            <input name="user_id" type="hidden" value="<?php echo $user['user_id']; ?>">
                            <button class="btn btn-sm btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                        </form>
                    </td>
                    <td>
                        <form action="index.php" method="get">

                            <input name="user_filter_id" type="hidden" value="<?php echo $user['user_id']; ?>">
                            <button class="btn btn-sm btn-info" type="submit"><span class="glyphicon glyphicon-arrow-right"></span></button>
                        </form>
                    </td>

                </tr>
            <?php } ?>
        </table>
    </div>

    <div class="col-lg-6" >
        <table class="table table-hover">
            <tr style="text-align:center; background-color:lightgrey">
                <td><strong>Title</strong></td>
                <td><strong>Body</strong></td>
                <td><strong>Category</strong></td>
                <td colspan=3><strong>Tools</strong></td>
            </tr>



            <?php
            $posts = getPosts();
            //echo print_r($posts);
            foreach ($posts as $post) {
                if (isset($_REQUEST["user_filter_id"])) {
                    if ($post['user_id'] == $_REQUEST["user_filter_id"]) {
                        ?>

                        <tr>
                            <td><strong><?php echo $post["post_title"]; ?></strong></td>
                            <td><strong><?php echo $post["post_body"]; ?></strong></td>
                            <td><strong><?php echo getCatDesc($post["cat_id"]); ?></strong></td>
                            <td>
                                <button class="btn btn-sm btn-warning pull-right" data-toggle="modal" data-target="#editPost<?php echo $post['post_id']; ?>"><span class="glyphicon glyphicon-edit"></span></button>
                            </td>
                            <td>
                                <form action="delete.php" method="post">
                                    <input name="type" type="hidden" value="user">
                                    <input name="user_id" type="hidden" value="<?php echo $post['post_id']; ?>">
                                    <button class="btn btn-sm btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                </form>
                            </td>
                            <td>
                                <form action="index.php" method="get">

                                    <input name="user_filter_id" type="hidden" value="<?php echo $post['post_id']; ?>">
                                    <button class="btn btn-sm btn-info" type="submit"><span class="glyphicon glyphicon-arrow-right"></span></button>
                                </form>
                            </td>
                        </tr>

                        <div class="modal fade" id="editPost<?php echo $post["post_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <form action="update.php" method="post">
                                            <input type="hidden" name="type" value="post"/>
                                            <input type="hidden" name="post_id" value="<?php echo $post["post_id"]; ?>"/>
                                            <input type="text" name="post_title" value="<?php echo $post["post_title"]; ?>" class="form-control"/>
                                    </div>
                                    <div class="modal-body">
                                        <textarea name="post_body" class="form-control" rows="3"><?php echo $post["post_body"]; ?></textarea>
                                        <select class="form-control" name="cat_id">
                                            <?php
                                            $array = getCat();
                                            foreach ($array as $value) {
                                                ?>
                                                <option value="<?php echo $value['cat_id'] ?>" <?php if ($post['cat_id'] == $value['cat_id']) echo "selected"; ?>><?php echo $value['cat_desc'] ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>

                                        </form>

                                        <form action="delete.php" method="post">
                                            <input type="hidden" name="type" value="post">
                                            <input type="hidden" name="post_id" value="<?php echo $post["post_id"]; ?>">
                                            <button type="submit" class="btn btn-danger pull-left">Delete Post</button>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>

                         

                        <?php
                    }
                }
            }
            ?>
        </table>
    </div>
</div>