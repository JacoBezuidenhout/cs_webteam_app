<?php
/*

  Edit self profile (simple personal details and picture. Admin determines wether a user is allowed to have a profile picture).
  Create a post.
  Post must contain title, content, date, author and category.
  View another user's profile.
  Management of posts . this will include the CURD of all personal posts.
  Comment on an existing post.
  Search post according to categories.

 */
?>

<div class="row"  style="height:100%;">

    <div class="col-lg-7">

        <div class="col-lg-10 col-lg-offset-1 well">

            <div class="col-lg-12">
                <h1 align="center">Evil Fluffy Plans</h1>
                <form id="frmFilter" action="index.php" method="get">

                    <select class="form-control" name="cat" onchange="$('#frmFilter').submit();">
                        <option value="-1" <?php if ($_GET['cat'] == -1) echo "selected"; ?>>All</option>
                        <?php
                        $array = getCat();
                        foreach ($array as $value) {
                            ?>
                            <option value="<?php echo $value['cat_id'] ?>" <?php if ($_GET['cat'] == $value['cat_id']) echo "selected"; ?>><?php echo $value['cat_desc'] ?></option>
                        <?php } ?>

                    </select>


                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-5 col-lg-offset-1" >

        <div class="col-lg-12 well well-sm" >

            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <form action="insert.php" method="post">
                    <div class="media-body">
                        <div class="row">
                            <div class="col-lg-7">
                                <input type="hidden" name="type" value="post"/>
                                <input class="form-control" type="text" name="title" placeholder="Plan Title"/>
                            </div>
                            <div class="col-lg-5">
                                <select class="form-control" name="cat">
                                    <option value="" disabled selected>Category</option>
                                    <?php
                                    $array = getCat();
                                    foreach ($array as $value) {
                                        ?>
                                        <option value="<?php echo $value['cat_id'] ?>"><?php echo $value['cat_desc'] ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>
                        <textarea class="form-control" name="body" placeholder="Plan Details"></textarea>

                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Post Plan</button>
                </form>
            </div>
        </div>

        <?php
        $posts = getPosts();
        //echo print_r($posts);
        foreach ($posts as $post) {
            ?>

            <?php if (isUserPost($post["post_id"])) { ?>
                <div class="modal fade" id="myModal<?php echo $post["post_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
            <?php } ?>
            <div class="col-lg-12 well well-sm" >
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <h4 class="media-heading"><?php echo $post["post_title"]; ?></h4>
                            </div>
                            <div class="col-lg-4">
                                <?php if (isUserPost($post["post_id"])) { ?>
                                    <button class="btn btn-warning btn-sm pull-right" data-toggle="modal" data-target="#myModal<?php echo $post["post_id"]; ?>">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </button>
                                <?php } ?>
                            </div>
                        </div>
                        <p><?php echo $post["post_body"]; ?></p>
                    </div>
                    <small class="pull-right">
                        by <a href="profile.php?user_id=<?php echo $post["user_id"]; ?>"><?php echo getUserFullName($post["user_id"]); ?></a>
                        in <a href="index.php?cat=<?php echo $post["cat_id"]; ?>"><?php echo getCatDesc($post["cat_id"]); ?></a>
                    </small>
                </div>

                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $post["post_id"]; ?>">
                                    <small>Comments <span class="badge"><?php echo getPostCommentCount($post["post_id"]); ?></span></small>
                                </a>
                            </h5>
                        </div>
                        <div id="collapse<?php echo $post["post_id"]; ?>" class="panel-collapse collapse">
                            <div class="panel-body">

                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object" src="http://placehold.it/60x60" alt="">
                                    </a>
                                    <div class="media-body">
                                        <form action="insert.php" method="post">
                                            <div class="input-group">
                                                <input type="hidden" name="type" value="comment">
                                                <input type="hidden" name="post_id" value="<?php echo $post["post_id"]; ?>">
                                                <input type="text" name="comment_body" class="form-control">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary" type="submit">Comment</button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <hr/>

                                <?php
                                $comments = getPostComments($post["post_id"]);

                                foreach ($comments as $comment) {
                                    ?>

                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object" src="http://placehold.it/45x45" alt="">
                                        </a>
                                        <div class="media-body">

                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <p><?php echo $comment["comment_body"]; ?></br>
                                                        <small>by <a href="#"><?php echo getUserFullName($comment["user_id"]); ?></a></small></p>
                                                </div>
                                                <div class="col-lg-4">
                                                    <?php if (isUserComment($comment["comment_id"])) { ?>
                                                        <form action="delete.php" method="post">
                                                            <input name="type" type="hidden" value="comment">
                                                            <input name="comment_id" type="hidden" value="<?php echo $comment['comment_id']; ?>">
                                                            <button class="btn btn-sm btn-danger pull-right" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                                        </form>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        <?php } ?>

    </div>


    <div class="modal fade" id="editprofile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">	
                <div class="modal-header">
                    <h1 class="modal-title">Edit Profile</h1>
                </div>
                <form action="update.php" method="post">
                    <div class="modal-body">

                        <input type="hidden" name="type" value="user" class="form-control"/>
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION["user_id"]; ?>" class="form-control"/>
                        <input type="text" name="name" value="<?php echo $_SESSION["name"]; ?>" class="form-control"/>
                        <input type="text" name="email" value="<?php echo $_SESSION["email"]; ?>" class="form-control"/>
                        <input type="text" name="surname" value="<?php echo $_SESSION["surname"]; ?>" class="form-control"/>
                        <input type="text" name="country" value="<?php echo $_SESSION["country"]; ?>" class="form-control"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-5"  style="background-color:grey; height:100%; position:fixed; top:0px; right:0px;">
        <div class="col-lg-10 col-lg-offset-1" style="margin-top: 5%;">
            <div class="jumbotron">
                <div style="">
                    <h1 align="center">EBG Blog</h1>
                    <p  align="center"><small>Evil Bunny Group</small></p>
                    <p  align="center">Where sharing EFPs <small>(Evil Fluffy Plans)</small> is caring...</p>
                </div>
            </div>



            <div class="panel panel-primary">
                <div class="panel-heading row">
                    <div class="col-lg-6"><h3 class="panel-title">Your Profile</h3></div>
                    <div class="col-lg-6"><a type="button" class="btn btn-small btn-danger pull-right" href="logout.php">Logout</a></div>
                </div>
                <div class="panel-body">
                    <button class="btn btn-warning btn-sm pull-right" data-toggle="modal" data-target="#editprofile">
                        <span class="glyphicon glyphicon-edit"></span>
                    </button>
                    <div class="row">
                        <div class="col-lg-3 col-lg-offset-1"><img src="http://placehold.it/125x175" alt="" class="img-circle"></div>
                        <div class="col-lg-7 col-lg-offset-1"><h3><?php echo $_SESSION["name"] . " " . $_SESSION["surname"] ?></h3>
                            <p><b>Name:</b> <?php echo $_SESSION["name"]; ?></p>
                            <p><b>Surname:</b> <?php echo $_SESSION["surname"]; ?></p>
                            <p><b>Target Country:</b> <?php echo $_SESSION["country"]; ?></p>
                            <p><b>#Plans:</b> <?php //echo getPostCount($_SESSION["user_id"]);              ?></p>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>

</div>