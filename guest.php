<?php
//See POSTS and Search


?>

<div class="row"  style="height:100%;">

    <div class="col-lg-7">


        <h1 align="center">Evil Fluffy Plans</h1>

        <div class="col-lg-10 col-lg-offset-1 well">
            <form id="frmFilter" action="index.php" method="get">
                
                    <select class="form-control" name="cat" onchange="$('#frmFilter').submit();">
                        <option value="-1" <?php if($_GET['cat'] == -1) echo "selected"; ?>>All</option>
                        <?php
                        $array = getCat();
                        foreach ($array as $value) {
                            ?>
                            <option value="<?php echo $value['cat_id'] ?>" <?php if($_GET['cat'] == $value['cat_id']) echo "selected"; ?>><?php echo $value['cat_desc'] ?></option>
                        <?php } ?>

                    </select>
                    
                
            </form>
        </div>
    </div>
    <div class="col-lg-5 col-lg-offset-1">

        <?php 
        
        $posts = getPosts();
        //echo print_r($posts);
        foreach ($posts as $post) { ?>

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
                                <?php 
                                
                                $comments = getPostComments($post["post_id"]);
                                
                                foreach ($comments as $comment) { ?>

                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object" src="http://placehold.it/45x45" alt="">
                                        </a>
                                        <div class="media-body">
                                            <p><?php echo $comment["comment_body"]; ?></br>
                                                <small>by <a href="#"><?php echo getUserFullName($comment["user_id"]); ?></a></small></p>
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
    <div class="col-lg-5"  style="background-color:grey; height:100%; position:fixed; top:0px; right:0px;">
        <div class="col-lg-10 col-lg-offset-1" style="margin-top: 5%;">
            <div class="jumbotron">
                <h1 align="center">EBG Blog</h1>
                <p  align="center"><small>Evil Bunny Group</small></p>
                <p  align="center">Where sharing EFPs <small>(Evil Fluffy Plans)</small> is caring...</p>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Login</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" action="login.php" method="post">
                        <div class="form-group">
                            <label for="edtEmail" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="edtEmail"  name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="edtPassword" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="edtPassword" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input name="cookie" type="checkbox"> Remember me
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Sign in</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>