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
	
	
		<h1 align="center">Evil Fluffy Plans</h1>
		
		<div class="col-lg-10 col-lg-offset-1 well">
		<div class="input-group">
		  <input type="text" class="form-control">
		  <span class="input-group-btn">
			<button class="btn btn-primary" type="button">Search</button>
		  </span>
		</div>
		</div>
  	</div>
	<div class="col-lg-5 col-lg-offset-1">
	
		<?php for ($k = 1; $k<30; $k++) { ?>
		
		<div class="modal fade" id="myModal<?php echo $k; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			
			  <div class="modal-header">
			  	<form action="update.php" method="post">
			  		<input type="hidden" name="post_id" value="<?php echo $k; ?>"/>
			  		<input type="text" name="post_title" value="Media heading" class="form-control"/>
			  </div>
			  <div class="modal-body">
					<textarea name="post_body" class="form-control" rows="3">lonjkdslafh hda ksldakjg ksa gfklas fjksa khaskhf klagfa lfgkl</textarea>
			  </div>
			  <div class="modal-footer">
			  		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  		<button type="submit" class="btn btn-primary">Save changes</button>

				</form>

				<form action="delete.php" method="post">
					<input type="hidden" name="post_id" value="<?php echo $k; ?>">
					<button type="submit" class="btn btn-danger pull-left">Delete Post</button>
				</form>
				
			  </div>
			  
			</div>
		  </div>
		</div>
		
		<div class="col-lg-12 well well-sm" >
			<div class="media">
			  <a class="pull-left" href="#">
				<img class="media-object" src="http://placehold.it/64x64" alt="">
			  </a>
			  <div class="media-body">
				<div class="row">
					<div class="col-lg-8">
						<h4 class="media-heading">Media heading</h4>
					</div>
					<div class="col-lg-4">
						<button class="btn btn-warning btn-sm pull-right" data-toggle="modal" data-target="#myModal<?php echo $k; ?>">
					  		<span class="glyphicon glyphicon-edit"></span>
						</button>
					</div>
				</div>
				<p>lonjkdslafh hda ksldakjg ksa gfklas fjksa khaskhf klagfa lfgkl</p>
			  </div>
			  <small class="pull-right">by <a href="#">Jaco Bezuidenhout</a></small>
			</div>
			
			<div class="panel-group" id="accordion">
			  <div class="panel panel-default">
				<div class="panel-heading">
				  <h5 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $k; ?>">
					  <small>Comments <span class="badge">4</span></small>
					</a>
				  </h5>
				</div>
				<div id="collapse<?php echo $k; ?>" class="panel-collapse collapse">
					<div class="panel-body">
						<?php for ($j = 1; $j<5; $j++) { ?>
						
							<div class="media">
							  <a class="pull-left" href="#">
								<img class="media-object" src="http://placehold.it/45x45" alt="">
							  </a>
							  <div class="media-body">
								<p>lonjkdslafh hda ksldakjg ksa gfklas fjksa khaskhf klagfa lfgkl</br>
								<small>by <a href="#">Jaco Bezuidenhout</a></small></p>
							  </div>
							</div>
						
						<?php } ?>
						<hr/>
							<div class="media">
							  <a class="pull-left" href="#">
								<img class="media-object" src="http://placehold.it/60x60" alt="">
							  </a>
							  <div class="media-body">
								<div class="input-group">
								  <input type="text" class="form-control">
								  <span class="input-group-btn">
									<button class="btn btn-primary" type="button">Comment</button>
								  </span>
								</div>
							  </div>
							</div>
						
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
				  <div class="modal-body">
				  	<form action="updateProfile.php" method="post">
						<input type="text" name="profile_name" value="Jaco" class="form-control"/>
						<input type="text" name="profile_surname" value="Bezuidenhout" class="form-control"/>
						<input type="text" name="profile_country" value="South Africa" class="form-control"/>
				  </div>
				  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</form>
				  </div>
				</div>
			  </div>
			</div>
	
	<div class="col-lg-5"  style="background-color:grey; height:100%; position:fixed; top:0px; right:0px;">
		<div class="col-lg-10 col-lg-offset-1" style="margin-top: 5%;">
			<div class="jumbotron">
			  <h1 align="center">EBG Blog</h1>
			  <p  align="center"><small>Evil Bunny Group</small></p>
			  <p  align="center">Where sharing EFPs <small>(Evil Fluffy Plans)</small> is caring...</p>
			</div>
			
			
			
			<div class="panel panel-primary">
			  <div class="panel-heading row">
				<div class="col-lg-6"><h3 class="panel-title">Your Profile</h3></div>
				<div class="col-lg-6"><a type="button" class="btn btn-small btn-danger pull-right">Logout</a></div>
			  </div>
			  <div class="panel-body">
			  			<button class="btn btn-warning btn-sm pull-right" data-toggle="modal" data-target="#editprofile">
					  		<span class="glyphicon glyphicon-edit"></span>
						</button>
			  	<div class="row">
			  		<div class="col-lg-3 col-lg-offset-1"><img src="http://placehold.it/125x175" alt="" class="img-circle"></div>
			  		<div class="col-lg-7 col-lg-offset-1"><h3>Jaco Bezuidenhout</h3>
			  		<p><b>Name:</b> Jaco</p>
			  		<p><b>Surname:</b> Bezuidenhout</p>
			  		<p><b>Target Country:</b> South Africa</p>
			  		<p><b>#Plans:</b> 23</p>
			  		</div>
			  	</div>
			  	
			  </div>
			</div>
	
	
		</div>
	</div>

</div>