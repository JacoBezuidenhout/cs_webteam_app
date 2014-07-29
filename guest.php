<?php

//See POSTS and Search


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
		<div class="col-lg-12 well well-sm" >
			<div class="media">
			  <a class="pull-left" href="#">
				<img class="media-object" src="http://placehold.it/64x64" alt="">
			  </a>
			  <div class="media-body">
				<h4 class="media-heading">Media heading</h4>
				<p>lonjkdslafh hda ksldakjg ksa gfklas fjksa khaskhf klagfa lfgkl</p>
			  </div>
			  <small class="pull-right">by <a href="#">Jaco Bezuidenhout</a></small>
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
				  <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
				</div>
			  </div>
			  <div class="form-group">
				<label for="edtPassword" class="col-sm-2 control-label">Password</label>
				<div class="col-sm-10">
				  <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
				</div>
			  </div>
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <div class="checkbox">
					<label>
					  <input type="checkbox"> Remember me
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